<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Activity Logs</h1>
        </div>
        <h3 class="text-lg mb-4">
            <a x-target.push="main" href="{{ route('rooms.edit', [$property, $room]) }}"
                class="inline-block btn-info text-xs py-1 px-2 mr-2">&lt; Back</a>
            {{ $property->property_name }} - {{ $room->room_number }}
        </h3>

        <div class="overflow-hidden w-full p-4 overflow-x-auto rounded-t-radius border border-outline dark:border-outline-dark">
            <table class="table-auto text-xs w-full">
                <thead>
                    <tr class="border-b-2 border-outline dark:border-outline-dark">
                        <th class="px-2 text-left">Date/Time</th>
                        <th class="px-2 text-left">User</th>
                        <th class="px-2 text-left">Event</th>
                        {{-- <th class="px-2 text-left"></th> --}}
                        {{-- <th class="px-2 text-left"></th> --}}
                        <th class="px-2 text-left">Old Values</th>
                        <th class="px-2 text-left">New Values</th>
                        {{-- <th class="px-2 text-left">URL</th> --}}
                        <th class="px-2 text-left">IP&nbsp;Address</th>
                        <th class="px-2 text-left">URL<br />User Agent</th>
                        {{-- <th class="px-2 text-left"></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse($audits as $audit)
                    <tr class="not-last:border-b border-outline dark:border-outline-dark odd:bg-surface-alt dark:odd:bg-surface-dark-alt" valign="top">
                        <td class="p-2 whitespace-nowrap border-r border-outline dark:border-outline-dark">{{ $audit->created_at }}</td>
                        <td class="p-2 border-r border-outline dark:border-outline-dark">{{ $audit->user->name }}</td>
                        <td class="p-2 border-r border-outline dark:border-outline-dark">{{ $audit->event }}</td>
                        {{-- <td class="p-2">{{ $audit->auditable_type }}</td> --}}
                        {{-- <td class="p-2">{{ $audit->auditable_id }}</td> --}}
                        <td class="p-2 border-r border-outline dark:border-outline-dark">
                            @foreach($audit->old_values as $key => $value)
                            <p class="whitespace-nowrap">{{ $key }}: {{ $value }}</p>
                            @endforeach
                        </td>
                        <td class="p-2 border-r border-outline dark:border-outline-dark">
                            @foreach($audit->new_values as $key => $value)
                            <p class="whitespace-nowrap">{{ $key }}: {{ $value }}</p>
                            @endforeach
                        </td>
                        {{-- <td class="p-2">{{ $audit->url }}</td> --}}
                        <td class="p-2 border-r border-outline dark:border-outline-dark">{{ $audit->ip_address }}</td>
                        <td class="p-2 max-w-md">{{ $audit->url }}<br />{{ $audit->user_agent }}</td>
                        {{-- <td class="p-2">{{ $audit->tags }}</td> --}}
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center p-2">- no records found -</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </main>
</x-app>
