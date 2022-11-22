<x-app-layout>
    {{-- laporan --}}
    <section id="cari-laporan" class="pt-20 pb-8">
        <x-container>
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-1/2 px-4">
                    <div class="w-full flex justify-between">
                        <div>
                            <h2 class="text-3xl text-primary"><strong>Laporan</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- akhir laporan --}}

    {{-- cari-laporan --}}
    <section id="cari-laporan" class="pb-12">
        <x-container>
            <div class="flex flex-wrap justify-start items-center">
                <div class="w-1/4 px-4">
                    <form-group>
                        <label for="">Dari Tanggal</label>
                        <input type="date" class="w-full rounded-md border-gray focus:ring-secondary focus:border-0">
                    </form-group>
                </div>
                <div class="w-1/4 px-4">
                    <form-group>
                        <label for="">Sampai Tanggal</label>
                        <input type="date" class="w-full rounded-md border-gray focus:ring-secondary focus:border-0">
                    </form-group>
                </div>
                <div class="w-1/4 px-4">
                    <button type="submit"
                        class="px-4 py-2.5 rounded-md text-white bg-secondary mt-6">Tampilkan</button>
                </div>
            </div>
        </x-container>
    </section>
    {{-- akhir-cari-laporan --}}


    {{-- tampilam-laporan --}}
    <section id="akhir-tampilan-laporan">
        <x-container>
            <div class="flex flex-wrap items-center">
                <div class="w-full px-4 text-center py-4">
                    <h3 class="text-2xl font-semibold">Laporan Harian</h3>
                    <p>Laporan Penjualan dari tanggal <strong>02 Novemver 2022</strong> sampai dengan <strong>20 Februari 2023</strong></p>
                </div>
                <div class="w-full px-4">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Level</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rachel Ardana Putra Ginting</td>
                                <td>09 November 2022</td>
                                <td>
                                    <span class="px-3 py-2.5 text-white bg-amber-700 rounded-md">Cokelat</span>
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success text-white"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-eye-check" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="2"></circle>
                                            <path
                                                d="M12 19c-4 0 -7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7c-.42 .736 -.858 1.414 -1.311 2.033">
                                            </path>
                                            <path d="M15 19l2 2l4 -4"></path>
                                        </svg></a>
                                    <a href="" class="btn btn-sm btn-warning text-white"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-edit-circle" width="22"
                                            height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z">
                                            </path>
                                            <path d="M16 5l3 3"></path>
                                            <path d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999">
                                            </path>
                                        </svg></a>
                                    <a href="" class="btn btn-sm btn-error text-white"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-trash" width="22" height="22"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg></a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </x-container>
    </section>
    {{-- akhir-tampilam-laporan --}}

</x-app-layout>
