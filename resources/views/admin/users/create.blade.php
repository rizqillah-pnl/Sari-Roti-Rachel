<x-app-layout>
    {{-- cari user --}}
    <section id="cari-user" class="pt-20 pb-8">
        <x-container>
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-1/2 px-4">
                    <div class="w-full flex justify-between">
                        <div>
                            <h2 class="text-3xl text-primary"><strong>Tambah Pengguna</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- akhir cari user --}}

    {{-- semua user --}}
    <section id="semua-user">
        <x-container>
            <div class="flex flex-wrap px-4">
                <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data"
                    class="w-full flex justify-between bg-white shadow-md rounded-md ">
                    <div class="w-full md:w-1/2 p-4">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" placeholder="Masukkan nama.."
                                class="w-full rounded-md input-bordered input @error('name') border-red-500 @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Alamat</label>
                            <textarea type="text" name="address" id="address" placeholder="Masukkan alamat.."
                                class="w-full rounded-md  textarea textarea-bordered @error('address') border-red-500 @enderror"
                                value="{{ old('address') }}" rows="4">
                                </textarea>
                            @error('address')
                                <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-4">
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Masukkan email.."
                                class="w-full rounded-md input-bordered input @error('email') border-red-500 @enderror"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Telephone</label>
                            <input type="text" name="phone" id="phone" placeholder="Masukkan no. telephone.."
                                class="w-full rounded-md input-bordered input @error('phone') border-red-500 @enderror"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                         <div class="form-group mb-8">
                            <label for="image">Foto</label>
                            <input type="file" name="image" id="image"
                                class="w-full rounded-md file-input file-input-bordered @error('image') border-red-500 @enderror"
                                value="{{ old('image') }}">
                            @error('image')
                                <span class="text-red-500 text-xs ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                        <button type="submit" class="btn btn-success text-white">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </x-container>
    </section>
    {{-- akhir semua user --}}
</x-app-layout>
