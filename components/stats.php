<section id="stats-modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center hidden z-50">
    <div class="modal-box bg-muted border border-border shadow-2xl p-6 w-full max-w-sm relative">
        <button id="close-stats"
                class="absolute top-4 right-4 text-muted-foreground hover:text-foreground transition-colors cursor-pointer text-2xl leading-none">
            &times;
        </button>
        <div class="flex items-center gap-4 mb-5">
            <img id="stats-img" src="" alt="" class="w-16 h-16 object-cover object-center shadow border-2 border-primary">
            <div>
                <h2 id="stats-name" class="text-xl font-bold text-foreground"></h2>
                <p  id="stats-meta" class="text-xs text-muted-foreground"></p>
            </div>
        </div>

        <!-- chart -->
        <div class="relative w-full flex items-center justify-center">
            <canvas id="stats-radar"></canvas>
        </div>
        <div id="stats-legend" class="mt-4 grid grid-cols-5 gap-1 text-center"></div>
    </div>
</section>