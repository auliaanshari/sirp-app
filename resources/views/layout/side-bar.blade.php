
@section('side-bar')
<div class="side-nav-inner">
    <ul class="side-nav-menu scrollable">

        <li class="nav-item dropdown">
            <a class="dropdown-toogle" href="{{ url('/home') }}">
                <span class="icon-holder">
                    <i class="anticon anticon-dashboard"></i>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        @if(Auth::user()->tipe == 0)
        <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="anticon anticon-hdd"></i>
                </span>
                <span class="title">Data Mahasiswa</span>
                <span class="arrow">
                    <i class="arrow-icon"></i>
                </span>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{ url('/mahasiswa') }}">
                            <i class="anticon anticon-gold"></i>
                            <span>Mahasiswa</span>
                        </a>
                    </li>
                </ul>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="anticon anticon-appstore"></i>
                </span>
                <span class="title">Data Kelas</span>
                <span class="arrow">
                    <i class="arrow-icon"></i>
                </span>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{ url('/kelas') }}">
                            <i class="anticon anticon-solution"></i>
                            <span>Kelas</span>
                        </a>
                    </li>
                </ul>
            </a>
        </li>

        @else
        <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="anticon anticon-container"></i>
                </span>
                <span class="title">Lihat Kelas</span>
                <span class="arrow">
                    <i class="arrow-icon"></i>
                </span>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{ url('/lihatkelas') }}">
                            <i class="anticon anticon-folder-open"></i>
                            <span>Kelas</span>
                        </a>
                    </li>
                </ul>
            </a>
        </li>
        @endif

    </ul>
</div>
@endsection
