<x-app-layout>

    {{-- breadcumbs --}}
    <section id="breadcumbs" class="pt-6">
        <x-container>
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div class="text-sm breadcrumbs">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                            <li class="font-semibold">Riwayat Pemesanan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir breadcumbs --}}

    @if (!empty($orders))
        {{-- cart --}}
        <section id="cart" class="py-12">
            <x-container>
            <div class="flex flex-wrap px-4 mb-8">
                <div class="w-full flex items-center bg-white py-2 px-4 shadow-md rounded-md text-primary">
                    <div class="flex flex-wrap w-full items-center">
                        <div class="w-full md:w-1/2 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart"
                                width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="6" cy="19" r="2"></circle>
                                <circle cx="17" cy="19" r="2"></circle>
                                <path d="M17 17h-11v-14h-2"></path>
                                <path d="M6 5l14 1l-1 7h-13"></path>
                            </svg>
                            <h2 class="px-4 font-semibold py-4 text-2xl">Riwayat Pemesanan</h2>
                        </div>
                        <div class="w-full md:w-1/2 float-right">
                            <div class="form-control">
                                <form action="{{ route('admin.customers') }}" method="get">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" placeholder="Search???" name="search"
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
                <div class="w-full px-4 rounded-md">
                    <table class="table w-full pt-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pembeli</th>
                                <th>Pegawai</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>
                                        @if ($order->status == 1)
                                            <div class="badge badge-success text-white">Sudah Bayar</div>
                                        @else
                                            <div class="badge badge-warning text-white">Belum Membayar</div>
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($order->total_order_price) }}</td>
                                    <td>
                                        <a href="{{ route('admin.history.show', $order->id) }}" class="btn btn-sm btn-success text-white mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-eye-check" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M12 19c-4 0 -7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7c-.42 .736 -.858 1.414 -1.311 2.033">
                                                </path>
                                                <path d="M15 19l2 2l4 -4"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-error text-white"><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash" width="22"
                                                    height="22" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="4" y1="7" x2="20" y2="7">
                                                    </line>
                                                    <line x1="10" y1="11" x2="10" y2="17">
                                                    </line>
                                                    <line x1="14" y1="11" x2="14" y2="17">
                                                    </line>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg></button>

                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Belum ada Riwayat Pemesanan!</td>
                                    <td></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-container>
        </section>
        {{-- akhir cart --}}
    @else
        <h3 class="text-center">Tidak ada riwayat pemesanan Produk!</h3>
    @endif
</x-app-layout>
