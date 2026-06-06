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