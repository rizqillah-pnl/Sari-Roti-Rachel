<x-app-layout>
    {{-- cari produk --}}
    <section id="cari-produk" class="pt-20 pb-8">
        <x-container>
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-1/2 px-4">
                    <div class="w-full">
                        <div>
                            <h2 class="text-3xl text-primary"><strong>Produk</strong></h2>
                        </div>
                    </div>
                </div>

            </div>
        </x-container>
    </section>
    {{-- akhir cari produk --}}

    {{-- semua Produk --}}
    <section id="semua-produk">
        <x-container>
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div class="flex justify-between">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-success text-white mb-3">Tambah
                            Produk</a>
                        <div class="w-full md:w-1/2 px-4">
                            <div class="form-control">
                                <form action="{{ route('admin.products') }}" method="get">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" placeholder="Search…" name="search"
                                            class="input input-bordered w-full" value="{{ request('search') }}" />
                                        <button type="text"
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
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $product->image) }}" alt=""
                                            class="w-24 rounded-md">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>Rp. {{ $product->price }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                            class="btn btn-sm btn-warning text-white"><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit-circle" width="22"
                                                height="22" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z">
                                                </path>
                                                <path d="M16 5l3 3"></path>
                                                <path
                                                    d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999">
                                                </path>
                                            </svg></a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
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
                                    <td colspan="5">Belum ada produk</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $products->links() }}
                </div>
            </div>
        </x-container>
    </section>
    {{-- akhir semua Produk --}}
</x-app-layout>
