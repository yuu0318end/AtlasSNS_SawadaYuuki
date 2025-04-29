<x-login-layout>

<div class="search_container">
  <form action="{{url('search')}}">
    <input class="search_text" type="text" name="keyword" placeholder="ユーザー名">
    <button type="submit">
      <img class="btn_search" src="{{asset('images/search.png')}}">
    </button>
    @if(!empty($keyword))
    <span>検索ワード：{{ $keyword }}</span>
    @endif
  </form>
</div>

<div class="user_read">
@foreach($users as $user)
<div class="user_container">
  <ul>
    <li><a href="{{ route('anotherProfile',$user->id) }}"><img class="icon-logo" src="{{ asset('storage/images/' . $user->icon_image) }}"></a></li>
    <li class="search_username">{{ $user->username }}</li>
  </ul>
  <div class="btn_follow_container">
    @if($check->contains($user->id))
    <a class="btn btn-danger" href="{{ route('unFollowing',$user->id) }}">フォロー解除</a>
    @else
    <a class="btn btn-info" href="{{ route('following',$user->id) }}">フォローする</a>
    @endif
  </div>
</div>
@endforeach
</div>

</x-login-layout>
