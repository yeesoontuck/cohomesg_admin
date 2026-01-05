<x-app>
    <main id="main" class="flex-1 dark:text-white">

        <h3 class="text-lg mb-4">Map Embed URL</h3>

        <p class="mb-8">
            The Map Embed URL is HTML code that embeds a Google Map location.<br />
            Follow the steps below to obtain this code.
        </p>

        <div class="mb-8 border border-gray-400 rounded-lg p-4">
            <ol start="0" class="list-decimal list-outside ml-8 mb-4">
                <li>Go to <a href="https://maps.google.com" class="link-underline" target="_blank">Google Maps</a></li>
                <li>Search for the Property by address or name</li>
                <li>Pan and Zoom to the desired view</li>
            </ol>
            <img src="{{ asset('/images/help/map_url_1.png') }}" alt="">
        </div>

        <div class="mb-8 border border-gray-400 rounded-lg p-4">
            <ol start="3" class="list-decimal list-outside ml-8 mb-4">
                <li>Click the Share button</li>
            </ol>
            <img src="{{ asset('/images/help/map_url_2.png') }}" alt="">
        </div>

        <div class="mb-8 border border-gray-400 rounded-lg p-4">
            <ol start="4" class="list-decimal list-outside ml-8 mb-4">
                <li>Click the "Embed a map" tab</li>
                <li>Click "Copy HTML"</li>
            </ol>
            <img src="{{ asset('/images/help/map_url_3.png') }}" alt="">
        </div>

        <div class="mb-8 border border-gray-400 rounded-lg p-4">
            <ol start="4" class="list-decimal list-outside ml-8 mb-4">
                <li>Paste the code into the field</li>
            </ol>
            <img src="{{ asset('/images/help/map_url_4.png') }}" alt="">
        </div>
    </main>
</x-app>