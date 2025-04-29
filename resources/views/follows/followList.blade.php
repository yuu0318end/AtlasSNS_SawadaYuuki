<x-login-layout>

<div class="followList">
  <p class="list_title">フォローリスト</p>
    <div class="icon_grid">
    @foreach($follow_icon as $follow_icons)
    <a href="{{ route('anotherProfile',['id' => $follow_icons->id]) }}"><img class="icon-logo" src="{{asset('storage/images/' . $follow_icons->icon_image)}}"></a>
    @endforeach
    </div>
</div>

<div class="post_read">
@foreach($follow_post as $follow_posts)
<ul>
  <li class="post_icon"><a href="{{ route('anotherProfile',$follow_posts->user->id) }}"><img class="icon-logo" src="{{asset('storage/images/' . $follow_posts->user->icon_image)}}"></a></li>
  <div class="post_wrapper">
  <li class="post_username">{{$follow_posts->user->username}}</li>
  <li class="post_content">{{$follow_posts->post}}</li>
  </div>
  <li class="post_time">{{$follow_posts->created_at->format('Y-m-d H:i') }}</li>
</ul>
@endforeach
</div>

</x-login-layout>
