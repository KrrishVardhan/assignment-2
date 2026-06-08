// for css variable access
function cssVar(name) {
    return getComputedStyle(document.documentElement).getPropertyValue(name).trim();
}

// (Chart.js doesn't support alpha in CSS variables)
function withAlpha(oklchVal, alpha) {
    return oklchVal.replace(/\)$/, "") + ` / ${alpha})`;
}

const playerProfile = document.getElementById("player-profile");
const accessProfileButton = document.getElementById("access-profile");
const closeProfileButton = document.getElementById("close-profile");
const creditsDisplay = document.getElementById("player-credits");

const securityTerminal = document.getElementById("security-terminal");
const authModal = document.getElementById("auth-modal");
const closeAuthBtn = document.getElementById("close-auth");

const unlockModal = document.getElementById("unlock-modal");
const unlockImg = document.getElementById("unlock-img");
const unlockName = document.getElementById("unlock-name");
const unlockMeta = document.getElementById("unlock-meta");
const unlockDesc = document.getElementById("unlock-desc");
const unlockedList = document.getElementById("unlocked-champions");
const closeUnlockBtn = document.getElementById("close-unlock");

const statsModal = document.getElementById("stats-modal");
const statsImg = document.getElementById("stats-img");
const statsName = document.getElementById("stats-name");
const statsMeta = document.getElementById("stats-meta");
const statsLegend = document.getElementById("stats-legend");
const closeStatsBtn = document.getElementById("close-stats");

const searchInput = document.getElementById("search");
const submitSearch = document.getElementById("fetch-champions");
const searchSection = document.getElementById("search-section");
const searchResults = document.getElementById("search-results");
const closeSearchModal = document.getElementById("close-search-modal");

// profile
accessProfileButton.addEventListener("click", () => playerProfile.classList.toggle("hidden"));
closeProfileButton.addEventListener("click", () => playerProfile.classList.toggle("hidden"));

// security terminal
securityTerminal.addEventListener("click", () => {
    authModal.classList.remove("hidden");
});
closeAuthBtn.addEventListener("click", () => {
    authModal.classList.add("hidden");
});
authModal.addEventListener("click", e => {
    if (e.target === authModal) authModal.classList.add("hidden");
});

// credits
let credits = parseInt(creditsDisplay.textContent);

// clear radar chart
let radarChart = null;

// champion search
submitSearch.addEventListener("click", () => {
    const query = searchInput.value.trim().toLowerCase();

    if (!query) {
        searchResults.textContent = "Please enter a champion name.";
        return;
    }

    const champion = champions.find(c =>
        c.name.toLowerCase().startsWith(query)
    );

    searchResults.innerHTML = "";
    searchSection.classList.remove("hidden");

    if (champion) {
        const resultCard = document.createElement("div");

        resultCard.className =
            "champion-result-card border border-primary p-8 flex gap-10 items-center bg-background text-white";

        resultCard.innerHTML = `
    <div>
        <img
            src="${champion.image}"
            alt="${champion.name}"
            class="w-40 h-40 object-contain ${champion.unlocked ? "" : "locked"}"
            data-price="${champion.price}"
        >
    </div>

    <div class="flex-1">
        <div class="flex justify-between items-center">
            <h3 class="text-5xl font-bold uppercase">${champion.name}</h3>
            <span class="text-sm font-bold uppercase badge bg-primary">${champion.class}</span>
        </div>

        <hr class="my-6 border-muted-foreground">

        <p class="text-muted-foreground mb-6">
            ${champion.description}
        </p>

        <p class="text-sm text-muted-foreground mb-4">
            Signature Ability: <span class="text-foreground font-medium">${champion.signature_ability}</span>
        </p>

        <div class="grid grid-cols-2 gap-3">
            ${Object.entries(champion.stats).map(([stat, value]) => `
                <div class="border border-border rounded-lg p-3 bg-muted">
                    <p class="uppercase text-xs text-muted-foreground">${stat}</p>
                    <p class="font-bold">${"★".repeat(value)}</p>
                </div>
            `).join("")}
        </div>
    </div>
`;

        searchResults.appendChild(resultCard);
    } else {
        searchResults.textContent = "No champions found.";
    }

    searchSection.scrollIntoView({
        behavior: "smooth"
    });
});
// Close search modal
closeSearchModal.addEventListener("click", () => {
    searchSection.classList.add("hidden");
    searchInput.value = "";
    searchResults.innerHTML = "";
});

// unlock modal
function openUnlockModal(champion) {
    unlockImg.src = champion.image;
    unlockImg.alt = champion.name;
    unlockName.textContent = champion.name;
    unlockMeta.textContent = `${champion.class} · ${champion.origin}`;
    unlockDesc.textContent = champion.description;

    champion.unlocked = true;

    unlockModal.classList.remove("hidden");
    // Restart animation by re-inserting the class
    const box = unlockModal.querySelector(".modal-box");
    box.classList.remove("animate-unlock");
    void box.offsetWidth; // reflow
    box.classList.add("animate-unlock");
    unlockedList.innerHTML += `<li>${champion.name}</li>`;
}

function closeUnlockModal() { unlockModal.classList.add("hidden"); }

closeUnlockBtn.addEventListener("click", closeUnlockModal);
unlockModal.addEventListener("click", e => { if (e.target === unlockModal) closeUnlockModal(); });

// stats modal function
function openStatsModal(champion) {
    statsImg.src = champion.image;
    statsImg.alt = champion.name;
    statsName.textContent = champion.name;
    statsMeta.textContent = `${champion.class} · ${champion.origin}`;

    // Rebuild legend
    statsLegend.innerHTML = "";
    Object.entries(champion.stats).forEach(([key, val]) => {
        const el = document.createElement("div");
        el.className = "flex flex-col items-center gap-0.5";
        el.innerHTML = `
            <span class="text-xs text-muted-foreground capitalize">${key}</span>
            <span class="text-sm font-bold text-foreground">${val}<span class="text-muted-foreground font-normal">/5</span></span>`;
        statsLegend.appendChild(el);
    });

    statsModal.classList.remove("hidden");
    const box = statsModal.querySelector(".modal-box");
    box.classList.remove("animate-unlock");
    void box.offsetWidth;
    box.classList.add("animate-unlock");

    // Draw radar after paint
    requestAnimationFrame(() => {
        if (radarChart) {
            radarChart.destroy();
            radarChart = null;
        }

        const { stats, name } = champion;

        const labels = Object.keys(stats).map(
            key => key.charAt(0).toUpperCase() + key.slice(1)
        );

        const values = Object.values(stats);

        const colors = {
            primary: cssVar("--chart-5"),
            accent: cssVar("--chart-1"),
            foreground: cssVar("--foreground"),
            cardForeground: cssVar("--card-foreground"),
        };

        const ctx = document.getElementById("stats-radar").getContext("2d");

        radarChart = new Chart(ctx, {
            type: "radar",

            data: {
                labels,
                datasets: [
                    {
                        label: name,
                        data: values,

                        backgroundColor: withAlpha(colors.primary, 0.4),
                        borderColor: colors.primary,
                        borderWidth: 2,

                        pointRadius: 4,
                        pointHoverRadius: 4,

                        pointBackgroundColor: colors.primary,
                        pointBorderColor: colors.accent,
                        pointHoverBackgroundColor: colors.primary,
                        pointHoverBorderColor: colors.accent,

                        hoverBackgroundColor: withAlpha(colors.primary, 0.2),
                        hoverBorderColor: colors.primary,
                    },
                ],
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                // Prevents hover/touch distortion completely
                events: [],

                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                    },
                },

                scales: {
                    r: {
                        min: 0,
                        max: 5,

                        ticks: {
                            stepSize: 1,
                            display: false,
                        },

                        grid: {
                            color: colors.cardForeground,
                        },

                        angleLines: {
                            color: colors.cardForeground,
                        },

                        pointLabels: {
                            color: colors.foreground,
                            font: {
                                family: cssVar("--font-sans"),
                                size: 12,
                                weight: "600",
                            },
                        },
                    },
                },

                animation: {
                    duration: 700,
                    easing: "easeOutQuart",
                },
            },
        });
    });
}

function closeStatsModal() { statsModal.classList.add("hidden"); }

closeStatsBtn.addEventListener("click", closeStatsModal);
statsModal.addEventListener("click", e => { if (e.target === statsModal) closeStatsModal(); });

// switch "Acquire" button to "Acquired" and show confetti
document.querySelectorAll(".aquire").forEach(button => {
    button.addEventListener("click", () => {
        const card = button.closest(".champion-card");
        const image = card.querySelector(".champion-image");
        const price = parseInt(image.dataset.price);
        const championName = button.dataset.champion;
        const champion = champions.find(c => c.name === championName);

        if (credits >= price) {
            credits -= price;
            image.classList.remove("locked");
            creditsDisplay.textContent = `${credits} Credits`;

            const acquired = document.createElement("button");
            acquired.className = "px-4 py-2 m-2 bg-secondary text-secondary-foreground font-medium cursor-not-allowed opacity-60 border border-border";
            acquired.disabled = true;
            acquired.textContent = "Acquired";
            button.replaceWith(acquired);

            confetti({
                particleCount: 100,
                spread: 70,
                origin: { y: 0.6 },
                colors: [cssVar("--chart-1"), cssVar("--chart-2"), cssVar("--chart-3"), cssVar("--chart-4"), cssVar("--chart-5")],
            });

            if (champion) openUnlockModal(champion);
        } else {
            alert(`Not enough credits! Need ${price}, you have ${credits}.`);
        }
    });
});

// champion details modal
document.querySelectorAll(".details").forEach(button => {
    if (button.textContent.trim() !== "i") return;
    button.addEventListener("click", () => {
        const championName = button.closest(".champion-card").querySelector("h3").textContent.trim();
        const champion = champions.find(c => c.name === championName);
        if (champion) openStatsModal(champion);
    });
});