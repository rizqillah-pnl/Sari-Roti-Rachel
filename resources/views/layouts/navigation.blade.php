<x-container>
    <div class="navbar">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a class="text-lg hover:rounded-lg {{ Route::is('/') ? 'font-bold text-primary' : '' }}"
                            href="{{ route('/') }}">Beranda</a></li>
                    <li><a
                            class="text-lg hover:rounded-lg {{ Route::is('product') ? 'font-bold text-primary' : '' }}">Produk</a>
                    </li>
                    <li><a href="../#tentang" class="text-lg hover:rounded-lg">Tentang</a>
                    </li>
                    <li><a href="../#kontak" class="text-lg hover:rounded-lg">Kontak</a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-ghost normal-case text-2xl font-bold text-primary">Sari Roti</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal p-0">
                <li><a class="text-lg hover:rounded-lg {{ Route::is('/') ? 'font-bold text-primary' : '' }} {{ Route::is('/') ? 'font-bold text-primary' : '' }}"
                        href="{{ route('/') }}">Beranda</a></li>
                <li><a href="{{ route('produk') }}"
                        class="text-lg hover:rounded-lg {{ Route::is('produk') ? 'font-bold text-primary' : '' }}">Produk</a>
                </li>
                <li><a href="../#tentang" class="text-lg hover:rounded-lg">Tentang</a>
                </li>
                <li><a href="../#kontak" class="text-lg hover:rounded-lg">Kontak</a>
                </li>
            </ul>
        </div>

        <div class="navbar-end">
            @if (Auth::user())
                @php
                    if (!empty(Auth::user()->id)) {
                        $order = App\Models\CustomerOrder::where('status', 1)
                            ->where('name', Auth::user()->name)
                            ->count('name');
                    }
                @endphp
                @if (!empty($order))
                    <a href="{{ route('history') }}"
                        class="text-lg hover:rounded-lg {{ Route::is('/') ? 'font-bold text-primary' : '' }} relative animate-bounce" onclick="cartFunction()" id="cartNotif"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-shopping-cart mr-6 text-primary" width="28"
                            height="28" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="6" cy="19" r="2"></circle>
                            <circle cx="17" cy="19" r="2"></circle>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l14 1l-1 7h-13"></path>
                        </svg>
                        <div
                            class="badge badge-sm border-none text-white py-2.5  bg-secondary border border-secondary shadow-lg absolute top-0 right-4 text-xs" id="cart">
                            {{ $order }}</div>
                    </a>
                @endif
                @if (Auth::user()->member === 3)
                    <label for="my-modal-2"
                        class="block text-lg hover:rounded-lg text-primary {{ Route::is('/') ? 'font-bold text-primary' : '' }} relative animate-bounce duration-200"
                        onclick="notifFunction()" id="label"><svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-bell mr-6" width="28" height="28"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                            </path>
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                        </svg>
                        <div class="badge badge-sm border-none text-white py-2.5  bg-secondary border border-secondary shadow-lg absolute top-0 right-4 text-xs"
                            id="notif">
                            1</div>
                    </label>
                @elseif(Auth::user()->member === 2)
                    <label for="my-modal-2"
                        class="text-lg hover:rounded-lg text-primary {{ Route::is('/') ? 'font-bold text-primary' : '' }} relative animate-bounce duration-200"
                        onclick="notifFunction()" id="label"><svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-bell mr-6" width="28" height="28"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                            </path>
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                        </svg>
                        <div class="badge badge-sm border-none text-white py-2.5  bg-secondary border border-secondary shadow-lg absolute top-0 right-4 text-xs"
                            id="notif">
                            1</div>
                    </label>
                @endif
                </a>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/80/80/people" />
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li>
                            @if (Auth::user()->level === 1)
                                <a class="justify-between text-lg"
                                    href="{{ route('admin.profile', Auth::user()->id) }}">
                                    Profil
                                </a>
                            @else
                                <a class="justify-between text-lg" href="{{ route('profile', Auth::user()->id) }}">
                                    Profil
                                </a>
                            @endif
                        </li>
                        <li><a class="text-lg">Pengaturan</a></li>
                        @if (Auth::user()->level == 1)
                            <li><a href="{{ route('dashboard') }}" class="text-lg">Dashboard</a></li>
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="text-lg">Logout</button>
                        </li>
                        </form>
                    </ul>
                </div>
            @else
                <a class="text-lg hover:rounded-lg" href="{{ route('login') }}"><span
                        class="hidden md:block">Daftar/Masuk</span><svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-login block md:hidden text-primary" width="28"
                        height="28" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                        </path>
                        <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                    </svg></a>
            @endif
        </div>
    </div>

    {{-- modal notifikasi --}}
    @if (!empty(Auth::user()))
        <input type="checkbox" id="my-modal-2" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box relative text-center">
                <label for="my-modal-2" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="text-xl font-semibold mb-3">Selamat {{ Auth::user()->name }}</h3>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gift text-red-500 mx-auto"
                    width="80" height="80" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="3" y="8" width="18" height="4" rx="1"></rect>
                    <line x1="12" y1="8" x2="12" y2="21"></line>
                    <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7"></path>
                    <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5"></path>
                </svg>

                <p class="py-4">Total pembelian Anda mencapai
                    @if (Auth::user()->member === 3)
                        <strong>Rp. 200.000</strong><br>
                        Sekarang Anda berada di level <span class="font-semibold text-amber-900">Cokelat</span>
                        Anda mendapatkan potongan harga sebesar <span class="font-semibold text-danger">30%</span>
                    @elseif (Auth::user()->member == 2)
                        <strong>Rp. 100.00</strong>
                        Sekarang Anda berada di level <span class="font-semibold text-purple-500">Anggur</span> <br>
                        Anda mendapatkan potongan harga sebesar <span class="font-semibold text-danger">20%</span>
                    @endif
                </p>
            </div>
        </div>
    @endif
    {{-- akhir modal notifikasi --}}

    <script>
        function notifFunction() {
            document.getElementById("notif").remove()
            document.getElementById("label").classList.remove('animate-bounce')
        }

        function cartFunction() {
            document.getElementById("cart").remove()
            document.getElementById("cartNotif").classList.remove('animate-bounce')
            // document.getElementById("cartNotif").removeAttribute("href");
        }

    </script>

</x-container>
</div>
