<?php $realms = [
    [
        "name" => "Asgard",
        "rule" => "Cosmic Champions have increased strength and durability.",
        "color" => "border-purple-500 text-purple-500",
    ],
    [
        "name" => "Wakanda",
        "rule" => "Tech Champions have enhanced Vibranium shields.",
        "color" => "border-green-500 text-green-500",
    ],
    [
        "name" => "Quantum Realm",
        "rule" => "Science Champions generate passive healing over time.",
        "color" => "border-blue-500 text-blue-500",
    ],
    [
        "name" => "Sokovia",
        "rule" => "Skill Champions have increased mobility and evasion.",
        "color" => "border-yellow-500 text-yellow-500",
    ],
    [
        "name" => "Krypton",
        "rule" => "Cosmic Champions gain a temporary power boost at the start of match.",
        "color" => "border-red-500 text-red-500",
    ],
];
?>
<?php $random_realm = $realms[array_rand($realms)]; ?>
<div class="realm-info border <?= $random_realm['color'] ?> rounded-lg p-6 mb-12 text-center w-3xl mx-auto">
    <h2 class="text-3xl <?= $random_realm['color'] ?> font-semibold mb-4">ACTIVE REALM: <?= $random_realm['name'] ?></h2>
    <p class="text-lg text-muted-foreground"><span class="font-bold">ZONE RULE:</span> <?= $random_realm['rule'] ?></p>
</div>