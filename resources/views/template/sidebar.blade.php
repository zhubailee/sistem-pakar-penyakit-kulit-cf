<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{ asset('') }}images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('') }}images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active nav-item">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                @if (Auth::check() && Auth::user()->role==='admin')
                <h5 class="menu-title">Menu Admin</h5>
                <li class="nav-item">
                    <a href="{{ route('kelola.user') }}">
                        <i class="menu-icon fa fa-users"></i>Kelola user
                    </a>
                </li>
                <h5 class="menu-title">Menu</h5><!-- /.menu-title -->
                <li class="nav-item">
                    <a href="{{ route('penyakit.index') }}">
                        <i class="menu-icon fa fa-hospital-o"></i>Data penyakit
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gejala.index') }}">
                        <i class="menu-icon fa fa-heartbeat"></i>Data gejala
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengetahuan.index') }}">
                        <i class="menu-icon fa fa-database"></i>Basis Pengetahuan
                    </a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->role === 'user' )
                <li class="nav-item">
                    <a href="{{ route('diagnosa') }}">
                        <i class="menu-icon fa fa-sticky-note"></i>Diagnosa
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('riwayat.diagnosa') }}">
                        <i class="menu-icon fa fa-history"></i>Riwayat Diagnosa
                    </a>
                </li>
                @endif
                <h5 class="menu-title"></h5>
                <li class="nav-item">
                    <a href="{{ route('logout') }}">
                        <i class="menu-icon fa fa-sign-out"></i>Logout
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>