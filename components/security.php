<?php
$passPhrases = [
    "PROTECT_EARTH",
    "BE_WORTHY",
    "ENTER_ARENA"
];
?>
<section id="auth-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="relative bg-muted p-6 rounded-lg shadow-lg w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-4 text-chart-4">Security Firewall Access</h2>
        <hr class="border-chart-4 mb-6">
        <button id="close-auth"
                class="absolute top-4 right-4 text-muted-foreground hover:text-foreground transition-colors cursor-pointer text-2xl leading-none">
            &times;
        </button>
        <p class="text-muted-foreground mb-6">
            Enter system parameters. Passphrase matching keys run processing blocks straight through server loops.
        </p>
        <input type="password" id="auth-code" placeholder="Enter Code"
               class="w-full p-3 rounded-lg border border-border focus:ring-2 focus:ring-chart-4 focus:outline-none transition-colors mb-4">
        <button id="auth-submit"
                class="w-full px-4 py-3 rounded-lg bg-chart-4 text-primary-foreground hover:bg-chart-4/90 transition-colors font-bold">
            Authorize Access Matrix
        </button>
        <!-- Valid Passphrases -->
        <div class="mt-6">
            <p class="text-sm text-muted-foreground mb-2">
                VALID GATEWAY REFERENCE BLUEPRINTS:
            </p>
            <ul class="text-sm text-muted-foreground space-y-3 list-none">
                <li>
                    <div class="flex items-center gap-2">
                        <span class="badge bg-chart-3 font-bold text-foreground w-16 text-center">KEY #1</span>
                        <span><?php echo $passPhrases[0]; ?></span>
                    </div>
                </li>
                <li>
                    <div class="flex items-center gap-2">
                        <span class="badge bg-chart-3 font-bold text-foreground w-16 text-center">KEY #2</span>
                        <span><?php echo $passPhrases[1]; ?></span>
                    </div>
                </li>
                <li>
                    <div class="flex items-center gap-2">
                        <span class="badge bg-chart-3 font-bold text-foreground w-16 text-center">KEY #3</span>
                        <span><?php echo $passPhrases[2]; ?></span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>