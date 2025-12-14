<x-app>
    <div x-data="{
        timer: null,

        handle(item, position) {
            // Clear previous timer
            clearTimeout(this.timer);

            this.timer = setTimeout(() => {
                // Do your reorder + POST here
                const ordered = Array.from($el.querySelectorAll('li'))
                    .map((el, index) => ({
                        id: el.id,
                        sort_order: index + 1
                    }));

                fetch('/tested}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ order: ordered })
                });
            }, 500); // 500ms debounce
        }
    }">
        {{--   send a POST with all the <li> ids and positions, to update the position in database, using AlpineJS version 3 --}}
        <ul x-sort="handle">
            <li x-sort:item="1" id="1">foo</li>
            <li x-sort:item="2" id="2">bar</li>
            <li x-sort:item="3" id="3">baz</li>
        </ul>
    </div>
</x-app>
