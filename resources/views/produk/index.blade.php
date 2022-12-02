<x-guest-layout>

    {{-- breadcumbs --}}
    <section id="breadcumbs" class="py-6">
        <x-container>
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div class="text-sm breadcrumbs">
                        <ul>
                            <li><a href="{{ route('/') }}">Beranda</a></li>
                            <li class="font-semibold">Semua Roti</li>
                        </ul>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir breadcumbs --}}

    {{-- semua produk --}}
    <section id="semua-produk">
        <x-container>
            <div class="flex flex-wrap px-4 mb-8">
                <div class="w-full flex items-center bg-white py-2 px-4 shadow-md rounded-md text-primary">
                    <div class="flex flex-wrap w-full items-center">
                        <div class="w-full md:w-1/2 flex items-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bread"
                                width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M17 5a3 3 0 0 1 2 5.235v6.765a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6.764a3 3 0 0 1 1.824 -5.231l.176 -.005h10z">
                                </path>
                            </svg>
                            <h2 class="px-4 font-semibold py-4 text-2xl">Semua Roti</h2>
                        </div>
                        <div class="w-full md:w-1/2 float-right">
                            <div class="form-control">
                                <form action="{{ route('produk') }}" method="get">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" placeholder="Search…" name="search"
                                            class="input input-bordered w-full" value="{{ request('search') }}" />
                                        <button type="submit"
                                            class="btn px-6 bg-secondary border-none hover:bg-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
            <div class="flex flex-wrap">
                @foreach ($products as $product)
                    <div class="w-1/2 md:w-1/4 px-4">
                        <div class="bg-white w-full rounded-md shadow-md mb-4">
                            <div class="relative">
                                <span
                                    class="absolute p-2 opacity-80 text-white bg-secondary rounded-br-md">{{ $product->stok }}</span>
                                <img src="{{ asset('storage/' . $product->image) }}" alt=""
                                    class="w-32 h-32 md:w-48 md:h-48 mx-auto">
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
