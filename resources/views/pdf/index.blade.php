<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Documents</h1>
            <a href="{{ route('documents.create') }}"
                class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-2 py-1 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="size-4 fill-on-primary dark:fill-on-primary-dark" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                        clip-rule="evenodd" />
                </svg>
                New Document
            </a>
        </div>

        @if(session('toast'))
        <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
        @endif
        
        <div
            class="overflow-hidden w-full overflow-x-auto rounded-t-radius border border-outline dark:border-outline-dark">
            <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
                <thead
                    class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                    <tr>
                        <th scope="col" class="p-4">Document</th>
                        <th scope="col" class="p-4">Type</th>
                        <th scope="col" class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline dark:divide-outline-dark">

                    @foreach ($documents as $document)
                        <tr>
                            <td class="p-4">{{ $document->name }}</td>
                            <td class="p-4">{{ $document->template }}</td>
                            <td class="p-4">
                                {{-- do not use Alpine Ajax for the Edit route, Quill cannot initialize --}}
                                <a href="{{ route('documents.edit', $document) }}" class="inline-block btn-primary px-2 py-1 text-xs rounded">
                                    Edit
                                </a>
                                @if($document->id > 28)
                                    <form action="{{ route('documents.destroy', $document) }}" method="post" class="inline"
                                        @click="if (!confirm('Are you sure you want to proceed?')) $event.preventDefault()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger px-2 py-1 text-xs rounded">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </main>
</x-app>
