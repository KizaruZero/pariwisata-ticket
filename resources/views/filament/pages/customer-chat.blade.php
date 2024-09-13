<x-filament::page>
    <div id="chatify-container" style="height: calc(100vh - 2rem); margin: -1rem;">
        <iframe src="{{ route('Chat') }}" frameborder="0" style="width: 100%; height: 100%;"></iframe>
    </div>

    @push('scripts')
        <script>
            function adjustIframeHeight() {
                const container = document.getElementById('chatify-container');
                const availableHeight = window.innerHeight - container.offsetTop;
                container.style.height = `${availableHeight}px`;
            }

            window.addEventListener('resize', adjustIframeHeight);
            window.addEventListener('load', adjustIframeHeight);
        </script>
    @endpush
</x-filament::page>
