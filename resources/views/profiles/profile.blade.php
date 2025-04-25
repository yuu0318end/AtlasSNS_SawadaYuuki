<x-login-layout>

@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

<div class="profile_container">
  <div>
    <img class="icon-logo" src="{{ asset('images/' . Auth::user()->icon_image) }}">
  </div>
    <form class="profile_wrapper" action="{{ route('profileUpdate') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="profile_items">
        <label class="profile_label">ユーザー名</label>
        <input class="profile_input" type="text" name="upUsername" value="{{ Auth::user()->username }}">
      </div>
      <div class="profile_items">
        <label class="profile_label">メールアドレス</label>
        <input class="profile_input" type="email" name="upMail" value="{{ Auth::user()->email }}">
      </div>
      <div class="profile_items">
        <label class="profile_label">パスワード</label>
        <input class="profile_input" type="password" name="upPassword">
      </div>
      <div class="profile_items">
        <label class="profile_label">パスワード確認</label>
        <input class="profile_input" type="password" name="upPassword_confirmation">
      </div>
      <div class="profile_items">
        <label class="profile_label">自己紹介</label>
        <input class="profile_input" type="text" name="upBio" value="{{ Auth::user()->bio }}">
      </div>
      <div class="profile_items">
        <label class="profile_label">アイコン画像</label>
        <input class="profile_input_image" type="file" name="upIcon">
      </div>
      <div class="profile_btn_container">
        <button class="btn btn-danger" type="submit">更新</button>
      </div>
    </form>
  </div>

</x-login-layout>
