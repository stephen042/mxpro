<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-6 w-full">
    <!-- Balance Card -->
    <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6 w-full overflow-hidden box-border">
        <!-- Credit User Balance -->
        <form wire:submit.prevent="credit_balance">
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Credit User Balance Manually (Earnings)
                </label>
                <div class="flex w-full min-w-0">
                    <input type="number" wire:model.live="credit_bal_amount" placeholder="Credit User Balance"
                        class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    <button type="submit"
                        class="px-4 py-2 border border-green-600 text-green-600 hover:bg-green-600 hover:text-white text-xs font-semibold rounded-r-md focus:ring focus:ring-green-300">
                        Credit
                    </button>
                </div>
                @error('credit_bal_amount')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </form>
        <!-- Debit User Balance -->
        <form wire:submit.prevent="debit_balance">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Debit User Balance Manually (Earnings)
                </label>
                <div class="flex w-full min-w-0">
                    <input type="number" wire:model.live="debit_bal_amount" placeholder="Debit User Balance"
                        class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-md placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-gray-200">
                    <button type="submit"
                        class="px-4 py-2 border border-red-600 text-red-600 hover:bg-red-600 hover:text-white text-xs font-semibold rounded-r-md focus:ring focus:ring-red-300">
                        Debit
                    </button>
                </div>
                @error('debit_bal_amount')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </form>
    </div>

    <!-- Sub Balance Card -->
    <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6 w-full overflow-hidden box-border">
        <!-- Credit User Sub Balance -->
        <form wire:submit.prevent="credit_sub_balance">
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Credit User Sub Balance Manually (Deposited Balance) 
                </label>
                <div class="flex w-full min-w-0">
                    <input type="number" wire:model.live="credit_sub_bal_amount" placeholder="Credit User Sub Funds"
                        class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-md placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-gray-200">
                    <button type="submit"
                        class="px-4 py-2 border border-green-600 text-green-600 hover:bg-green-600 hover:text-white text-xs font-semibold rounded-r-md focus:ring focus:ring-green-300">
                        Credit
                    </button>
                </div>
                @error('credit_sub_bal_amount')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </form>
        <!-- Debit User Sub Balance -->
        <form wire:submit.prevent="debit_sub_balance">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Debit User Sub Balance Manually (Deposited Balance) 
                </label>
                <div class="flex w-full min-w-0">
                    <input type="number" wire:model.live="debit_sub_bal_amount" placeholder="Debit User Sub Funds"
                        class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-md placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-gray-200">
                    <button type="submit"
                        class="px-4 py-2 border border-red-600 text-red-600 hover:bg-red-600 hover:text-white text-xs font-semibold rounded-r-md focus:ring focus:ring-red-300">
                        Debit
                    </button>
                </div>
                @error('debit_sub_bal_amount')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </form>
    </div>

    <!-- Trade Card -->
    {{-- <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6 w-full overflow-hidden box-border">
        <!-- Edit Free Margin -->
        <form wire:submit.prevent="update_free_margin">
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Edit User Trade Free Margin
                </label>
                <div class="flex w-full min-w-0">
                    <input type="text" wire:model.live="free_margin" placeholder="update trade free margin"
                        class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    <button type="submit"
                        class="px-4 py-2 border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white text-xs font-semibold rounded-r-md focus:ring focus:ring-blue-300">
                        update
                    </button>
                </div>
                @error('free_margin')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </form>
        <!-- Update Equity -->
        <form wire:submit.prevent="update_equity">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Top Up User Trade Earnings
                </label>
                <div class="flex w-full min-w-0">
                    <input type="text" wire:model.live="earnings" placeholder="Top Up User Trade Earnings"
                        class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-md placeholder-gray-400 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:text-gray-200">
                    <button type="submit"
                        class="px-4 py-2 border border-yellow-600 text-yellow-600 hover:bg-yellow-600 hover:text-white text-xs font-semibold rounded-r-md focus:ring focus:ring-yellow-300">
                        Update
                    </button>
                </div>
                @error('earnings')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </form>
    </div> --}}

    <!-- Account Status & Email Card -->
    <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6 w-full overflow-hidden box-border">
        <!-- Email User -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Email User
            </label>
            <div class="flex w-full min-w-0">
                <input type="email" readonly value="{{ $user->email }}"
                    class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-md bg-gray-50 dark:bg-gray-600 text-gray-700 dark:text-gray-200">
                <a href="mailto:{{ $user->email }}"
                    class="flex items-center justify-center px-4 py-2 border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white text-xs font-semibold rounded-r-md focus:ring focus:ring-blue-300">
                    <i class="far fa-envelope mr-1"></i> Send
                </a>
            </div>
        </div>
    </div>
</div>
