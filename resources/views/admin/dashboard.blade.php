<x-app-layout>
    {{-- Card --}}
    <section id="card" class="py-12">
        <x-container>
            <h2 class="px-4 font-semibold py-4 text-2xl text-primary">Statistik Penjualan</h2>
            <div class="flex flex-wrap items-center">

                <div class="w-full md:w-1/3 px-4">
                    <div class="flex bg-white shadow-md rounded-md items-center mb-8  ">
                        <div class="w-1/3 flex justify-center items-center">
                            <div class= "py-8 rounded-l-md text-white px-8 bg-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bread"
                                    width="48" height="48" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M17 5a3 3 0 0 1 2 5.235v6.765a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6.764a3 3 0 0 1 1.824 -5.231l.176 -.005h10z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="w-2/3">
                            <div class="px-4">
                                <h3 class="text-xl mb-1">Jumlah Roti</h3>
                                <span class="text-primary font-bold text-xl">100</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir Card --}}
</x-app-layout>
