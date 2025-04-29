<x-logout-layout>
  <div class="form_container">
    @if (session('register_name'))
      <p class="username_add">{{ session('register_name') }}さん</p>
    @endif
    <p class="welcome_add">ようこそ！AtlasSNSへ！</p>
    <p class="text_add">ユーザー登録が完了しました。<br>早速ログインをしてみましょう！</p>
    <p></p>

    <a class="btn_add btn btn-danger" href="login">ログイン画面へ</a>
  </div>
</x-logout-layout>
