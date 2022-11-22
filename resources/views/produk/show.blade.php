<x-guest-layout>
    {{-- semua produk --}}
    <section id="semua-produk">
        <x-container>
            <h2 class="text-3xl pt-20 pb-10 px-4 text-primary"><strong>Rincian Produk</strong></h2>
            <div class="w-full px-4">

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
                        <p class="pt-8 text-lg">Stok : {{ $product->stok }}</p>
                        <p class="py-2 text-lg">Harga : Rp. {{ $product->price }}</p>
                        <p class="text-gray text-lg">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
              </div>
        </x-container>
    </section>
    {{-- akhir semua produk --}}
</x-guest-layout>
