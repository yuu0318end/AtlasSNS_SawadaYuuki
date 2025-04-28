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
  <img class="icon-logo" src="{{ asset('images/' . Auth::user()->icon_image) }}">
  {{ Form::text('newPost',null,['required', 'class' => 'text_post', 'placeholder' => '投稿内容を入力してください。']) }}
  {{ Form::button('<img class="btn_post" src="images/post.png">',['type' => 'submit']) }}
</div>
{!! Form::close() !!}

<div class="post_read">
@foreach($follow_post as $follow_posts)
<ul>
  <li class="post_icon"><a href="{{ route('anotherProfile',$follow_posts->user->id) }}"><img class="icon-logo" src="{{asset('images/' . $follow_posts->user->icon_image)}}"></a></li>
  <div class="post_wrapper">
  <li class="post_username">{{$follow_posts->user->username}}</li>
  <li class="post_content">{{$follow_posts->post}}</li>
  </div>
  <li class="post_time">{{$follow_posts->created_at->format('Y-m-d H:i') }}</li>
    @if($follow_posts->user_id == Auth::user()->id)
    <div class="btn_read_container">
      <a href="#" class="modal_open" post="{{$follow_posts->post}}" post_id="{{$follow_posts->id}}"><img class="btn_update" src="{{ asset('images/edit.png') }}"></a>
      <a href="{{ route('postDelete',$follow_posts->id) }}" onclick="return confirm('この投稿をを削除します。よろしいでしょうか？')"><img class="btn_delete" src="{{ asset('images/trash.png') }}"></a>
    </div>
    @endif
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
