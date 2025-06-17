<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Update Profile --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete Account --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            {{-- Riwayat Transaksi --}}
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                    Riwayat Transaksi
                </h3>

                @if ($orders->isEmpty())
    <p class="text-gray-600 dark:text-gray-300">Belum ada transaksi.</p>
@else
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto text-sm text-left text-gray-700 dark:text-gray-200">
            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Nama Produk</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Qty</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800">
                @php $counter = 1; @endphp
                @foreach ($orders as $order)
                    @foreach ($order->orderItems as $item)
                        <tr class="border-t border-gray-200 dark:border-gray-700">
                            <td class="px-4 py-2">{{ $counter++ }}</td>
                            <td class="px-4 py-2">{{ $item->product->name ?? 'Produk tidak tersedia' }}</td>
                            <td class="px-4 py-2">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $item->quantity }}</td>
                            <td class="px-4 py-2 capitalize">{{ $order->status ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endif
            </div>

        </div>
    </div>
</x-app-layout>
