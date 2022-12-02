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
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="40"
                        height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        <path d="M16 11l2 2l4 -4"></path>
                    </svg>
                    <h2 class="px-4 font-semibold py-5 text-2xl">Profil Saya</h2>
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

</x-app-layout>
