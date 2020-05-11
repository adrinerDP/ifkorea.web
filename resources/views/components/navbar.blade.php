<nav class="navbar fixed-top navbar-expand-lg navbar-dark py-2 shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/ifk_logo.png') }}">
            <span>IF KOREA</span>
        </a>
        <div class="togglers">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav_user">
                <i class="fa fa-user fa-fw"></i>
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav_menu">
                <i class="fa fa-navicon fa-fw"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="nav_menu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:alert('오픈준비중입니다.');"><i class="fa fa-dashboard fa-fw"></i> VA 상황판</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:alert('오픈준비중입니다.');"><i class="fa fa-search fa-fw"></i> VA 노선 검색</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:alert('오픈준비중입니다.');"><i class="fa fa-list-alt fa-fw"></i> 항로 아카이브</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cert.home') }}"><i class="fa fa-check-circle-o fa-fw"></i> 인증센터</a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="nav_user">
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img src="{{ auth()->user()->avatar }}" class="profile-image">
                            {{ auth()->user()->nickname }}
                        </a>
                    </li>
                    @if(auth()->user()->admin)
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-cog fa-fw"></i> 관리
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('auth.logout') }}" class="nav-link">
                            <i class="fa fa-sign-out-alt fa-fw"></i> 로그아웃
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('auth.login') }}" class="nav-link">
                            <i class="fa fa-sign-in-alt fa-fw"></i> 로그인
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
