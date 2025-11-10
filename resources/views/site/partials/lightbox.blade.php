<div x-data="lightbox()" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center p-4 pointer-events-none">
    <div x-show="open" x-transition.opacity
        class="absolute inset-0 bg-black/80 backdrop-blur-sm pointer-events-auto" @click="close()"></div>

    <div x-show="open" x-transition
        class="pointer-events-auto max-w-[90%] max-h-[90%] w-full mx-auto relative">
        <div class="bg-transparent rounded shadow-lg overflow-hidden">
            <div class="flex items-center justify-between p-2">
                <button @click="prev()" class="p-2 rounded bg-white/10 text-white hover:bg-white/20">‹</button>
                <div class="text-white"> <span x-text="index + 1"></span> / <span x-text="items.length"></span> </div>
                <button @click="next()" class="p-2 rounded bg-white/10 text-white hover:bg-white/20">›</button>
            </div>

            <div class="bg-black flex items-center justify-center lightbox-media" style="min-height:300px;">
                <template x-if="items.length">
                    <div class="w-full h-full flex items-center justify-center">
                        <template x-if="items[index].type === 'video'">
                            <video x-bind:src="items[index].url" controls playsinline class="max-h-[80vh] max-w-full" x-ref="video">
                                Your browser does not support HTML5 video.
                            </video>
                        </template>
                        <template x-if="items[index].type !== 'video'">
                            <img x-bind:src="items[index].url" alt="" class="max-h-[80vh] max-w-full object-contain">
                        </template>
                    </div>
                </template>
            </div>

            <div class="flex items-center justify-end p-2">
                <button @click="close()" class="px-3 py-1 rounded bg-white text-black">Close</button>
            </div>
        </div>
    </div>
</div>
