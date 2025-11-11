// Alpine lightbox component (Tailwind-friendly)
// Scans for elements with [data-lb-url] and attaches click handlers.
// Usage: add data-lb-url, data-lb-thumb, data-lb-type ("video" or omit), data-lb-autoplay (true/false), data-lb-muted (true/false)

// Provide a global factory so x-data="lightbox()" works even if this file is imported
window.lightbox = function () {
    return {
        open: false,
        index: 0,
        items: [],
        init() {
            // build items from DOM elements that have data-lb-url
            const nodes = Array.from(document.querySelectorAll('[data-lb-url]'))
            this.items = nodes.map((el, i) => {
                const group = el.getAttribute('data-lb-group') || 'default'
                // attach click handler to open within its group
                el.addEventListener('click', (ev) => {
                    ev.preventDefault()
                    this.openGroupAt(group, i)
                })

                return {
                    url: el.getAttribute('data-lb-url'),
                    thumb: el.getAttribute('data-lb-thumb') || null,
                    type: el.getAttribute('data-lb-type') || 'image',
                    autoplay: el.getAttribute('data-lb-autoplay') === 'true',
                    muted: el.getAttribute('data-lb-muted') === 'true',
                    group
                }
            })

            // keyboard navigation
            this._keydownHandler = (e) => {
                if (!this.open) return
                if (e.key === 'Escape') this.close()
                if (e.key === 'ArrowRight') this.next()
                if (e.key === 'ArrowLeft') this.prev()
            }
            document.addEventListener('keydown', this._keydownHandler)
        },
        destroy() {
            // cleanup keydown listener
            document.removeEventListener('keydown', this._keydownHandler)
        },
        openAt(i) {
            // legacy: open flat list index (opens default group or first group that contains item)
            const item = this.items[i]
            const group = (item && item.group) || 'default'
            this.openGroupAt(group, i)
        },

        openGroupAt(group, globalIndex) {
            this.currentGroup = group || 'default'
            this.groupItems = this.items.filter(it => it.group === this.currentGroup)
            // find index within group
            const globalItem = this.items[globalIndex]
            const url = globalItem ? globalItem.url : null
            this.index = Math.max(0, this.groupItems.findIndex(it => it.url === url))
            if (this.index === -1) this.index = 0
            this.open = true
            this.$nextTick(() => this._playCurrentIfVideo())
        },
        close() {
            this._pauseCurrentIfVideo()
            this.open = false
        },
        prev() {
            this._pauseCurrentIfVideo()
            if (!this.groupItems || !this.groupItems.length) return
            this.index = (this.index - 1 + this.groupItems.length) % this.groupItems.length
            this.$nextTick(() => this._playCurrentIfVideo())
        },
        next() {
            this._pauseCurrentIfVideo()
            if (!this.groupItems || !this.groupItems.length) return
            this.index = (this.index + 1) % this.groupItems.length
            this.$nextTick(() => this._playCurrentIfVideo())
        },
        _currentItem() {
            return (this.groupItems && this.groupItems[this.index]) || null
        },
        _playCurrentIfVideo() {
            this.$nextTick(() => {
                const container = this.$root || document.body
                const video = container.querySelector('.lightbox-media video')
                if (video) {
                    // set muted/autoplay attributes based on item
                    const item = this._currentItem()
                    if (item) {
                        video.muted = !!item.muted
                        if (item.autoplay) {
                            // try play, ignore promise
                            const p = video.play()
                            if (p && p.catch) p.catch(()=>{})
                        }
                    }
                }
            })
        },
        _pauseCurrentIfVideo() {
            this.$nextTick(() => {
                const container = this.$root || document.body
                const video = container.querySelector('.lightbox-media video')
                if (video && !video.paused) {
                    try { video.pause() } catch (e) { }
                }
            })
        }
    }
}

// If Alpine is already present, also register via Alpine.data for convenience
if (window.Alpine && window.Alpine.data) {
    try {
        window.Alpine.data('lightbox', window.lightbox)
    } catch (e) {
        // ignore
    }
}
