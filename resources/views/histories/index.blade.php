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

        {{-- daftar --}}
        <section id="daftar" class="py-12">
            <x-container>
                <div class="flex flex-wrap px-4 mb-8">
                    <div class="w-full flex items-center bg-white py-2 px-4 shadow-md rounded-md text-primary">
                        <div class="flex flex-wrap w-full items-center">
                            <div class="w-full md:w-1/2 flex items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-shopping-cart" width="40" height="40"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="6" cy="19" r="2"></circle>
                                    <circle cx="17" cy="19" r="2"></circle>
                                    <path d="M17 17h-11v-14h-2"></path>
                                    <path d="M6 5l14 1l-1 7h-13"></path>
                                </svg>
                                <h2 class="px-4 font-semibold py-4 text-2xl">Riwayat Pesanan</h2>
                            </div>
                            <div class="w-full md:w-1/2 float-right">
                                <div class="form-control">
                                    <form action="{{ route('admin.customers') }}" method="get">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" placeholder="Search…" name="search"
                                                class="input input-bordered w-full" value="{{ request('search') }}" />
                                            <button type="submit"
                                                class="btn px-6 bg-secondary border-none hover:bg-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @php
                    $order = App\Models\CustomerOrder::where('status', 1)
                        ->where('name', Auth::user()->name)
                        ->sum('price');
                @endphp
                <div class="w-full flex justify-between px-4 mb-8">
                    <div>
                        <p>Level</p>
                        @if (Auth::user()->member === 3)
                            <div class="flex flex-col">
                                <div class="badge bg-amber-900 border-0">Cokelat
                                </div>
                            </div>
                        @elseif (Auth::user()->member === 2)
                            <div class="flex flex-col">
                                <div class="badge bg-purple-500 border-0">Anggur</div>
                            </div>
                        @else
                            <div class="flex flex-col">
                                <div class="badge bg-green-500 border-0">Pandan</div>
                            </div>
                        @endif
                    </div>

                    <div>
                        <h4>Total Pemesanan</h4>
                        <p class="font-semibold text-right">Rp. {{ number_format($order) }}</p>
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
                                        <span class="text-dark font-medium"> {{ $order->date }}</span>
                                    </li>
                                    <li class="bg-white">
                                        <label for="harga" class="block mb-2 text-dark text-sm">Harga</label>
                                        <span class="text-dark font-medium">
                                            Rp.{{ number_format($order->price) }}</span>
                                    </li>
                                    <li class="bg-white flex justify-center items-center">
                                        <a href="{{ route('history.show', $order->id) }}"
                                            class=" text-white px-2 py-2 bg-green-500 rounded-md"><svg
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
