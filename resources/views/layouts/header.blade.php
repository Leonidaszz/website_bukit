<img src="logo.png" alt="Logo Bukit Parangyangan" href="#" class="header__logo" />
<nav>
    <ul class="header__menu">
        <li>
            <a class="header__link" href="#">
                Home
            </a>
        </li>
        <li class="dropdown">
            <button class="dropbtn">Jelajahi</button>
            <p class="droplogo">&#129171;</p>
            <div class="dropdown-content">
                <a href="#">Jelajah Bukit</a>
                <a href="{{ url ('/galeri')}}">Galeri</a>
                <a href="#">Rekomendasi</a>
                <a href="#">Profil</a>
            </div>
        </li>
        <li class="dropdown">
            <button class="dropbtn">Reservasi</button>
            <p class="droplogo">&#129171;</p>
            <div class="dropdown-content">
                <a href="tiket">Tiket Masuk</a>
                <a href="meja-cafe">Meja Kafe</a>
                <a href="#">Riwayat</a>
            </div>
        </li>
        <li>
            <a class="header__link" href="#">
                Informasi
            </a>
        </li>
        <li>
            <a class="header__link" href="login">
                Login
            </a>
            <span>/</span>
            <a class="header__link" href="register">
                Register
            </a>
        </li>
    </ul>
</nav>
