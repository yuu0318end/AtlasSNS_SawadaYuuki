<x-logout-layout>

  <!-- 適切なURLを入力してください -->

  {!! Form::open(['url' => 'login']) !!}

  <div class="form_container">
  <p class="welcome">AtlasSNSへようこそ</p>
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
  {{ Form::label('email','メールアドレス',['class' => 'label']) }}
  {{ Form::text('email',null,['class' => 'input']) }}
  {{ Form::label('password','パスワード',['class' => 'label']) }}
  {{ Form::password('password',['class' => 'input']) }}

  {{ Form::submit('ログイン', ['class' =>'btn_login btn btn-danger']) }}
</div>


  <p class="register_p"><a class="register_a" href="register">新規ユーザーの方はこちら</a></p>

  </div>
  {!! Form::close() !!}


</x-logout-layout>
