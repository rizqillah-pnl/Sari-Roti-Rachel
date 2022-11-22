<x-app-layout>
    {{-- cari produk --}}
    <section id="cari-produk" class="py-12">
        <x-container>
            <div class="w-full px-4">
                <h3 class="text-center text-3xl py-8 text-dark">Selamat Datang <strong> {{ Auth::user()->name }}</strong>
                    di Sari Roti</h3>
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
            </div>
            <div class="flex flex-wrap">

            </div>

        </x-container>
    </section>
    {{-- akhir semua produk --}}
</x-app-layout>
