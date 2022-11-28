<x-app-layout>
    {{-- cari produk --}}
    <section id="cari-produk" class="pt-20 pb-8">
        <x-container>
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-1/2 px-4">
                    <div class="w-full flex justify-between">
                        <div>
                            <h2 class="text-3xl text-primary"><strong>Edit Produk</strong></h2>
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
            <div class="flex flex-wrap px-4">
                <div class="w-full flex items-center justify-center bg-white shadow-md rounded-md ">
                    <div class="w-full md:w-1/2 p-4">
                        <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group mb-3">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" placeholder="Masukkan nama produk.."
                                    class="w-full rounded-md input-bordered input @error('name') border-red-500 @enderror" value="{{ old('name', $product->name) }}">
                                @error('name')
                                    <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Harga</label>
                                <input type="text" name="price" id="price"
                                    placeholder="Masukkan harga produk.."
                                    class="w-full rounded-md input-bordered input @error('price') border-red-500 @enderror" value="{{ old('price', $product->price) }}">
                                @error('price')
                                    <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="stok">Jumlah</label>
                                <input type="text" name="stok" id="stok"
                                    placeholder="Masukkan jumlah produk.."
                                    class="w-full rounded-md input-bordered input @error('stok') border-red-500 @enderror" value="{{ old('stok', $product->stok) }}">
                                @error('stok')
                                    <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Keterangan</label>
                                <textarea type="text" name="description" id="description" placeholder="Masukkan keterangan produk.."
                                    class="w-full rounded-md  textarea textarea-bordered @error('description') border-red-500 @enderror" value="{{ old('description', $product->description) }}">{{ $product->description }}
                                </textarea>
                                @error('description')
                                    <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-8">
                                <label for="image">Gambar</label>
                                <input type="file" name="image" id="image"
                                    class="w-full rounded-md file-input file-input-bordered @error('image') border-red-500 @enderror" value="{{ old('image', $product->image) }}">
                                @error('image')
                                    <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success text-white">Tambah</button>
                        </form>
                    </div>
                    <div class="w-full md:w-1/2 p-4">
                        <img src="https://st2.depositphotos.com/1765462/10919/v/600/depositphotos_109195074-stock-illustration-bread-sketches-hand-drawing.jpg"
                            alt="" class="w-80 mx-auto">
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- akhir semua Produk --}}
</x-app-layout>
