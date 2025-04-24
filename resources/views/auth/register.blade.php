<x-logout-layout>
    <!-- 適切なURLを入力してください -->
{!! Form::open(['url' => 'register']) !!}

<div class="form_container">
<h2 class="welcome">新規ユーザー登録</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form_items">
{{ Form::label('username','ユーザー名',['class' => 'label']) }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('email','メールアドレス',['class' => 'label']) }}
{{ Form::email('email',null,['class' => 'input']) }}

{{ Form::label('password','パスワード',['class' => 'label']) }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('password_confirmation','パスワード確認',['class' => 'label']) }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('新規登録', ['class' =>'btn_login btn btn-danger']) }}
</div>
<p class="register_p"><a class="register_a" href="login">ログイン画面へ戻る</a></p>
</div>

{!! Form::close() !!}


</x-logout-layout>
