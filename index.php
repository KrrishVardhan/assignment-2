<?php
$player = [
    "name" => "KRRISH",
    "credits" => 10000,
    "gems" => 5,
    "unlocked_champions" => ["Iron Man", "Captain America"]
];
$champions = [
    [
        "name" => "Iron Man",
        "class" => "Tech",
        "description" => "Genius inventor equipped with advanced powered armor and energy weapons.",
        "origin" => "Marvel Comics",
        "image" => "assets/iron-man.webp",
        "unlocked" => true,
        "price" => 1000,
        "stats" => [
            "combat" => 3,
            "mobility" => 4,
            "intelligence" => 5,
            "strength" => 4,
            "durability" => 4,
        ],
    ],

    [
        "name" => "Captain America",
        "class" => "Skill",
        "description" => "Super soldier with unmatched leadership, combat skills, and tactical intelligence.",
        "origin" => "Marvel Comics",
        "image" => "assets/captain-america.webp",
        "unlocked" => true,
        "price" => 1500,
        "stats" => [
            "combat" => 5,
            "mobility" => 4,
            "intelligence" => 4,
            "strength" => 3,
            "durability" => 3,
        ],
    ],

    [
        "name" => "Thor (Ragnarok)",
        "class" => "Cosmic",
        "description" => "God of Thunder wielding Mjolnir and commanding lightning and storms.",
        "origin" => "Marvel Comics",
        "image" => "assets/thor.webp",
        "unlocked" => false,
        "price" => 2000,
        "stats" => [
            "combat" => 5,
            "mobility" => 4,
            "intelligence" => 3,
            "strength" => 5,
            "durability" => 5,
        ],
    ],

    [
        "name" => "Hulk",
        "class" => "Science",
        "description" => "Incredible strength and durability fueled by rage, making him nearly unstoppable.",
        "origin" => "Marvel Comics",
        "image" => "assets/hulk.webp",
        "unlocked" => false,
        "price" => 2500,
        "stats" => [
            "combat" => 4,
            "mobility" => 3,
            "intelligence" => 2,
            "strength" => 5,
            "durability" => 5,
        ],
    ],

    [
        "name" => "Black Widow",
        "class" => "Skill",
        "description" => "Elite spy and martial artist trained in covert operations and hand-to-hand combat.",
        "origin" => "Marvel Comics",
        "image" => "assets/black-widow.webp",
        "unlocked" => false,
        "price" => 1800,
        "stats" => [
            "combat" => 5,
            "mobility" => 5,
            "intelligence" => 4,
            "strength" => 2,
            "durability" => 2,
        ],
    ],

    [
        "name" => "Spider-Man",
        "class" => "Skill",
        "description" => "Highly agile hero with spider-like abilities and a strong sense of responsibility.",
        "origin" => "Marvel Comics",
        "image" => "assets/spider-man.jpg",
        "unlocked" => false,
        "price" => 1500,
        "stats" => [
            "combat" => 4,
            "mobility" => 5,
            "intelligence" => 4,
            "strength" => 3,
            "durability" => 3,
        ],
    ],

    [
        "name" => "Doctor Strange",
        "class" => "Magic",
        "description" => "Master of the mystic arts with powerful spells and reality-warping abilities.",
        "origin" => "Marvel Comics",
        "image" => "assets/DrStrange.webp",
        "unlocked" => false,
        "price" => 2000,
        "stats" => [
            "combat" => 4,
            "mobility" => 4,
            "intelligence" => 5,
            "strength" => 2,
            "durability" => 3,
        ],
    ],

    [
        "name" => "Black Panther",
        "class" => "Skill",
        "description" => "Agile and skilled warrior with enhanced senses and a vibranium suit.",
        "origin" => "Marvel Comics",
        "image" => "assets/black-panther.webp",
        "unlocked" => false,
        "price" => 2000,
        "stats" => [
            "combat" => 5,
            "mobility" => 5,
            "intelligence" => 4,
            "strength" => 3,
            "durability" => 3,
        ],
    ],

    [
        "name" => "Captain Marvel",
        "class" => "Cosmic",
        "description" => "Powerful hero with cosmic energy manipulation and superhuman abilities.",
        "origin" => "Marvel Comics",
        "image" => "assets/captain-marvel.webp",
        "unlocked" => false,
        "price" => 2500,
        "stats" => [
            "combat" => 4,
            "mobility" => 4,
            "intelligence" => 3,
            "strength" => 5,
            "durability" => 5,
        ],
    ],

    [
        "name" => "Ant-Man",
        "class" => "Skill",
        "description" => "Expert in size manipulation and insect communication, with a genius-level intellect.",
        "origin" => "Marvel Comics",
        "image" => "assets/ant-man.webp",
        "unlocked" => false,
        "price" => 1500,
        "stats" => [
            "combat" => 3,
            "mobility" => 5,
            "intelligence" => 5,
            "strength" => 2,
            "durability" => 2,
        ],
    ],

    [
        "name" => "Venom",
        "class" => "Cosmic",
        "description" => "Symbiotic alien with shape-shifting abilities and a powerful, aggressive nature.",
        "origin" => "Marvel Comics",
        "image" => "assets/venom.webp",
        "unlocked" => false,
        "price" => 2000,
        "stats" => [
            "combat" => 4,
            "mobility" => 4,
            "intelligence" => 3,
            "strength" => 4,
            "durability" => 4,
        ],
    ],

    [
        "name" => "Wolverine",
        "class" => "Skill",
        "description" => "Enhanced healing factor and adamantium claws make him a formidable fighter.",
        "origin" => "Marvel Comics",
        "image" => "assets/wolverine.webp",
        "unlocked" => false,
        "price" => 2000,
        "stats" => [
            "combat" => 5,
            "mobility" => 4,
            "intelligence" => 3,
            "strength" => 4,
            "durability" => 4,
        ],
    ],
];
?>

<?php include 'header.php'; ?>

<main class="p-8">
    <div class="flex flex-col items-center justify-center mb-12">
        <h1 class="text-5xl font-bold mb-6 text-chart-1 text-center">ENTER THE ARENA</h1>
        <small class="text-muted-foreground">SEASON 3 &bullet; <span class="text-chart-2 font-bold">INFINITY ENERGIES IS OPEN!</span></small>
    </div>
    <!-- Random realm on page load -->
    <?php include 'components/realm.php'; ?>

    <!-- Champion Search -->
    <div class="mx-auto mb-8 flex flex-col items-center justify-center w-3xl p-4">
        <p class="text-lg font-medium text-muted-foreground mb-4">Search for your favorite champions:</p>
        <form class="mb-4">
            <label for="search" class="sr-only">Search Champions</label>
            <input type="text" id="search" placeholder="Search Champions..."
                   class="p-3 rounded-lg border border-border focus:ring-2 focus:ring-primary focus:outline-none transition-colors">
            <button type="button" id="fetch-champions"
                    class="ml-2 px-4 py-3 rounded-lg bg-secondary text-secondary-foreground hover:bg-secondary/80 transition-colors">
                Fetch Champion
            </button>
        </form>
    </div>

    <h2 class="text-2xl font-semibold mb-6">Champions</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($champions as $champion) : ?>
            <div class="champion-card border border-border bg-muted rounded-lg shadow-md overflow-hidden relative">
                <img src="<?= $champion['image'] ?>"
                     data-price="<?= $champion['price'] ?>"
                     alt="<?= $champion['name'] ?>"
                     class="champion-image w-full object-cover object-center <?= $champion['unlocked'] ? '' : 'locked' ?>">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2"><?= $champion['name'] ?></h3>
                    <p class="text-sm text-muted-foreground mb-4"><?= $champion['description'] ?></p>
                    <p class="text-xl text-chart-1 font-medium mb-2"><?= $champion['price'] ?> Credits</p>
                </div>

                <!-- Info button -->
                <button class="details absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-lg bg-secondary text-accent-foreground hover:opacity-90 transition-opacity font-bold cursor-pointer">
                    i
                </button>

                <?php if (!$champion['unlocked']): ?>
                    <button class="aquire px-4 py-2 m-2 rounded-lg border border-border hover:bg-primary hover:text-primary-foreground bg-accent transition-colors cursor-pointer"
                            data-champion="<?= $champion['name'] ?>">
                        Acquire Champion
                    </button>
                <?php else: ?>
                    <button class="px-4 py-2 m-2 rounded-lg bg-secondary text-secondary-foreground font-medium cursor-not-allowed opacity-60 border border-border"
                            disabled>
                        Acquired
                    </button>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'components/player.php'; ?>
<?php include 'components/unlock.php'; ?>
<?php include 'components/stats.php'; ?>
<?php include 'components/search-modal.php'; ?>


<script>const champions = <?= json_encode($champions) ?>;</script>
<script>const player    = <?= json_encode($player) ?>;</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
<script src="./scripts/script.js"></script>

<?php include 'footer.php'; ?>