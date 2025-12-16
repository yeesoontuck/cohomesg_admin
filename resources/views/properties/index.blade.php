<x-app>
    <main class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Properties</h1>
            <a href="{{ route('properties.create') }}"
                class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-2 py-1 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="size-4 fill-on-primary dark:fill-on-primary-dark" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                        clip-rule="evenodd" />
                </svg>
                New Property
            </a>
        </div>


        <div x-data="{
        
            showToast: false,
            toastMessage: '',
            timer: null,
        
            handleSort: function(item, position) {
                clearTimeout(this.timer);
                const self = this;
        
                this.timer = setTimeout(() => {
        
                    const ordered = Array.from(document.querySelectorAll('table tbody tr'))
                        .map((el, index) => ({
                            id: el.id,
                            sort_order: index + 1
                        }));
        
                    fetch('{{ route('properties.sort') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ order: ordered })
                        })
                        .then(r => r.json())
                        .then(data => {
                            {{-- console.log('Setting toast:', data.message); --}}
                            const toastEl = document.getElementById('sortToast');
                            const messageEl = document.getElementById('toastMessage');
        
                            messageEl.textContent = data.message;
                            toastEl.classList.remove('hidden');
        
                            setTimeout(() => {
                                toastEl.classList.add('hidden');
                            }, 3500);
                        })
                        .catch(err => {
                            {{-- console.error('Sort error:', err); --}}
                            self.toastMessage = 'Error sorting properties';
                            self.showToast = true;
        
                            setTimeout(() => {
                                self.showToast = false;
                            }, 3500);
                        });
        
                }, 500); // 500ms debounce
            }
        }">
            {{-- toast when sort order saved --}}
            <div id="sortToast" class="hidden fixed top-20 right-4 z-50" x-transition.opacity.duration.300ms>
                <div class="rounded-xl px-6 py-4 shadow-lg text-white font-medium bg-success/80 backdrop-blur-sm">
                    <span id="toastMessage"></span>
                </div>
            </div>


            <div
                class="overflow-hidden w-full overflow-x-auto rounded-t-radius border border-outline dark:border-outline-dark">
                <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
                    <thead
                        class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                        <tr>
                            <th>&nbsp;</th>
                            <th scope="col" class="p-4">Property</th>
                            <th scope="col" class="p-4">Address</th>
                            <th scope="col" class="p-4">District</th>
                            <th scope="col" class="p-4">Rooms</th>
                            <th scope="col" class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline dark:divide-outline-dark" x-sort="handleSort">
                        @foreach ($properties as $property)
                            <tr x-sort:item="{{ $property->id }}" id="{{ $property->id }}">
                                <td class="bg-primary/6 dark:bg-primary-dark/20 cursor-ns-resize w-4 border-r-1 border-outline dark:border-outline-dark" x-sort:handle>
                                    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" class="w-4 h-4" 
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 10H19M14 19L12 21L10 19M14 5L12 3L10 5M5 14H19" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </td>

                                <td class="p-4">
                                    {{ $property->property_name }}<br />
                                    <span class="text-gray-500">({{ $property->property_type }})</span>
                                </td>
                                <td class="p-4">
                                    {{ $property->address }}<br />
                                </td>
                                <td class="p-4">D{{ $property->district_id }}
                                    {{ $property->district->district_name }}
                                </td>
                                <td class="p-4 flex">
                                    @foreach ($property->rooms as $room)
                                        @php $occupied = rand(0, 1); @endphp
                                        <div class="{{ $occupied ? 'text-green-600' : '' }}"
                                            title="{{ $room->room_number }}">
                                            @if ($occupied)
                                                {{-- occupied --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-6">
                                                    <path
                                                        d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                                                    <path
                                                        d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                                                </svg>
                                            @else
                                                {{-- empty --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                                </svg>
                                            @endif
                                        </div>
                                    @endforeach
                                </td>
                                <td class="p-4">
                                    <a href="{{ route('properties.show', $property) }}"
                                        class="inline-block btn-primary px-2 py-1 text-xs">
                                        Details
                                    </a>
                                    <a href="{{ route('rooms.index', $property) }}"
                                        class="inline-block btn-success px-2 py-1 text-xs">
                                        Rooms
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>


            </div>
        </div>

    </main>
</x-app>
