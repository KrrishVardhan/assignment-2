<?php
$player = [
    "name" => "KRRISH",
    "credits" => 7000,
    "gems" => 5,
    "unlocked_champions" => ["Iron Man", "Captain America"]
];
$champions = [
    ["name"=>"Iron Man","class"=>"Tech","description"=>"Genius inventor equipped with advanced powered armor and energy weapons.","origin"=>"Marvel Comics","image"=>"assets/iron-man.webp","unlocked"=>true,"price"=>1000,"stats"=>["combat"=>3,"mobility"=>4,"intelligence"=>5,"strength"=>4,"durability"=>4]],
    ["name"=>"Captain America","class"=>"Skill","description"=>"Super soldier with unmatched leadership, combat skills, and tactical intelligence.","origin"=>"Marvel Comics","image"=>"assets/captain-america.webp","unlocked"=>true,"price"=>1500,"stats"=>["combat"=>5,"mobility"=>4,"intelligence"=>4,"strength"=>3,"durability"=>3]],
    ["name"=>"Thor","class"=>"Cosmic","description"=>"God of Thunder wielding Mjolnir and commanding lightning and storms.","origin"=>"Marvel Comics","image"=>"assets/thor.webp","unlocked"=>false,"price"=>2000,"stats"=>["combat"=>5,"mobility"=>4,"intelligence"=>3,"strength"=>5,"durability"=>5]],
    ["name"=>"Black Widow","class"=>"Skill","description"=>"Elite spy and martial artist trained in covert operations and hand-to-hand combat.","origin"=>"Marvel Comics","image"=>"assets/black-widow.webp","unlocked"=>false,"price"=>1800,"stats"=>["combat"=>5,"mobility"=>5,"intelligence"=>4,"strength"=>2,"durability"=>2]],
    ["name"=>"Spider-Man","class"=>"Skill","description"=>"Highly agile hero with spider-like abilities and a strong sense of responsibility.","origin"=>"Marvel Comics","image"=>"assets/spider-man.jpg","price"=>1500,"unlocked"=>false,"stats"=>["combat"=>4,"mobility"=>5,"intelligence"=>4,"strength"=>3,"durability"=>3]],
    ["name"=>"Hulk","class"=>"Cosmic","description"=>"Incredible strength and durability fueled by rage, making him nearly unstoppable.","origin"=>"Marvel Comics","image"=>"assets/hulk.webp","unlocked"=>false,"price"=>2500,"stats"=>["combat"=>4,"mobility"=>3,"intelligence"=>2,"strength"=>5,"durability"=>5]],
    ["name"=>"Doctor Strange","class"=>"Magic","description"=>"Master of the mystic arts with powerful spells and reality-warping abilities.","origin"=>"Marvel Comics","image"=>"assets/DrStrange.webp","unlocked"=>false,"price"=>2000,"stats"=>["combat"=>4,"mobility"=>4,"intelligence"=>5,"strength"=>2,"durability"=>3]],
    ["name"=>"Black Panther","class"=>"Skill","description"=>"Agile and skilled warrior with enhanced senses and a vibranium suit.","origin"=>"Marvel Comics","image"=>"assets/black-panther.webp","price"=>2000,"unlocked"=>false,"stats"=>["combat"=>5,"mobility"=>5,"intelligence"=>4,"strength"=>3,"durability"=>3]],
    ["name"=>"Captain Marvel","class"=>"Cosmic","description"=>"Powerful hero with cosmic energy manipulation and superhuman abilities.","origin"=>"Marvel Comics","image"=>"assets/captain-marvel.webp","price"=>2500,"unlocked"=>false,"stats"=>["combat"=>4,"mobility"=>4,"intelligence"=>3,"strength"=>5,"durability"=>5]],
    ["name"=>"Ant-Man","class"=>"Skill","description"=>"Expert in size manipulation and insect communication, with a genius-level intellect.","origin"=>"Marvel Comics","image"=>"assets/ant-man.webp","price"=>1500,"unlocked"=>false,"stats"=>["combat"=>3,"mobility"=>5,"intelligence"=>5,"strength"=>2,"durability"=>2]],
    ["name"=>"Venom","class"=>"Cosmic","description"=>"Symbiotic alien with shape-shifting abilities and a powerful, aggressive nature.","origin"=>"Marvel Comics","image"=>"assets/venom.webp","price"=>2000,"unlocked"=>false,"stats"=>["combat"=>4,"mobility"=>4,"intelligence"=>3,"strength"=>4,"durability"=>4]],
    ["name"=>"Wolverine","class"=>"Skill","description"=>"Enhanced healing factor and adamantium claws make him a formidable fighter.","origin"=>"Marvel Comics","image"=>"assets/wolverine.webp","price"=>2000,"unlocked"=>false,"stats"=>["combat"=>5,"mobility"=>4,"intelligence"=>3,"strength"=>4,"durability"=>4]]
];
?>

<?php include 'header.php'; ?>

<main class="p-8">
    <h2 class="text-2xl font-semibold mb-6">Champions</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($champions as $champion) : ?>
            <div class="champion-card bg-muted rounded-lg shadow-md overflow-hidden relative">
                <img src="<?= $champion['image'] ?>"
                     data-price="<?= $champion['price'] ?>"
                     alt="<?= $champion['name'] ?>"
                     class="champion-image w-full object-cover object-center <?= $champion['unlocked'] ? '' : 'locked' ?>">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2"><?= $champion['name'] ?></h3>
                    <p class="text-sm text-muted-foreground mb-4"><?= $champion['description'] ?></p>
                    <p class="text-sm text-chart-1 font-medium mb-2"><?= $champion['price'] ?> Credits</p>
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


<!-- ═══════════════════════════════════════════════════════════ -->
<!-- Player Profile Modal                                        -->
<!-- ═══════════════════════════════════════════════════════════ -->
<section id="player-profile" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center hidden z-40">
    <div class="bg-muted rounded-lg shadow-lg p-6 w-full max-w-md relative">
        <button id="close-profile" class="absolute top-4 right-4 text-muted-foreground hover:text-foreground transition-colors cursor-pointer text-2xl">&times;</button>
        <h2 class="text-2xl font-bold mb-4">Player Profile</h2>
        <p class="text-3xl text-chart-1 mb-2"><?= $player['name'] ?></p>
        <div class="rounded-lg flex flex-col justify-center mb-6 gap-4">
            <div id="player-credits" class="p-4 bg-accent text-secondary-foreground"><?= $player['credits'] ?> Credits</div>
            <div id="player-gems"    class="p-4 bg-accent text-secondary-foreground"><?= $player['gems'] ?> Gems</div>
        </div>
        <h3 class="text-xl font-semibold mb-2">Unlocked Champions</h3>
        <ul class="list-disc list-inside text-sm text-muted-foreground">
            <?php foreach ($player['unlocked_champions'] as $uc): ?>
                <li><?= $uc ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<section id="unlock-modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center hidden z-50">
    <div class="modal-box bg-muted border border-border shadow-2xl p-8 w-full max-w-sm relative text-center animate-unlock">
        <button id="close-unlock"
                class="absolute top-4 right-4 text-muted-foreground hover:text-foreground transition-colors cursor-pointer text-2xl leading-none">
            &times;
        </button>
        <div class="mb-4">
            <span class="inline-block bg-primary text-primary-foreground text-xs font-bold px-3 py-1 uppercase tracking-widest">
                ★ Champion Unlocked!
            </span>
        </div>
        <img id="unlock-img" src="" alt=""
             class="w-40 h-40 object-cover object-center mx-auto mb-4 shadow-lg border-4 border-primary">
        <h2 id="unlock-name" class="text-2xl font-bold mb-1 text-foreground"></h2>
        <p  id="unlock-meta" class="text-sm text-muted-foreground mb-2"></p>
        <p  id="unlock-desc" class="text-sm text-muted-foreground"></p>
    </div>
</section>

<section id="stats-modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center hidden z-50">
    <div class="modal-box bg-muted border border-border shadow-2xl p-6 w-full max-w-sm relative">
        <button id="close-stats"
                class="absolute top-4 right-4 text-muted-foreground hover:text-foreground transition-colors cursor-pointer text-2xl leading-none">
            &times;
        </button>

        <!-- Header -->
        <div class="flex items-center gap-4 mb-5">
            <img id="stats-img" src="" alt="" class="w-16 h-16 object-cover object-center shadow border-2 border-primary">
            <div>
                <h2 id="stats-name" class="text-xl font-bold text-foreground"></h2>
                <p  id="stats-meta" class="text-xs text-muted-foreground"></p>
            </div>
        </div>

        <!-- Radar chart -->
        <div class="relative w-full" style="height:260px;">
            <canvas id="stats-radar"></canvas>
        </div>

        <!-- Numeric legend -->
        <div id="stats-legend" class="mt-4 grid grid-cols-5 gap-1 text-center"></div>
    </div>
</section>


<script>const champions = <?= json_encode($champions) ?>;</script>
<script>const player    = <?= json_encode($player) ?>;</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="./scripts/script.js"></script>

<?php include 'footer.php'; ?>