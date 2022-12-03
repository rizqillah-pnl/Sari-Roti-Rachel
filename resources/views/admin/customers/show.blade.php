<x-app-layout>

    {{-- breadcumbs --}}
    <section id="breadcumbs" class="pt-6">
        <x-container>
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div class="text-sm breadcrumbs">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                            <li class="font-semibold">Profil Saya</li>
                        </ul>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir breadcumbs --}}

    {{-- profil --}}
    <section id="profil" class="py-12">
        <x-container>
            <div class="flex flex-wrap px-4 mb-8">
                <div class="w-full flex items-center bg-white py-2 px-4 shadow-md rounded-md text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check"
                        width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        <path d="M16 11l2 2l4 -4"></path>
                    </svg>
                    <h2 class="px-4 font-semibold py-5 text-2xl">Rincian Pelanggan</h2>
                </div>
            </div>
            <div class="flex flex-wrap justify-between pt-12">
                <div class="w-full md:w-1/2 px-4 mb-16">
                    <img src="https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg"
                        alt="" class="w-72">

                    <h3 class="text-xl font-medium flex"><svg xmlns="http://www.w3.org/2000/svg"
                            class="mr-4 icon icon-tabler icon-tabler-user" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        </svg> {{ $profile->name }}</h3>
                    <div class="py-4">

                        <p class="mb-2 flex items-center"><svg xmlns="http://www.w3.org/2000/svg"
                                class="mr-4 icon icon-tabler icon-tabler-map-pin" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="11" r="3"></circle>
                                <path
                                    d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                            </svg> {{ $profile->address }}</p>
                    </div>

                    <p class="mb-4 flex items-center"><svg xmlns="http://www.w3.org/2000/svg"
                            class="mr-4 icon icon-tabler icon-tabler-phone-call" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                            </path>"M15 7a2 2 0 0 1 2 2"></path>
                            <path d="M15 3a6 6 0 0 1 6 6"></path>
                        </svg> {{ $profile->phone }}</p>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 icon icon-tabler icon-tabler-star"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                            </path>
                        </svg>
                        @php
                            $order = App\Models\Order::where('status', 1)
                                ->where('customer_name', Auth::user()->name)
                                ->sum('total_order_price');
                        @endphp
                        @if ($order > 100000 && $order < 200000)
                            <span class="bg-purple-500 rounded-full text-white  px-4 py-2">Anggur</span>
                        @elseif ($order > 200000)
                            <span class="bg-red-900 rounded-full text-white  px-4 py-2">Cokelat</span>
                        @else
                            <span class="bg-green-500 rounded-full text-white  px-4 py-2">Pandan</span>
                        @endif
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-4">
                    <h5 class="text-3xl mb-2">Halo, <span class="font-semibold"> {{ $profile->name }}</span></h5>
                    <p>Saat ini anda berada di level
                        @if ($order > 100000 && $order < 200000)
                            <span class="text-purple-500  px-4 py-2 font-semibold">Anggur</span>
                        @elseif ($order > 200000)
                            <span class="text-amber-900 font-semibold">Cokelat</span>
                        @else
                            <span class="text-green-500 font-semibold">Pandan</span>
                        @endif
                    </p>
                    <p class="py-4">Kami memberikan diskon sebesar 30% dalam pembelian jika kamu mencapai level <span
                            class="text-amber-900 font-semibold">Cokelat</span></p>

                    <p>Bagaimana caranya?</p>

                    <p class="py-4">Jika kamu terus membeli Sari Roti dari kami hingga total pembelian mencapai <span
                            class="font-semibold">Rp. 100.000</span> maka level mu akan naik menjadi <span
                            class="text-purple-500 font-semibold">Anggur</span> dengan diskon <span
                            class="font-semibold">20%</span> </p>
                    <p class="py-4">Ketika total pembelian mencapai <span class="font-semibold">Rp. 200.000</span>
                        maka Level mu akan naik menjadi <span class="font-semibold text-amber-900">Cokelat</span> dan
                        selamat, Kamu mendapatkan Diskon sebesar <span class="font-bold">30%</span></p>

                    <a href="{{ route('produk') }}" class="mt-2 btn btn-success text-white">Ayo Belanja</a>
                </div>

            </div>
        </x-container>
    </section>
    {{-- akhir profil --}}

    @if (!empty($orders))
        {{-- cart --}}
        <section id="cart" class="py-12">
            <x-container>
                <div class="flex flex-wrap px-4 mb-8">
                    <div class="w-full flex items-center bg-white py-2 px-4 shadow-md rounded-md text-primary">
                        <div class="flex flex-wrap w-full items-center">
                            <div class="w-full md:w-1/2 mb-3 flex items-center">
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
                                <h2 class="px-4 font-semibold py-4 text-2xl">Riwayat Pemesanan</h2>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                <div class="w-full px-4 rounded-md">
                    <table class="table w-full pt-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pembeli</th>
                                <th>Pegawai</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>
                                        @if ($order->status == 1)
                                            <div class="badge badge-success text-white">Sudah Bayar</div>
                                        @else
                                            <div class="badge badge-warning text-white">Belum Membayar</div>
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($order->total_order_price) }}</td>
                                    <td>
                                        <a href="{{ route('admin.history.show', $order->id) }}"
                                            class="btn btn-sm btn-success text-white mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
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
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-error text-white"><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash" width="22"
                                                    height="22" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="4" y1="7" x2="20"
                                                        y2="7">
                                                    </line>
                                                    <line x1="10" y1="11" x2="10"
                                                        y2="17">
                                                    </line>
                                                    <line x1="14" y1="11" x2="14"
                                                        y2="17">
                                                    </line>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg></button>

                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Belum ada Riwayat Pemesanan!</td>
                                    <td></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-container>
        </section>
        {{-- akhir cart --}}
    @else
        <h3 class="text-center">Tidak ada riwayat pemesanan Produk!</h3>
    @endif

</x-app-layout>
