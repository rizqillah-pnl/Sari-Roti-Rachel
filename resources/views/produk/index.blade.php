<x-guest-layout>
    {{-- semua produk --}}
    <section id="semua-produk">
        <x-container>
            <h2 class="text-3xl pt-20 pb-10 px-4 text-primary"><strong>Semua Roti</strong></h2>
            <div class="flex flex-wrap">
                @foreach ($products as $product)
                    <div class="w-1/2 md:w-1/4 px-4">
                        <div class="bg-white w-full rounded-md shadow-md mb-4">
                            <div class="relative">
                                <span class="absolute p-2 opacity-80 text-white bg-secondary rounded-br-md">{{ $product->stok }}</span>
                                <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//95/MTA-13708732/sari-roti_sari-roti-sobek-coklat-keju-216-gr_full01.jpg"
                                    alt="" class="w-32 h-32 md:w-48 md:h-48 mx-auto">
                            </div>
                            <div class="pt-5 pb-10 text-center">
                                <h4 class="text-lg font-semibold text-center">{{ $product->name }}</h4>
                                <p class="pb-4 text-lg">{{ $product->price }}</p>
                                <a href="{{ route('produk.show', $product->id) }}"
                                    class="px-12 py-2.5 font-semibold text-white rounded-md bg-primary border-none">Lihat</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-container>
    </section>
    {{-- akhir semua produk --}}
</x-guest-layout>
