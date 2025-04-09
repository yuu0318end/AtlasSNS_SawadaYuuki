        <div id="head">
            <h1 id="logo"><a href="top"><img class="header-logo" src="images/atlas.png"></a></h1>
            <div id="menu-container">
                <div id="menu-name">
                    <p>{{ Auth::user()->username }}　さん</p>
                </div>
                <div class="menu-trigger" href="#">
                    <span class="inn"></span>
                </div>
                <nav class="menu">
                    <ul>
                        <li><a class="menu-list" href="top">HOME</a></li>
                        <li><a class="menu-list" href="profile">プロフィール編集</a></li>
                        <li><a class="menu-list" href="{{ route('logout') }}">ログアウト</a></li>
                    </ul>
                </nav>
                <div class="icon">
                    <a href="profile"><img class="icon-logo" src="{{ asset('images/' . Auth::user()->icon_image) }}"></a>
                </div>
            </div>
        </div>
