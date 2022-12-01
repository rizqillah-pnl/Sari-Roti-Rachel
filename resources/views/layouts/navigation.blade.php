
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
                    <li><a href="../#tentang"
                            class="text-lg hover:rounded-lg">Tentang</a>
                    </li>
                    <li><a href="../#kontak"
                            class="text-lg hover:rounded-lg">Kontak</a>
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
                <li><a href="../#tentang"
                        class="text-lg hover:rounded-lg">Tentang</a>
                </li>
                <li><a href="../#kontak"
                        class="text-lg hover:rounded-lg">Kontak</a>
                </li>
            </ul>
        </div>

        <div class="navbar-end">
            @if (Auth::user())
                @php
                    if (!empty(Auth::user()->id)) {
                        $order = App\Models\Order::where('status', 1)->where('customer_name', Auth::user()->name)->count('customer_name');
                    }
                @endphp
                @if (!empty($order))
                    <a href="{{ route('history') }}" class="text-lg hover:rounded-lg {{ Route::is('/') ? 'font-bold text-primary' : '' }} relative"><svg
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
                            class="badge badge-sm border-none text-white py-2.5  bg-secondary border border-secondary shadow-lg absolute top-0 right-4 text-xs">
                            {{ $order }}</div>
                    </a>
                @endif
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
                            <a class="justify-between text-lg" href="{{ route('admin.profile', Auth::user()->id ) }}">
                                Profil
                            </a>
                        @else
                            <a class="justify-between text-lg" href="{{ route('profile', Auth::user()->id ) }}">
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
                <a class="text-lg hover:rounded-lg"
                    href="{{ route('login') }}"><span class="hidden md:block">Daftar/Masuk</span><svg
                        xmlns="http://www.w3.org/2000/svg"
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
</x-container>
</div>
