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

<img src="">
  <form class="profile_container" action="{{ route('profileUpdate') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="profile_items">
      <label>ユーザー名</label>
      <input type="text" name="upUsername" value="{{ Auth::user()->username }}">
    </div>
    <div class="profile_items">
      <label>メールアドレス</label>
      <input type="email" name="upMail" value="{{ Auth::user()->email }}">
    </div>
    <div class="profile_items">
      <label>パスワード</label>
      <input type="password" name="upPassword">
    </div>
    <div class="profile_items">
      <label>パスワード確認</label>
      <input type="password" name="upPassword_confirmation">
    </div>
    <div class="profile_items">
      <label>自己紹介</label>
      <input type="text" name="upBio" value="{{ Auth::user()->bio }}">
    </div>
    <div class="profile_items">
      <label>アイコン画像</label>
      <input type="file" name="upIcon">
    </div>
    <button class="btn_profile" type="submit">更新</button>
  </form>

</x-login-layout>
