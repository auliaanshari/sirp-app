
@section('side-bar')
<div class="side-nav-inner">
    <ul class="side-nav-menu scrollable">

        <li class="nav-item dropdown">
            <a class="dropdown-toogle" href="{{ url('/') }}">
                <span class="icon-holder">
                    <i class="anticon anticon-dashboard"></i>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

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
                <span class="title">Kelas</span>
                <span class="arrow">
                    <i class="arrow-icon"></i>
                </span>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{ url('/kelas') }}">
                            <i class="anticon anticon-solution"></i>
                            <span>Lihat Kelas</span>
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
                <span class="title">Kelas</span>
                <span class="arrow">
                    <i class="arrow-icon"></i>
                </span>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{ url('/kelas') }}">
                            <i class="anticon anticon-solution"></i>
                            <span>Lihat Kelas</span>
                        </a>
                    </li>
                </ul>
            </a>
        </li>

    </ul>
</div>
@endsection
