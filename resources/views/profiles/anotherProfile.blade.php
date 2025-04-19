<x-login-layout>
<div class="anotherProfile_container">
  <img src="{{ asset('images/' . $userId->icon_image) }}">
  <div class="anotherProfile_username">
    <span>ユーザー名</span>
    {{ $userId->username }}
  </div>
  <div class="anotherProfile_bio">
    <span>自己紹介</span>
    {{ $userId->bio }}
  </div>
  <div class="btn_follow_container">
    @if($check->contains($userId->id))
    <a class="btn_unfollow" href="{{ route('profileUnFollowing',$userId->id) }}">フォロー解除</a>
    @else
    <a class="btn_follow" href="{{ route('profileFollowing',$userId->id) }}">フォローする</a>
    @endif
  </div>
</div>

<div class="anotherProfile_post">
@foreach($postId as $postIds)
<ul>
  <li><img src="{{ asset('images/' . $postIds->user->icon_image) }}"></li>
  <li>{{ $postIds->user->username }}</li>
  <li>{{ $postIds->post }}</li>
  <li>{{ $postIds->created_at }}</li>
</ul>
@endforeach
</div>

</x-login-layout>
