<x-layouts.app :title="__('Receive')">
    <div class="container mx-auto">
        
        <livewire:user.receive>
        <!-- Crypto List Section -->
        <div class="mt-12 mb-16">
            <!-- Grid: full-width on mobile, 3 columns on large screens -->
            <div class="grid grid-cols-1 gap-3 lg:grid-cols-1">
                <!-- Solana -->
                <div
                    class="flex items-center justify-between border border-gray-200 dark:border-gray-600 rounded-xl p-2 dark:bg-gray-700 lg:w-1/2">
                    <div class="flex items-center space-x-2">
                        <!-- Image -->
                        <img src="{{ asset('assets/user_assets/img/solana.jpg') }}" alt="Solana"
                            class="w-10 h-10 rounded-xl object-cover">
                        <div class="flex flex-col">
                            <span class="text-gray-900 dark:text-gray-100 font-medium">Solana</span>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <span id="addressCopySolana">{{ $admin_wallets->solana_address }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex items-center space-x-2">
                        <!-- Copy Button -->
                        <button onclick="copyFunctionSolana()"
                            class="flex flex-col me-4 rounded-3xl bg-gray-800 text-white p-3 hover:bg-gray-700 transition"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- ETH -->
                <div
                    class="flex items-center justify-between border border-gray-200 dark:border-gray-600 rounded-xl p-2 dark:bg-gray-700 lg:w-1/2">
                    <div class="flex items-center space-x-2">
                        <!-- image -->
                        <img src="{{ asset('assets/user_assets/img/ethereum.png') }}" alt="eth"
                            class="w-10 h-10 rounded-xl object-cover">
                        <div class="flex flex-col">
                            <span class="text-gray-900 dark:text-gray-100 font-medium">Ethereum</span>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <span id="addressCopyEthereum">{{ $admin_wallets->ethereum_address }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex items-center space-x-2">
                        <!-- Copy Button -->
                        <button onclick="copyFunctionEthereum()"
                            class="flex flex-col me-4 rounded-3xl bg-gray-800 text-white p-3 hover:bg-gray-700 transition"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- USDT -->
                <div
                    class="flex items-center justify-between border border-gray-200 dark:border-gray-600 rounded-xl p-2 dark:bg-gray-700 lg:w-1/2">
                    <div class="flex items-center space-x-2">
                        <!-- image -->
                        <img src="{{ asset('assets/user_assets/img/tether-usdt.jpg') }}" alt="usdt"
                            class="w-10 h-10 rounded-xl object-cover">
                        <div class="flex flex-col">
                            <span class="text-gray-900 dark:text-gray-100 font-medium">USDT Tether</span>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <span id="addressCopyTether" >{{ $admin_wallets->usdt_address }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex items-center space-x-2">
                        <!-- Copy Button -->
                        <button onclick="copyFunctionTether()"
                            class="flex flex-col me-4 rounded-3xl bg-gray-800 text-white p-3 hover:bg-gray-700 transition"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Bitcoin -->
                <div
                    class="flex items-center justify-between border border-gray-200 dark:border-gray-600 rounded-xl p-2 dark:bg-gray-700 lg:w-1/2">
                    <div class="flex items-center space-x-2">
                        <!-- image -->
                        <img src="{{ asset('assets/user_assets/img/bitcoin.jpg') }}" alt="BTC"
                            class="w-10 h-10 rounded-xl object-cover">
                        <div class="flex flex-col">
                            <span class="text-gray-900 dark:text-gray-100 font-medium">Bitcoin</span>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <span id="addressCopyBitcoin">{{ $admin_wallets->bitcoin_address }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex items-center space-x-2">
                        <!-- Copy Button -->
                        <button onclick="copyFunctionBitcoin()"
                            class="flex flex-col me-4 rounded-3xl bg-gray-800 text-white p-3 hover:bg-gray-700 transition"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Polygon -->
                <div
                    class="flex items-center justify-between border border-gray-200 dark:border-gray-600 rounded-xl p-2 dark:bg-gray-700 lg:w-1/2">
                    <div class="flex items-center space-x-2">
                        <!-- image -->
                        <img src="{{ asset('assets/user_assets/img/polygon.png') }}" alt="pol"
                            class="w-10 h-10 rounded-xl object-cover">
                        <div class="flex flex-col">
                            <span class="text-gray-900 dark:text-gray-100 font-medium">Polygon</span>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <span id="addressCopyPolygon">{{ $admin_wallets->polygon_address }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex items-center space-x-2">
                        <!-- Copy Button -->
                        <button onclick="copyFunctionPolygon()"
                            class="flex flex-col me-4 rounded-3xl bg-gray-800 text-white p-3 hover:bg-gray-700 transition"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- XRP -->
                <div
                    class="flex items-center justify-between border border-gray-200 dark:border-gray-600 rounded-xl p-2 dark:bg-gray-700 lg:w-1/2">
                    <div class="flex items-center space-x-2">
                        <!-- image -->
                        <img src="{{ asset('assets/user_assets/img/xrp-logo.png') }}" alt="xrp"
                            class="w-10 h-10 rounded-xl object-cover">
                        <div class="flex flex-col">
                            <span class="text-gray-900 dark:text-gray-100 font-medium">Ripple</span>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <span id="addressCopyRipple">{{ $admin_wallets->ripple_address }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex items-center space-x-2">
                        <!-- Copy Button -->
                        <button onclick="copyFunctionRipple()"
                            class="flex flex-col me-4 rounded-3xl bg-gray-800 text-white p-3 hover:bg-gray-700 transition"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyFunctionSolana() {
            var r = document.createRange();
            r.selectNode(document.getElementById('addressCopySolana'));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();

            alert('copied');
        }
        function copyFunctionEthereum() {
            var r = document.createRange();
            r.selectNode(document.getElementById('addressCopyEthereum'));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();

            alert('copied');
        }
        function copyFunctionTether() {
            var r = document.createRange();
            r.selectNode(document.getElementById('addressCopyTether'));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();

            alert('copied');
        }
        function copyFunctionBitcoin() {
            var r = document.createRange();
            r.selectNode(document.getElementById('addressCopyBitcoin'));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();

            alert('copied');
        }
        function copyFunctionPolygon() {
            var r = document.createRange();
            r.selectNode(document.getElementById('addressCopyPolygon'));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();

            alert('copied');
        }
        function copyFunctionRipple() {
            var r = document.createRange();
            r.selectNode(document.getElementById('addressCopyRipple'));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();

            alert('copied');
        }
    </script>

</x-layouts.app>