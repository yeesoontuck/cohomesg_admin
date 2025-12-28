<x-app>

    @if(session('toast'))
        <x-toast :type="session('toast.type')">{{ session('toast.message') }}</x-toast>
    @endif

    <main class="flex-1 dark:text-white">

        <h3 class="text-lg mb-4">Create Tenancy Agreement</h3>

        <div class="overflow-hidden w-full overflow-x-auto">

            <p><u>Available variables</u> (include the [ ] brackets)</p>

            <table class="my-2 table-auto">
                <thead>
                    <tr class="border-b-1">
                        <th>copy</th>
                        <th>Variable</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($variables as $var)
                        <tr class="even:bg-surface-alt dark:even:bg-primary-dark/20 border-b-1 border-on-surface/20">
                            <td class="px-4 pt-1">
                                <button
                                    class="copy-btn inline-block text-blue-700 dark:text-blue-400 text-xs cursor-pointer"
                                    title="copy">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                    </svg>
                                </button>
                            </td>
                            <td class="px-4">{{ '[' . $var->variable . ']' }}</td>
                            <td class="px-8">{{ $var->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form action="{{ route('documents.store') }}" method="POST" class="p-8 overflow-hidden w-full max-w-4xl overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
                @csrf

                <div class="mb-4 flex w-full flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                    <label for="name" class="w-fit pl-0.5 text-sm">Document Name</label>
                    <input id="name" type="text" name="name" maxlength="255"
                        class="w-full rounded-radius border border-outline bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                        value="{{ old('name') }}" placeholder="Document" required />
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Pass the document variables to the editor so toolbar buttons can be generated --}}
                <x-quill-editor name="content" id="editor" defaultValue="" variables="{!! $variable_string !!}" />

                @error('content')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror

                <button type="submit" class="inline-block btn-primary mt-2">Save</button>
            </form>

            <a class="inline-block btn-info mt-2" href="{{ route('documents.pdf', 1) }}">PDF</a>

        </div>
    </main>

    @push('scripts')
        <script>
            const buttons = document.querySelectorAll('.copy-btn');

            buttons.forEach(btn => {
                btn.addEventListener('click', (event) => {
                    const button = event.currentTarget;

                    // Find the parent row
                    const tr = button.closest('tr');

                    // Find the <p> tag specifically inside this tr
                    const variable_cell = tr.querySelector('td:nth-child(2)');

                    // Get text and copy (No need to clone or strip HTML!)
                    const textToCopy = variable_cell.innerText;

                    navigator.clipboard.writeText(textToCopy).then(() => {
                        // Feedback
                        const originalHtml = button.innerHTML;
                        button.innerText = 'Copied!';
                        button.style.color = 'green';
                        setTimeout(() => {
                            button.innerHTML = originalHtml;
                            button.style.color = '';
                        }, 1500);
                    });
                });
            });
        </script>
    @endpush

</x-app>
