<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
            <a href="{{ route('beranda.index') }}">
                <i class="material-icons">home</i>
                <span>Beranda</span>
            </a>
        </li>
        <li>
            <a href="{{ route('wisata.index') }}">
                <i class="material-icons">all_out</i>
                <span>Wisata</span>
            </a>
        </li>
        <li>
            <a href="{{ route('hotel.index') }}">
                <i class="material-icons">border_color</i>
                <span>Hotel</span>
            </a>
        </li>
        
        <li>
            <a href="{{ route('rumah-makan.index') }}">
                <i class="material-icons">chat_bubble_outline</i>
                <span>Rumah Makan</span>
            </a>
        </li>
        <li>
            <a href="{{ route('dokumentasi.index')}}">
                <i class="material-icons">touch_app</i>
                <span>Dokumentasi</span>
            </a>
        </li>
        <li>
            <a href="{{ route('profil.index') }}">
                <i class="material-icons">attach_file</i>
                <span>Profil</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">swap_calls</i>
                <span>Library</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="{{ route('kategori-wisata.index') }}">Kategori Wisata</a>
                </li>
                <li>
                    <a href="{{ route('kategori-rumah-makan.index') }}">Kategori Rumah Makan</a>
                </li>
                <li>
                    <a href="{{ route('kategori-dokumentasi.index') }}">Kategori Dokumentasi</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('user.index') }}">
                <i class="material-icons">group</i>
                <span>User</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.edit',['user'=>auth()->user()->id]) }}">
                <i class="material-icons">group</i>
                <span>Akun</span>
            </a>
        </li>
        <li class="header">Aksi</li>
        <li>
            <a href="{{ url('/') }}">
                <i class="material-icons col-light-blue">donut_large</i>
                <span>Kembali Ke Homepage</span>
            </a>
        </li>
    </ul>
</div>