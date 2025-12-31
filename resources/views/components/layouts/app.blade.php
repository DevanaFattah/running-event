<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        {{ $slot }}
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </flux:main>
</x-layouts.app.sidebar>
