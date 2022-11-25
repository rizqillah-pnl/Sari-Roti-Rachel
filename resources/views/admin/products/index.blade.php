<x-app-layout>
    {{-- cari produk --}}
    <section id="cari-produk" class="py-12">
        <x-container>
            <div class="w-full px-4">
            @if (!empty(Auth::user()))

                <h3 class="text-center text-3xl py-8 text-dark">Selamat Datang <strong> {{ Auth::user()->name }}</strong>
                    di Sari Roti</h3>
            @endif
                <div class="form-control">
                    <div class="input-group">
                        <input type="text" placeholder="Search…" class="input input-bordered w-full" />
                        <button class="btn px-6 bg-secondary border-none hover:bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- akhir cari produk --}}

    {{-- semua produk --}}
    <section id="semua-produk">
        <x-container>
            <div class="w-full flex justify-between pt-20 pb-10 px-4">
                <div>
                    <h2 class="text-3xl text-primary"><strong>Products</strong></h2>
                </div>
                <div class="flex gap-3 relative">
                    <a href="{{ route('admin.cart') }}"><svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-shopping-cart mr-6 text-primary" width="32"
                            height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="6" cy="19" r="2"></circle>
                            <circle cx="17" cy="19" r="2"></circle>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l14 1l-1 7h-13"></path>
                        </svg>
                        <div
                            class="badge badge-sm border-none text-white py-2.5  bg-secondary border border-secondary shadow-lg absolute top-0 right-16 text-xs">
                            @php
                                if (!empty(Auth::user()->id)) {
                                    $order = App\Models\Order::where('status', 0)->where('user_id', Auth::user()->id)->first();
                                }
                                $orderDetails = App\Models\OrderDetail::where('order_id', $order->id)->count();
                            @endphp
                            {{ $orderDetails }}
                            </div>
                    </a>
                    <a href=""><svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-history" width="32" height="32"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="12 8 12 12 14 14"></polyline>
                            <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                        </svg>
                        <div
                            class="badge badge-sm border-none text-white py-2.5  bg-secondary border border-secondary shadow-lg absolute top-0 right-0 text-xs">
                            1</div>
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap">
                @foreach ($products as $product)
                <div class="w-1/2 md:w-1/5 px-4">
                    <div class="bg-white w-full rounded-md shadow-md mb-8">
                        <div class="relative">
                            <span
                                class="absolute text-xs p-2 opacity-80 text-white bg-secondary rounded-br-md">40</span>
                            <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//95/MTA-13708732/sari-roti_sari-roti-sobek-coklat-keju-216-gr_full01.jpg"
                                alt="" class="w-24 h-24 md:w-32 md:h-32 mx-auto">
                        </div>
                        <div class="pt-5 pb-5 text-center">
                            <h4 class="text-sm font-semibold text-center">{{ $product->name }}</h4>
                            <p class="pb-4 text-xs">Rp. {{ $product->price }}</p>
                            <div class="px-4 flex justify-center">
                                <a href="{{ route('admin.product.show', $product->id) }}"
                                    class="p-2 flex mx-auto font-semibold text-white rounded-md bg-primary border-none hover:bg-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-shopping-cart-plus mx-2" width="20"
                                        height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="6" cy="19" r="2"></circle>
                                        <circle cx="17" cy="19" r="2"></circle>
                                        <path d="M17 17h-11v-14h-2"></path>
                                        <path d="M6 5l6.005 .429m7.138 6.573l-.143 .998h-13"></path>
                                        <path d="M15 6h6m-3 -3v6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </x-container>
    </section>
    {{-- akhir semua produk --}}
</x-app-layout>
