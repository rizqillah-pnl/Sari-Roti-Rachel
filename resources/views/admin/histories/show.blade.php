<x-app-layout>
    {{-- semua-order-detail --}}
    <section id="semua-produk">
        <x-container>
            {{-- breadcumbs --}}
            <section id="breadcumbs" class="pt-6">
                <x-container>
                    <div class="flex flex-wrap">
                        <div class="w-full px-4">
                            <div class="text-sm breadcrumbs">
                                <ul>
                                    <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                                    <li><a href="{{ route('admin.history') }}">Riwayat</a></li>
                                    <li class="font-semibold">Detail Riwayat Pemesanan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </x-container>
            </section>
            {{-- Akhir breadcumbs --}}

            <div class="flex flex-wrap rounded-md">
                @foreach ($order_details as $order)
                    <div class="w-full md:w-1/3 px-4 rounded-md mb-4">
                        <div class="w-full bg-white rounded-md shadow-md">
                            <div class="p-4">
                                <h3 class="pt-4 pb-2 text-xl font-bold text-primary">{{ $order->product->name }}</h3>
                                <div>
                                    <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//95/MTA-13708732/sari-roti_sari-roti-sobek-coklat-keju-216-gr_full01.jpg"
                                        alt="" class="w-24 h-24 md:w-32 md:h-32 mx-left">
                                </div>
                                <table class="table w-full">
                                    <!-- head -->
                                    <tbody>
                                        <tr>
                                            <td>Jumlah</td>
                                            <td>: {{ $order->order_quantity }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>: <strong> Rp. {{ $order->total_price }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">{{ $order->product->description }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-container>
    </section>
    {{-- akhir semua-order-detail --}}
</x-app-layout>
