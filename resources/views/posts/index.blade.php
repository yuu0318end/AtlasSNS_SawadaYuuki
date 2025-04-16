<x-login-layout>
{!! Form::open(['url' => 'postCreate']) !!}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container_post">
  <img class="icon-logo" src="images/icon1.png">
  {{ Form::text('newPost',null,['required', 'class' => 'text_post', 'placeholder' => '投稿内容を入力してください。']) }}
  {{ Form::button('<img class="btn_post" src="images/post.png">',['type' => 'submit']) }}
</div>
{!! Form::close() !!}

<div class="post_read">
@foreach($posts as $post)
<ul>
  <li><img class="icon-logo" src="{{ asset('images/' . $post->user->icon_image) }}"></li>
  <li>{{ $post->user->username }}</li>
  <li>{{ $post->post }}</li>
  <li>{{ $post->created_at }}</li>
    <div class="btn_read_container">
      <a href="#" class="modal_open" post="{{$post->post}}" post_id="{{$post->id}}"><img class="btn_update" src="{{ asset('images/edit.png') }}"></a>
      <a href="{{ route('postDelete',$post->id) }}" onclick="return confirm('この投稿をを削除します。よろしいでしょうか？')"><img class="btn_delete" src="{{ asset('images/trash.png') }}"></a>
    </div>
</ul>
@endforeach
</div>

<div class="modal_main">
  <div class="modal_inner">
    <div class="modal_container">
      <form action="{{url('postUpdate')}}" method="post">
        {{ csrf_field() }}
        <textarea class="modal_text" name="upPost"></textarea>
        <input type="hidden" class="modal_id" name="id">
        <button type="submit"><img class="btn_modal" src="{{ asset('images/edit.png') }}"></button>
      </form>
    </div>
  </div>
</div>
</x-login-layout>
