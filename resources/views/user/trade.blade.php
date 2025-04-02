<x-layouts.app :title="__('Dashboard')">
    <div class="container">
        <div class="w-full p-3 h-96">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow"
                        target="_blank"><span class="blue-text"></span></a></div>
                <script type="text/javascript"
                    src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                    {
                        "symbol": "CRYPTOCAP:SOL",
                        "width": "100%",
                        "height": "100%",
                        "locale": "en",
                        "dateRange": "12M",
                        "colorTheme": "dark",
                        "isTransparent": false,
                        "autosize": true,
                        "largeChartUrl": ""
                    }
                </script>
            </div>
            <!-- TradingView Widget END -->
        </div>

        <!-- Progress Bar Card -->
        <div class="border-t border-gray-500 lg:w-1/2 w-full max-w-md py-2 my-5 mx-3">
            <div class="text-center mt-2 mb-2">
                <span class="text-gray-900 dark:text-gray-100 font-semibold">Signal Strength</span>
            </div>

            <div class="relative w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                <!-- Progress Bar -->
                <div class="bg-red-500 h-3 rounded-full transition-all duration-300 relative"
                    style="width: {{auth()->user()->signal_strength}}%;">
                    <!-- Progress Value Text -->
                    <span class="absolute right-2 top-1/2 transform -translate-y-1/2 text-xs text-white font-semibold">
                        {{auth()->user()->signal_strength}}%
                    </span>
                </div>
            </div>
        </div>

        <livewire:user.trade />
    </div>
</x-layouts.app>