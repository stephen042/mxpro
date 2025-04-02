<x-layouts.app :title="__('Swap')">
    <div class="container mx-auto">
        <div class="flex flex-col p-3 rounded-lg lg:w-1/1 max-w-sm my-2 space-y-4">
            <!-- Crypto Converter ⚡ Widget -->
            <crypto-converter-widget shadow symbol live background-color="#383a59" border-radius="0.67rem"
                fiat="united-states-dollar" crypto="bitcoin" amount="1" font-family="sans-serif" decimal-places="2">
            </crypto-converter-widget>
            <a href="#" target="_blank" rel="noopener">
            </a>
            <script async src="https://cdn.jsdelivr.net/gh/dejurin/crypto-converter-widget@1.5.2/dist/latest.min.js">
            </script>
            <!-- /Crypto Converter ⚡ Widget -->
        </div>
    </div>
</x-layouts.app>