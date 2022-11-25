<x-app-layout>
    {{-- Card --}}
    <section id="card" class="py-12">
        <x-container>
            <h2 class="px-4 font-semibold py-4 text-2xl text-primary">Statistik Penjualan</h2>
            <div class="flex flex-wrap items-center">

                <div class="w-full md:w-1/3 px-4">
                    <div class="flex bg-white shadow-md rounded-md items-center mb-8  ">
                        <div class="w-1/3 flex justify-center items-center px-4 py-6">
                            <div class="badge badge-gray w-20 h-20 bg-yellow-500 border-0 opacity-50 text-white rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class=" text-white icon icon-tabler icon-tabler-bread" width="40" height="40"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M17 5a3 3 0 0 1 2 5.235v6.765a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6.764a3 3 0 0 1 1.824 -5.231l.176 -.005h10z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="w-2/3">
                            <div class="px-4">
                                <h3 class="text-base mb-1 text-gray">Jumlah <strong> Produk</strong></h3>
                                @php
                                    $product = App\Models\Product::all();
                                    $total = $product->count();
                                @endphp
                                <span class="text-primary font-bold text-4xl">{{ $total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4">
                    <div class="flex bg-white shadow-md rounded-md items-center mb-8  ">
                        <div class="w-1/3 flex justify-center items-center px-4 py-6">
                            <div class="badge badge-gray w-20 h-20 bg-sky-500 border-0 opacity-50 text-white rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                    width="40" height="40" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="w-2/3">
                            <div class="px-4">
                                <h3 class="text-base mb-1 text-gray">Jumlah <strong> Pelanggan</strong></h3>
                                @php
                                    $product = App\Models\Product::all();
                                    $total = $product->count();
                                @endphp
                                <span class="text-primary font-bold text-4xl">{{ $total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4">
                    <div class="flex bg-white shadow-md rounded-md items-center mb-8  ">
                        <div class="w-1/3 flex justify-center items-center px-4 py-6">
                            <div class="badge badge-gray w-20 h-20 bg-green-500 border-0 opacity-50 text-white rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                                    width="40" height="40" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <circle cx="12" cy="10" r="3"></circle>
                                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="w-2/3">
                            <div class="px-4">
                                <h3 class="text-base mb-1 text-gray">Jumlah <strong> Pengguna</strong></h3>
                                @php
                                    $product = App\Models\Product::all();
                                    $total = $product->count();
                                @endphp
                                <span class="text-primary font-bold text-4xl">{{ $total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir Card --}}
</x-app-layout>
