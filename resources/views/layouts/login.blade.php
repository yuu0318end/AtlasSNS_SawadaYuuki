<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">

  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />

  <!--OGPタグ/twitterカード-->
</head>

<body>
  <header>
    @include('layouts.navigation')
  </header>
  <!-- Page Content -->
  <div id="row">
    <div id="container">
      {{ $slot }}
    </div>
    <div id="side-bar">
      <div class="confirm">
        <p class="sidebar_username">{{ Auth::user()->username }}さんの</p>
        <div class="sidebar_label">
          <p class="sidebar_item1">フォロー数</p>
          <p class="sidebar_item2">{{Auth::user()->following->count()}}名</p>
        </div>
        <p class="followJump"><a class="btn btn-primary" href="{{route('follow-list')}}">フォローリスト</a></p>
        <div class="sidebar_label">
          <p class="sidebar_item1">フォロワー数</p>
          <p class="sidebar_item2">{{Auth::user()->followed->count()}}名</p>
        </div>
        <p class="followerJump"><a class="btn btn-primary" href="{{route('follower-list')}}">フォロワーリスト</a></p>
      </div>
      <p class="searchJump"><a class="btn btn-primary" href="{{route('search')}}">ユーザー検索</a></p>
    </div>
  </div>
  <footer>
  </footer>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>
