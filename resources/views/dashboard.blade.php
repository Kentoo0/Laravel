<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 rounded shadow">
                <p>Selamat datang, {{ Auth::user()->name }}!</p>
                <p>Anda login sebagai <strong>Admin</strong>.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-bold">Total Pengguna</h3>
                    <p class="text-2xl">{{ $totalUsers }}</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-bold">Total Pesanan</h3>
                    <p class="text-2xl">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
