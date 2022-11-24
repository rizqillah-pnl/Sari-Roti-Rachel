<x-app-layout>
    {{-- semua produk --}}
    <section id="semua-produk">
        <x-container>
            <h2 class="text-3xl pt-20 pb-10 px-4 text-primary"><strong>Products</strong></h2>
            <div class="flex flex-wrap rounded-md bg-white shadow-md">
                <div class="w-full md:w-1/2 px-4">
                    <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//95/MTA-13708732/sari-roti_sari-roti-sobek-coklat-keju-216-gr_full01.jpg"
                        alt="" class="w-80 mx-auto">
                </div>
                <div class="w-full md:w-1/2 px-4">
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
                        <form class="flex items-center gap-4" method="post" action="{{ route('admin.orders.store', $product->id) }}">
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
