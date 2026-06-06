// ── Helpers ─
function cssVar(name) {
    return getComputedStyle(document.documentElement).getPropertyValue(name).trim();
}

function withAlpha(oklchVal, alpha) {
    return oklchVal.replace(/\)$/, "") + ` / ${alpha})`;
}

const playerProfile = document.getElementById("player-profile");
const accessProfileButton = document.getElementById("access-profile");
const closeProfileButton = document.getElementById("close-profile");
const creditsDisplay = document.getElementById("player-credits");

const unlockModal = document.getElementById("unlock-modal");
const unlockImg = document.getElementById("unlock-img");
const unlockName = document.getElementById("unlock-name");
const unlockMeta = document.getElementById("unlock-meta");
const unlockDesc = document.getElementById("unlock-desc");
const closeUnlockBtn = document.getElementById("close-unlock");

const statsModal = document.getElementById("stats-modal");
const statsImg = document.getElementById("stats-img");
const statsName = document.getElementById("stats-name");
const statsMeta = document.getElementById("stats-meta");
const statsLegend = document.getElementById("stats-legend");
const closeStatsBtn = document.getElementById("close-stats");

// ── Profile modal ──────────────────────────────────────────────
accessProfileButton.addEventListener("click", () => playerProfile.classList.toggle("hidden"));
closeProfileButton.addEventListener("click", () => playerProfile.classList.toggle("hidden"));

// ── Credits ─
let credits = parseInt(creditsDisplay.textContent);

// ── Active chart instance (destroy before redraw) ──────────────
let radarChart = null;

// ── Unlock modal ───────────────────────────────────────────────
function openUnlockModal(champion) {
    unlockImg.src = champion.image;
    unlockImg.alt = champion.name;
    unlockName.textContent = champion.name;
    unlockMeta.textContent = `${champion.class} · ${champion.origin}`;
    unlockDesc.textContent = champion.description;

    unlockModal.classList.remove("hidden");
    // Restart animation by re-inserting the class
    const box = unlockModal.querySelector(".modal-box");
    box.classList.remove("animate-unlock");
    void box.offsetWidth; // reflow
    box.classList.add("animate-unlock");
}

function closeUnlockModal() { unlockModal.classList.add("hidden"); }

closeUnlockBtn.addEventListener("click", closeUnlockModal);
unlockModal.addEventListener("click", e => { if (e.target === unlockModal) closeUnlockModal(); });

// ── Stats modal ────────────────────────────────────────────────
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
            primary: cssVar("--chart-1"),
            accent: cssVar("--chart-2"),
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

// ── Acquire buttons ────────────────────────────────────────────
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

            if (champion) openUnlockModal(champion);
        } else {
            alert(`Not enough credits! Need ${price}, you have ${credits}.`);
        }
    });
});

// ── Info ("i") buttons ─────────────────────────────────────────
document.querySelectorAll(".details").forEach(button => {
    if (button.textContent.trim() !== "i") return;
    button.addEventListener("click", () => {
        const championName = button.closest(".champion-card").querySelector("h3").textContent.trim();
        const champion = champions.find(c => c.name === championName);
        if (champion) openStatsModal(champion);
    });
});