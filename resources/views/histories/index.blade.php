<x-guest-layout>

    {{-- breadcumbs --}}
    <section id="breadcumbs" class="py-6">
        <x-container>
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div class="text-sm breadcrumbs">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                            <li class="font-semibold">Riwayat Pesanan Anda</li>
                        </ul>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir breadcumbs --}}
    @if (!empty($orders))
        {{-- cari produk --}}
        <section id="cari-produk" class="py-4">
            <x-container>
                <div class="flex flex-wrap justify-between items-center">
                    <div class="w-full md:w-1/2 px-4 mb-4">
                        <div class="w-full flex justify-between">
                            <div>
                                <h2 class="text-xl text-primary">Riwayat Pesanan Anda</h2>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 px-4">
                        <div class="form-control">
                            <div class="input-group">
                                <input type="text" placeholder="Search…" class="input input-bordered w-full" />
                                <button class="btn px-6 bg-secondary border-none hover:bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-container>
        </section>
        {{-- akhir cari produk --}}

        {{-- daftar --}}
        <section id="daftar" class="pt-4">
            <x-container>
                @php
                    $order = App\Models\Order::where('status', 1)
                        ->where('customer_name', Auth::user()->name)
                        ->sum('total_order_price');
                @endphp
                <div class="w-full flex justify-between px-4 mb-8">
                    <div>
                        <p>Level</p>
                        @if ($order > 100000 && $order < 200000)
                            <div class="badge bg-amber-900 border-0">Nanas</div>
                        @elseif ($order > 200000)
                            <div class="badge bg-yellow-500 border-0">Cokelat</div>
                        @else
                            <div class="badge bg-green-500 border-0">Pandan</div>
                        @endif
                    </div>

                    <div>
                        <h4>Total Pemesanan</h4>
                        <p class="font-semibold text-right">Rp. {{ $order }}</p>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full px-4 rounded-md">
                        <ul class="rounded-md">
                            @forelse ($orders as $order)
                                <div class="flex justify-between mb-4 bg-white shadow-md p-4">
                                    <li class="bg-white">
                                        <label for="harga" class="block mb-2 text-dark text-sm">Tanggal
                                            Pesanan</label>
                                        <span class="text-dark font-medium"> {{ $order->order_date }}</span>
                                    </li>
                                    <li class="bg-white">
                                        <label for="harga" class="block mb-2 text-dark text-sm">Harga</label>
                                        <span class="text-dark font-medium">
                                            Rp.{{ number_format($order->total_order_price) }}</span>
                                    </li>
                                    <li class="bg-white flex justify-center items-center">
                                        <a href="{{ route('history.show', $order->id) }}" class=" text-white px-2 py-2 bg-green-500 rounded-md"><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-eye-check" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M12 19c-4 0 -7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7c-.42 .736 -.858 1.414 -1.311 2.033">
                                                </path>
                                                <path d="M15 19l2 2l4 -4"></path>
                                            </svg></a>
                                    </li>
                                </div>
                            @empty
                            @endforelse

                        </ul>
                    </div>
                </div>
            </x-container>
        </section>
        {{-- akhir daftar --}}
    @else
        <h3 class="text-center">Tidak ada riwayat pemesanan Produk!</h3>
    @endif
    </x-app-layout>
