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
                            <li class="font-semibold">Keranjang</li>
                        </ul>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir breadcumbs --}}

    @if (!empty($order))
        {{-- cari produk --}}
        <section id="cari-produk" class="py-12">
            <x-container>
                <div class="flex px-4 mb-8">
                    <div class="w-full flex items-center bg-white py-2 px-4 shadow-md rounded-md text-primary">
                        <div class="flex w-full items-center">
                            <div class="w-1/2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-shopping-cart" width="40" height="40"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="6" cy="19" r="2"></circle>
                                    <circle cx="17" cy="19" r="2"></circle>
                                    <path d="M17 17h-11v-14h-2"></path>
                                    <path d="M6 5l14 1l-1 7h-13"></path>
                                </svg>
                                <h2 class="px-4 font-semibold py-4 text-2xl">Keranjang</h2>
                            </div>
                            <div class="w-1/2 float-right">
                                <div class="form-control">
                                    <div class="input-group">
                                        <input type="text" placeholder="Search…"
                                            class="input input-bordered w-full" />
                                        <button class="btn px-6 bg-secondary border-none hover:bg-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </x-container>
        </section>
        {{-- akhir cari produk --}}

        {{-- cart --}}
        <section id="cart">
            <x-container>
                <div class="flex px-4 rounded-md">
                    <div class="w-full p-4 bg-white shadow-md">

                        <table class="table w-full p-4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th align="right">Total Harga</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order_details as $order_detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order_detail->product->name }}</td>
                                        <td>{{ $order_detail->order_quantity }}</td>
                                        <td>Rp. {{ number_format($order_detail->product->price) }}</td>
                                        <td align="right">Rp. {{ number_format($order_detail->total_price) }}</td>
                                        <td>
                                            <form action="{{ route('admin.orders.destroy', $order_detail->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-error text-white"><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="22"
                                                        height="22" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <line x1="4" y1="7" x2="20"
                                                            y2="7">
                                                        </line>
                                                        <line x1="10" y1="11" x2="10"
                                                            y2="17">
                                                        </line>
                                                        <line x1="14" y1="11" x2="14"
                                                            y2="17">
                                                        </line>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    </svg></button>

                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Belum ada pelanggan</td>
                                        <td></td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td align="right" colspan="4">Total Harga : </td>
                                    <td align="right">Rp. {{ number_format($order->total_order_price) }}</td>
                                    <td></td>
                                </tr>
                                <form action="{{ route('admin.checkout') }}" method="post">
                                    @csrf
                                    <tr>
                                        <td colspan="4" align="right">Nama Pelanggan : </td>
                                        <td align="right">
                                            <div class="form-group">
                                                <select name="customer_name" id="customer_name"
                                                    class="rounded-md border-0 shadow-md w-full">
                                                    @foreach ($users as $user)
                                                        @if ($user->id != 1)
                                                            <option value="{{ $user->name }}">{{ $user->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td align="right" colspan="5">
                                            <button class="btn btn-success text-white" type="submit">Konfirmasi
                                                Pesanan!</button>
                                        </td>
                                        <td></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </x-container>
        </section>
        {{-- akhir cart --}}
    @else
        <h3 class="text-center">Pesanan tidak ada!</h3>
    @endif
</x-app-layout>
