<x-app-layout>

    {{-- breadcumbs --}}
    <section id="breadcumbs" class="pt-6">
        <x-container>
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div class="text-sm breadcrumbs">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                            <li><a href="{{ route('admin.products') }}">Produk</a></li>
                            <li class="font-semibold">Ubah Produk</li>
                        </ul>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir breadcumbs --}}

    {{-- semua produk --}}
    <section id="semua-produk" class="py-12">
        <x-container>
            <div class="flex flex-wrap px-4 mb-8">
                <div class="w-full flex items-center bg-white py-2 px-4 shadow-md rounded-md text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text"
                        width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                        </path>
                        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                        <path d="M9 12h6"></path>
                        <path d="M9 16h6"></path>
                    </svg>
                    <h2 class="px-4 font-semibold py-5 text-2xl">Ubah Produk</h2>
                </div>
            </div>
            <div class="flex flex-wrap px-4">
                <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data"
                    class="w-full flex justify-between bg-white shadow-md rounded-md ">
                    <div class="w-full md:w-1/2 p-4">
                        @csrf
                        @method('put')
                        <div class="form-group mb-3">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" placeholder="Masukkan nama.."
                                class="w-full rounded-md input-bordered input @error('name') border-red-500 @enderror"
                                value="{{ old('name', $product->name) }}">
                            @error('name')
                                <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Harga</label>
                            <input type="number" name="price" id="price" placeholder="Masukkan harga.."
                                class="w-full rounded-md input-bordered input @error('price') border-red-500 @enderror"
                                value="{{ old('price',  $product->price) }}">
                            @error('price')
                                <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="stok">Jumlah</label>
                            <input type="text" name="stok" id="stok" placeholder="Masukkan stok.."
                                class="w-full rounded-md input-bordered input @error('stok') border-red-500 @enderror"
                                value="{{ old('stok',  $product->stok) }}">
                            @error('stok')
                                <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-4">
                        <div class="form-group mb-2">
                            <label for="description">Keterangan</label>
                            <textarea type="text" name="description" id="description" placeholder="Masukkan alamat.."
                                class="w-full rounded-md  textarea textarea-bordered @error('description') border-red-500 @enderror"
                                value="{{ old('description') }}" rows="4">
                                {{ $product->description }}
                                </textarea>
                            @error('description')
                                <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-8">
                            <label for="image">Gambar</label>
                            <input type="file" name="image" id="image"
                                class="w-full rounded-md file-input file-input-bordered @error('image') border-red-500 @enderror"
                                value="{{ old('image') }}">
                            @error('image')
                                <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-success text-white">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </x-container>
    </section>
    {{-- akhir semua produk --}}
</x-app-layout>
