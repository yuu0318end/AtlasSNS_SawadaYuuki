        <div id="head">
            <h1 id="logo"><a href="{{route('top')}}"><img class="header-logo" src="{{ asset('images/atlas.png') }}"></a></h1>
            <div id="menu-container">
                <div id="menu-name">
                    <p>{{ Auth::user()->username }}　さん</p>
                </div>
                <div class="menu-trigger" href="#">
                    <span class="inn"></span>
                </div>
                <nav class="menu">
                    <ul>
                        <a class="menu-list" href="{{route('top')}}"><li>HOME</li></a>
                        <a class="menu-list" href="{{route('profile')}}"><li>プロフィール編集</li></a>
                        <a class="menu-list" href="{{ route('logout') }}"><li>ログアウト</li></a>
                    </ul>
                </nav>
                <div class="icon">
                    @if(Auth::user()->icon_image == 'icon1.png')
                    <a href="{{route('profile')}}"><img class="header_icon" src="{{ asset('images/' . Auth::user()->icon_image) }}"></a>
                    @else
                    <a href="{{route('profile')}}"><img class="header_icon" src="{{ asset('storage/images/' . Auth::user()->icon_image) }}"></a>
                    @endif
                </div>
            </div>
        </div>
