<x-guest-layout>

    {{-- breadcumbs --}}
    <section id="breadcumbs" class="py-12">
        <x-container>
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div class="text-sm breadcrumbs">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                            <li><a href="{{ route('history') }}">Riwayat Pemesanan</a></li>
                            <li class="font-semibold">Rincian Riwayat Pemesanan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir breadcumbs --}}

    {{-- semua-order-detail --}}
    <section id="semua-produk">
        <x-container>
             <div class="flex flex-wrap px-4 mb-8">
                <div class="w-full flex items-center bg-white py-2 px-4 shadow-md rounded-md text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text"
                        width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                        </path>
                        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                        <path d="M9 12h6"></path>
                        <path d="M9 16h6"></path>
                    </svg>
                    <h2 class="px-4 font-semibold py-5 text-2xl">Rincian Riwayat Pesanan</h2>
                </div>
            </div>
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
                                            <td>: <strong>  Rp. {{ $order->total_price }}</strong></td>
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
</x-guest-layout>
