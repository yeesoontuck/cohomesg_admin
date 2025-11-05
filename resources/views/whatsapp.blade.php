<x-app>
    <div x-data="{
        fetchMessages() {
            fetch('{{ route('whatsapp.latest', $user) }}')
                .then(res => res.text())
                .then(html => {
                    this.$refs.messages.innerHTML = html;
                });
        },
        init() {
            setInterval(() => this.fetchMessages(), 5000);
        }
    }"
    class="flex-1 flex flex-col">

        {{-- Scrollable messages window --}}
        <div x-ref="messages" class="flex-1 p-4 overflow-y-auto flex flex-col gap-4">
            @include('whatsapp_messages_partial')
        </div>

    </div>

    <div class="flex flex-col pt-6">
        {{-- Message input form --}}
        <form action="{{ route('whatsapp.send') }}" method="POST" id="whatsapp-form">
            @csrf
            <input type="hidden" name="to" value="{{ $user->phone_number }}" readonly class="" />

            <div class="flex items-center gap-2">
                <input type="text" name="text" placeholder="Type a message" autocomplete="off" required
                    x-init="$nextTick(() => {
                        $el.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        $el.focus();
                    });"
                    class="flex-1 px-4 py-2 rounded-radius border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 bg-surface-alt dark:bg-surface-dark-alt text-gray-900 dark:text-white" />

                <button type="submit" class="btn-success h-10">
                    Send
                </button>
            </div>
        </form>
    </div>
</x-app>
