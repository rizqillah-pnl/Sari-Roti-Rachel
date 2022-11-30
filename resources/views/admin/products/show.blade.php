<x-app-layout>
    {{-- breadcumbs --}}
    <section id="breadcumbs" class="pt-6">
        <x-container>
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div class="text-sm breadcrumbs">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                            <li><a href="{{ route('admin.orders') }}">Produk</a></li>
                            <li class="font-semibold">Rincian Produk</li>
                        </ul>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir breadcumbs --}}

    {{-- semua produk --}}
    <section id="semua-produk" class="py-12">
        <x-container>
            <div class="flex px-4 mb-8">
                <div class="w-full flex items-center bg-white py-2 px-4 shadow-md rounded-md text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-breal" width="40"
                        height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M17 5a3 3 0 0 1 2 5.235v6.765a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6.764a3 3 0 0 1 1.824 -5.231l.176 -.005h10z">
                        </path>
                    </svg>
                    <h2 class="px-4 font-semibold py-4 text-2xl">Rincian Produk</h2>
                </div>
            </div>
            <div class="px-4 flex flex-wrap rounded-md ">
                <div class="w-full md:w-1/2 px-4 bg-white rounded-l-md">
                    <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//95/MTA-13708732/sari-roti_sari-roti-sobek-coklat-keju-216-gr_full01.jpg"
                        alt="" class="w-80 mx-auto">
                </div>
                <div class="w-full md:w-1/2 px-4 bg-white rounded-r-md">
                    <div class="">
                        <h3 class="pt-8 pb-2 text-3xl font-bold text-primary">{{ $product->name }}</h3>
                        @if ($product->stok)
                            <span class="bg-green-500 text-white rounded-xl  px-4 my-1">Tersedia</span>
                        @else
                            <div class="badge badge-primary">Tidak Tersedia</div>
                        @endif
                        <p class="pt-8 text-lg text-dark">Stok : {{ $product->stok }}</p>
                        <p class="py-2 text-lg text-dark">Harga : Rp. {{ $product->price }}</p>
                        <p class="text-dark text-lg">{{ $product->description }} Lorem ipsum dolor sit, amet consectetur
                            adipisicing elit. Perferendis soluta incidunt voluptates alias et! Dolore, rem incidunt.
                            Non, consequuntur labore!</p>
                    </div>
                    <div class="flex justify-start gap-4 py-12">
                        <form class="flex items-center gap-4" method="post"
                            action="{{ route('admin.orders.store', $product->id) }}">
                            @csrf
                            <button class="py-2 px-2 shadow-md bg-secondary text-white rounded-md" onclick="minus()"
                                type="button"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-minus" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg></button>
                            <input type="number" value="1" id="total_order"
                                class="w-[10%] h-10 rounded-md border-none shadow-md" name="total_order">
                            <button class="py-2 px-2 shadow-md  bg-secondary text-white rounded-md" type="button"
                                onclick="plus()"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg></button>

                            <button type="submit"
                                class="bg-primary text-white ml-12 px-3 py-2 font-medium rounded-md">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- akhir semua produk --}}

    <script>
        const total_order = document.getElementById("total_order");

        function plus() {
            total_order.value++
        }

        function minus() {
            if (total_order.value != 0 && total_order.value > 1) {
                total_order.value--
            }
        }
    </script>
</x-app-layout>
