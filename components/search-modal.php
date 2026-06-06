<section id="search-modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center hidden z-50">
    <div class="relative bg-background rounded-lg p-6 w-96 scrollbar-thin scrollbar-thumb-rounded scrollbar-thumb-secondary/80">
        <button id="close-search-modal"
                class="absolute top-4 right-4 text-muted-foreground hover:text-foreground transition-colors cursor-pointer text-2xl leading-none">
            &times;
        </button>
        <h2 class="text-xl font-bold mb-4">Search Results</h2>
        <ul id="search-results" class="space-y-2 max-h-64 overflow-y-auto">
            <!-- Search results will be populated here -->
        </ul>
    </div>
</section>