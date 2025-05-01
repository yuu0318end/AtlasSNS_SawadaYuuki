<x-login-layout>

<div class="followList">
  <p class="list_title">フォローリスト</p>
    <div class="icon_grid">
    @foreach($follow_icon as $follow_icons)
    @if($follow_icons->icon_image == 'icon1.png')
    <a href="{{ route('anotherProfile',['id' => $follow_icons->id]) }}"><img class="icon-logo" src="{{asset('images/' . $follow_icons->icon_image)}}"></a>
    @else
    <a href="{{ route('anotherProfile',['id' => $follow_icons->id]) }}"><img class="icon-logo" src="{{asset('storage/images/' . $follow_icons->icon_image)}}"></a>
    @endif
    @endforeach
    </div>
</div>

<div class="post_read">
@foreach($follow_post as $follow_posts)
<ul>
  @if($follow_posts->user->icon_image == 'icon1.png')
  <li class="post_icon"><a href="{{ route('anotherProfile',$follow_posts->user->id) }}"><img class="icon-logo" src="{{asset('images/' . $follow_posts->user->icon_image)}}"></a></li>
  @else
  <li class="post_icon"><a href="{{ route('anotherProfile',$follow_posts->user->id) }}"><img class="icon-logo" src="{{asset('storage/images/' . $follow_posts->user->icon_image)}}"></a></li>
  @endif
  <div class="post_wrapper">
  <li class="post_username">{{$follow_posts->user->username}}</li>
  <li class="post_content">{{$follow_posts->post}}</li>
  </div>
  <li class="post_time">{{$follow_posts->created_at->format('Y-m-d H:i') }}</li>
</ul>
@endforeach
</div>

</x-login-layout>
