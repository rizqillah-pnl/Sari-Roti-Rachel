<x-guest-layout>

    {{-- Hero --}}
    <section id="hero" class="pb-12">
        <x-container>
            <div class="flex flex-wrap items-center">
                <div class="w-full md:w-1/2 px-4 order-2 md:order-1">
                    <div class="py-4">
                        <span class="text-lg block font-light">Pilihan Keluarga Indonesia</span>
                        <h2 class="text-5xl mb-3 text-slate text-primary"><strong>Sari Roti</strong> untuk Semua</h2>
                        <p class="text-gray">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum deleniti
                            libero minima quas eos laboriosam, eveniet incidunt cum soluta! Earum quis neque magni
                            laborum temporibus fugit nostrum ratione odit nulla voluptatum.</p>
                        <div class="mt-12">
                            <a href="" class="px-7 text-lg py-3 bg-primary rounded-md text-white mr-4">Belanja</a>
                            <a href="" class="px-7 text-lg py-3 bg-secondary rounded-md text-white">Tentang</a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-4 flex justify-center relative order-1 md:order-2">
                    <div class="">
                        <img src="https://lzd-img-global.slatic.net/g/p/1b185e8a00dfdb3c9ec55fc3738a81b8.jpg_720x720q80.jpg_.webp"
                            alt="Sari Roti" class="w-80">
                        <div class="absolute top-8 rounded-l-md">
                            <h3 class=" text-secondary text-3xl font-light left-0">CV. Huzaeini</h3>
                        </div>
                        <img src="{{ asset('image/1.png') }}" alt="Sari Roti"
                            class="w-48 absolute top-32 left-0 md:left-24">
                        <img src="{{ asset('image/2.png') }}" alt="Sari Roti"
                            class="w-32 absolute top-72 right-0 md:right-28">
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir Hero --}}

    {{-- Motto --}}
    <section id="motto" class="py-12">
        <x-container>
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-3/4 rounded-md bg-white shadow-md mb-4">
                    <div class="flex">
                        <div class="w-full md:w-1/3 rounded p-4 pb-8 text-center">
                            <h4 class="py-2 text-lg font-semibold text-dark">Mudah</h4>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-primary mx-auto icon icon-tabler icon-tabler-activity" width="52"
                                height="52" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 12h4l3 8l4 -16l3 8h4"></path>
                            </svg>
                        </div>
                        <div class="w-full md:w-1/3 rounded p-4 pb-8 text-center">
                            <h4 class="py-2 text-lg font-semibold text-dark">Cepat</h4>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-primary mx-auto icon icon-tabler icon-tabler-clock-hour-1" width="52"
                                height="52" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v5"></path>
                                <path d="M12 12l2 -3"></path>
                            </svg>
                        </div>
                        <div class="w-full md:w-1/3 rounded p-4 pb-8 text-center">
                            <h4 class="py-2 text-lg font-semibold text-dark">Hemat</h4>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-primary mx-auto icon icon-tabler icon-tabler-businessplan" width="52"
                                height="52" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <ellipse cx="16" cy="6" rx="5" ry="3"></ellipse>
                                <path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                <path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                <path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                                <path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                                <path d="M5 15v1m0 -8v1"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir Motto --}}

    {{-- Product Unggulan --}}
    <section id="product-unggulan" class="pt-12 pb-24 bg-slate-200 -mt-32">
        <x-container>
            <h2 class="text-3xl pt-20 pb-10 px-4">Roti <strong>Unggulan</strong></h2>
            <div class="flex gap-4 mx-4 overflow-x-scroll">
            @foreach ($products as $product)
                <div class="w-72 md:w-1/4 flex-none bg-white rounded-md shadow-md mb-4">
                    <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//95/MTA-13708732/sari-roti_sari-roti-sobek-coklat-keju-216-gr_full01.jpg"
                        alt="" class="h-48 w-48 mx-auto">
                    <div class="pt-5 pb-10 text-center">
                        <h4 class="text-lg font-semibold text-center">{{ $product->name }}</h4>
                        <p class="pb-4 text-lg">Rp. {{ $product->price }}</p>
                        <a href="{{ route('produk.show', $product->id) }}"
                            class="px-12 py-2.5 font-semibold text-white rounded-md bg-primary border-none">Lihat</a>

                    </div>
                </div>
            @endforeach
            </div>
        </x-container>
    </section>
    {{-- Akhir Product Unggulan --}}

    {{-- Tentang Kami --}}
    <section id="tentang" class="py-12">
        <x-container>
            <h2 class="text-3xl pt-20 pb-2 px-4 text-secondary "><strong>Tentang</strong><span
                    class="text-primary"> Kami</span></h2>
            <div class="flex flex-wrap items-center">
                <div class="w-full md:w-1/2 px-4 flex justify-center order-1 md:order-1">
                    <img src="https://lzd-img-global.slatic.net/g/p/1b185e8a00dfdb3c9ec55fc3738a81b8.jpg_720x720q80.jpg_.webp"
                        alt="Sari Roti" class="w-80">
                </div>
                <div class="w-full md:w-1/2 px-4 text-right order-2 md:order-2">
                    <div class="py-4 text-center md:text-left">
                        <span class="text-lg block text-left md:text-right">CV. Huzaeini</span>
                        <h2 class="text-4xl text-slate text-primary text-center md:text-right"><strong>Sari
                                Roti</strong> <span class="text-secondary">Aceh Utara</span></h2>
                        <div class="mt-8">
                            <p class="text-center md:text-right">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Modi harum
                                quibusdam, accusantium animi repellat veniam fuga possimus eligendi provident sit
                                eveniet mollitia adipisci dignissimos, earum magni reprehenderit ipsam dolore voluptatem
                                similique. Illo cumque quae ea pariatur enim reprehenderit voluptates at.</p>
                        </div>
                    </div>
                    <h4 class="font-semibold py-4 text-xl">Mari Berteman</h4>
                    <div class="flex justify-end gap-4">
                        <div class="bg-secondary text-white rounded-md hover:bg-primary hover:shadow-md p-2">
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-instagram" width="30"
                                    height="30" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="4" y="4" width="16" height="16"
                                        rx="4"></rect>
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <line x1="16.5" y1="7.5" x2="16.5" y2="7.501"></line>
                                </svg></a>
                        </div>
                        <div class="bg-secondary text-white rounded-md hover:bg-primary hover:shadow-md p-2">
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-twitter" width="30" height="30"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z">
                                    </path>
                                </svg></a>
                        </div>
                        <div class="bg-secondary text-white rounded-md hover:bg-primary hover:shadow-md p-2">
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-whatsapp" width="30" height="30"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                                    <path
                                        d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1">
                                    </path>
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir Tentang Kami --}}

    {{-- Kerja Sama --}}
    <section id="kerja-sama" class="py-12 opacity-90"
        style="background-image: url(https://cdn1.katadata.co.id/media/images/thumb/2016/12/09/2016_12_09-16_55_37_7cd69b1295ae68425cce6baa2a96e987_620x413_thumb.jpg); background-size: cover;">
        <x-container>
            <div class="flex flex-wrap items-center justify-center">
                <div class="w-full mb-4 md:w-1/4 px-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/1200px-Google_%22G%22_Logo.svg.png"
                        alt="" class="w-24 shadow-md mb-4 mx-auto">
                </div>
                <div class="w-full mb-4 md:w-1/4 px-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/1200px-Google_%22G%22_Logo.svg.png"
                        alt="" class="w-24 shadow-md mb-4 mx-auto">
                </div>
                <div class="w-full mb-4 md:w-1/4 px-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/1200px-Google_%22G%22_Logo.svg.png"
                        alt="" class="w-24 shadow-md mb-4 mx-auto">
                </div>
                <div class="w-full mb-4 md:w-1/4 px-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/1200px-Google_%22G%22_Logo.svg.png"
                        alt="" class="w-24 shadow-md mb-4 mx-auto">
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir Kerja Sama --}}

    {{-- Products --}}
    <section id="products">
        <x-container>
            <div class="w-full flex justify-between pt-20 pb-10 px-4">
                <div>
                    <h2 class="text-3xl text-primary"><strong>Roti</strong></h2>
                </div>
                <div class="text-right">
                    <a href="{{ route('produk') }}" class="text-lg px-4 rounded-md text-white py-2 bg-secondary">Lihat Semua</a>
                </div>
            </div>
            <div class="flex flex-wrap">
            @foreach ($products as $product)
                <div class="w-1/2 md:w-1/4 px-4">
                    <div class="bg-white w-full rounded-md shadow-md mb-4">
                        <div class="relative">
                            <span class="absolute p-2 opacity-80 text-white bg-secondary rounded-br-md">{{ $product->stok }}</span>
                            <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//95/MTA-13708732/sari-roti_sari-roti-sobek-coklat-keju-216-gr_full01.jpg"
                                alt="" class="w-32 h-32 md:w-48 md:h-48 mx-auto">
                        </div>
                        <div class="pt-5 pb-10 text-center">
                            <h4 class="text-lg font-semibold text-center">{{ $product->name }}</h4>
                            <p class="pb-4 text-lg">{{ $product->price }}</p>
                            <a href="{{ route('produk.show', $product->id) }}"
                                class="px-12 py-2.5 font-semibold text-white rounded-md bg-primary border-none">Lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

        </x-container>
    </section>
    {{-- Akhir Products --}}

    {{-- Cara Penjualan --}}
    <section id="products" class="pb-12 mt-24 mt-18 bg-slate-200">
        <x-container>
            <h2 class="text-3xl pt-20 pb-10 px-4 text-primary"><strong>Seperti Apa Cara Penjualan <span
                        class="text-secondary">Kami ?</span></strong></h2>
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/4 px-4">
                    <div class="bg-white w-full rounded-md shadow-md mb-4 p-8">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-secondary mx-auto icon icon-tabler icon-tabler-truck" width="52"
                                height="52" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="7" cy="17" r="2"></circle>
                                <circle cx="17" cy="17" r="2"></circle>
                                <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg mt-4 font-semibold">Penjualan Langsung</h4>
                            <p class="text-xs text-gray">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/4 px-4">
                    <div class="bg-white w-full rounded-md shadow-md mb-4 p-8">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-secondary mx-auto icon icon-tabler icon-tabler-building-skyscraper"
                                width="52" height="52" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="3" y1="21" x2="21" y2="21"></line>
                                <path d="M5 21v-14l8 -4v18"></path>
                                <path d="M19 21v-10l-6 -4"></path>
                                <line x1="9" y1="9" x2="9" y2="9.01"></line>
                                <line x1="9" y1="12" x2="9" y2="12.01"></line>
                                <line x1="9" y1="15" x2="9" y2="15.01"></line>
                                <line x1="9" y1="18" x2="9" y2="18.01"></line>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg mt-4 font-semibold">Dari Kantor</h4>
                            <p class="text-xs text-gray">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/4 px-4">
                    <div class="bg-white w-full rounded-md shadow-md mb-4 p-8">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-secondary mx-auto icon icon-tabler icon-tabler-building-store"
                                width="52" height="52" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="3" y1="21" x2="21" y2="21"></line>
                                <path
                                    d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4">
                                </path>
                                <line x1="5" y1="21" x2="5" y2="10.85"></line>
                                <line x1="19" y1="21" x2="19" y2="10.85"></line>
                                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg mt-4 font-semibold">Titip Toko</h4>
                            <p class="text-xs text-gray">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/4 px-4">
                    <div class="bg-white w-full rounded-md shadow-md mb-4 p-8">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-secondary mx-auto icon icon-tabler icon-tabler-brand-whatsapp"
                                width="52" height="52" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                                <path
                                    d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1">
                                </path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h4 class="text-lg mt-4 font-semibold">Pesan Online</h4>
                            <p class="text-xs text-gray">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
    {{-- Akhir Cara Penjualan --}}

    {{-- Kontak --}}
    <section id="kontak" class="py-12">
        <x-container>
            <h2 class="text-3xl pt-20 pb-10 px-4 text-primary"><strong>Hubungi <span
                        class="text-secondary">Kami</span></strong></h2>
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 px-4 mb-4">
                    <h3 class="text-center text-dark text-2xl py-4 font-medium">Denah Lokasi</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63572.31933358085!2d96.96387071533023!3d5.220219913949265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304771b3043ad8e3%3A0x184e1f55c4060615!2sBandar%20Udara%20Malikus%20Saleh!5e0!3m2!1sid!2sid!4v1668813754656!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"class="rounded-md shadow-md w-full"></iframe>
                </div>
                <div class="w-full md:w-1/2 px-4 mb-4">
                    <h3 class="text-center text-dark text-2xl py-4 font-medium">Kontak</h3>
                    <div class="flex flex-row items-center flex-wrap gap-3 mb-4">
                        <div class="bg-white p-2 border border-gray rounded-md">
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-mail" width="40" height="40"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="5" width="18" height="14"
                                        rx="2"></rect>
                                    <polyline points="3 7 12 13 21 7"></polyline>
                                </svg></a>
                        </div>
                        <div>
                            <h4 class="font-medium">Email</h4>
                            <p>sarirotiacehutara@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex flex-row w-full items-center flex-wrap gap-3 mb-4">
                        <div class="bg-white p-2 border border-gray rounded-md">
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-map-pin" width="40" height="40"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="11" r="3"></circle>
                                    <path
                                        d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                    </path>
                                </svg></a>
                        </div>
                        <div>
                            <h4 class="font-medium">Alamat</h4>
                            <p>Jl. Banda Aceh, Gedung.s</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-center flex-wrap gap-3">
                        <div class="bg-white p-2 border border-gray rounded-md">
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-instagram" width="40"
                                    height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="4" y="4" width="16" height="16"
                                        rx="4"></rect>
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <line x1="16.5" y1="7.5" x2="16.5" y2="7.501"></line>
                                </svg></a>
                        </div>
                        <div>
                            <h4 class="font-medium">Instagram</h4>
                            <a href="https://instagram.com/sariroti_aceh_utara">Sari Roti Aceh Utara</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </x-container>
    </section>
    {{-- Akhiir Kontak --}}
</x-app-layout>
