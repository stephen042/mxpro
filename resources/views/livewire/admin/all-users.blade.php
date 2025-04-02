<div class="bg-gray-900 shadow-lg rounded-xl overflow-hidden">
    <!-- Header -->
    <div class="p-6 border-b border-gray-700 flex items-center justify-between">
        <h2 class="text-xl font-semibold text-gray-200">All Users</h2>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-900 dark:text-gray-300">
            <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                <tr class="text-sm font-semibold">
                    <th class="px-6 py-4">S/N</th>
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Reg Date</th>
                    <th class="px-6 py-4">Country</th>
                    <th class="px-6 py-4">Balance</th>
                    <th class="px-6 py-4">Sub Balance</th>
                    <th class="px-20 py-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr
                    class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <!-- Profile Picture + Email & Name -->
                    <td class="px-6 py-4 flex items-center justify-between space-x-2.5">
                        <!-- Profile picture at the right -->
                        <img class="w-10 h-10 rounded-full object-contain" src="{{ asset('assets/logo.png') }}"
                            alt="Profile Picture">
                        <!-- Text container -->
                        <div class="flex flex-col">
                            <span class="font-medium text-gray-900 dark:text-gray-100">{{ $user->name }}</span>
                            <span class="font-medium text-gray-700 dark:text-gray-400">{{ $user->email }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">{{ $user->created_at->format('d M, Y') }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">{{ $user->country }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">${{ number_format($user->balance,
                        2) }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">${{
                        number_format($user->sub_balance, 2) }}</td>
                    <!-- Action buttons -->
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.user.edit', $user->id) }}"
                                class="flex items-center space-x-1 px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded hover:bg-blue-700 transition">
                                <!-- Pencil Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M16.5 3.5l4 4L10 18H6v-4l10.5-10.5z" />
                                </svg>
                                <span>Edit</span>
                            </a>

                            <!-- Delete Button -->
                            <button type="button" wire:click="deleteUser({{ $user->id }})"
                                wire:confirm="Are you sure you want to delete this user?"
                                class="flex items-center space-x-1 px-3 py-1 bg-red-600 text-white text-xs font-semibold rounded hover:bg-red-700 transition">
                                <!-- Trash Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a2 2 0 00-2 2v0a2 2 0 002 2h4a2 2 0 002-2v0a2 2 0 00-2-2m-4 0h4" />
                                </svg>
                                <span>Delete</span>
                            </button>

                            <!-- Deactivate or Activate Button -->
                            @if ($user->account_hold == 2)
                            <button type="button" wire:click="deactivateUser({{ $user->id }})" wire:confirm="Are you sure you want to Deactivate this user?"
                                class="flex items-center space-x-1 px-3 py-1 bg-yellow-600 text-white text-xs font-semibold rounded hover:bg-yellow-700 transition">
                                <!-- X Circle Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Deactivate</span>
                            </button>
                            @else
                            <button type="button" wire:click="activateUser({{ $user->id }})" wire:confirm="Are you sure you want to Activate this user?"
                                class="flex items-center space-x-1 px-3 py-1 bg-green-600 text-white text-xs font-semibold rounded hover:bg-green-700 transition">
                                <!-- Check Circle Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M12 22a10 10 0 100-20 10 10 0 000 20z" />
                                </svg>
                                <span>Activate</span>
                            </button>
                            @endif
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Pagination -->
    <div class="p-6 bg-gray-900 border-t border-gray-700">
        {{ $users->links('pagination::tailwind') }}
    </div>
    <x-alert />
</div>