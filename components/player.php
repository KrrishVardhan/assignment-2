<?php
$player = [
    "name" => "KRRISH",
    "credits" => 10000,
    "gems" => 5,
    "unlocked_champions" => ["Iron Man", "Captain America"]
];
?>
<section id="player-profile" class="fixed inset-0 bg-black/55 backdrop-blur-sm flex items-center justify-center hidden z-40">
    <div class="bg-muted border border-border w-full max-w-md relative overflow-hidden rounded-lg">
        <div class="h-1.5 w-full bg-primary"></div>

        <div class="flex items-center gap-4 px-6 py-5 border-b border-border">
            <div class="w-13 h-13 rounded-full bg-accent border-2 border-primary flex items-center justify-center shrink-0">
                <span class="text-accent-foreground text-xl font-bold">K</span>
            </div>
            <div>
                <p class="text-xs font-medium text-muted-foreground uppercase tracking-widest mb-0.5">Player</p>
                <p class="text-2xl font-bold text-chart-5 tracking-wide"><?= $player['name'] ?></p>
            </div>
            <button id="close-profile" class="ml-auto text-muted-foreground hover:text-foreground transition-colors cursor-pointer text-2xl leading-none">&times;</button>
        </div>

        <!-- Stats row -->
        <div class="grid grid-cols-2 gap-3 px-6 py-4 border-b border-border">
            <div class="bg-accent rounded-md p-3">
                <p class="text-xs text-primary-foreground mb-1 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="8"/><path d="M12 8v4l2 2"/></svg>
                    Credits
                </p>
                <p id="player-credits" class="text-xl font-semibold text-foreground"><?= $player['credits'] ?></p>
            </div>
            <div class="bg-accent rounded-md p-3">
                <p class="text-xs text-primary-foreground mb-1 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    Gems
                </p>
                <p id="player-gems" class="text-xl font-semibold text-foreground"><?= $player['gems'] ?></p>
            </div>
        </div>
        <div class="px-6 py-4">
            <h3 class="text-xl font-semibold mb-2">Unlocked Champions</h3>
            <ul id="unlocked-champions" class="list-disc list-inside marker:text-primary text-sm text-muted-foreground">
                <?php foreach ($player['unlocked_champions'] as $uc): ?>
                    <li><?= $uc ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>