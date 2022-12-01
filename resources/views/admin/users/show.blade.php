<x-app-layout>
    {{-- breadcumbs --}}
    <section id="breadcumbs" class="pt-6">
        <x-container>
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div class="text-sm breadcrumbs">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                            <li><a href="{{ route('admin.user') }}">Pengguna</a></li>
                            <li class="font-semibold">Rincian Pengguna</li>
                        </ul>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir breadcumbs --}}

    {{-- pengguna --}}
    <section id="pengguna" class="py-12">
        <x-container>
            <div class="flex px-4 mb-8">
                <div class="w-full flex items-center bg-white py-2 px-4 shadow-md rounded-md text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check"
                        width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        <path d="M16 11l2 2l4 -4"></path>
                    </svg>
                    <h2 class="px-4 font-semibold py-4 text-2xl">Rincian Pengguna</h2>
                </div>
            </div>
            <div class="px-4 flex flex-wrap rounded-md ">
                <div class="flex flex-wrap justify-between shadow-md bg-white w-full">
                    <div class="w-full flex items-center justify-center md:w-1/3 px-4 mb-16">
                        <img src="https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg"
                            alt="" class="w-80">
                    </div>
                    <div class="w-full md:w-2/3 px-4">
                        <h2 class="py-6 font-semibold text-3xl text-primary">{{ $user->name }}</h2>
                        <p class="mb-4 flex items-center"><svg xmlns="http://www.w3.org/2000/svg"
                                class="mr-4 icon icon-tabler icon-tabler-map-pin" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="11" r="3"></circle>
                                <path
                                    d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                            </svg> {{ $user->address }}</p>
                        <p class="mb-4 flex items-center"><svg xmlns="http://www.w3.org/2000/svg"
                                class="mr-4 icon icon-tabler icon-tabler-mail" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                <polyline points="3 7 12 13 21 7"></polyline>
                            </svg> {{ $user->email }}</p>
                        <p class="mb-4 flex items-center"><svg xmlns="http://www.w3.org/2000/svg"
                                class="mr-4 icon icon-tabler icon-tabler-phone-call" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                </path>"M15 7a2 2 0 0 1 2 2"></path>
                                <path d="M15 3a6 6 0 0 1 6 6"></path>
                            </svg> {{ $user->phone }}</p>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 icon icon-tabler icon-tabler-star"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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

                </div>
            </div>
        </x-container>
    </section>
    {{-- akhir pengguna --}}
</x-app-layout>
