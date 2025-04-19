<x-login-layout>

<span class="list_title">フォローリスト</span>
@foreach($follow_icon as $follow_icons)
<a href="{{ route('anotherProfile',['id' => $follow_icons->id]) }}"><img class="follow_icon" src="{{asset('images/' . $follow_icons->icon_image)}}"></a>
@endforeach

<div class="follow_list_container">
@foreach($follow_post as $follow_posts)
<ul>
  <li><a href="{{ route('anotherProfile',$follow_posts->user->id) }}"><img class="follow_icon" src="{{asset('images/' . $follow_posts->user->icon_image)}}"></a></li>
  <li>{{$follow_posts->user->username}}</li>
  <li>{{$follow_posts->post}}</li>
  <li>{{$follow_posts->created_at->format('Y-m-d H:i') }}</li>
</ul>
@endforeach
</div>

</x-login-layout>
