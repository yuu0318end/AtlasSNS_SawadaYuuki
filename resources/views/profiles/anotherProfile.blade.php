<x-login-layout>
<div class="anotherProfile_container">
  <img class="anotherProfile_icon" src="{{ asset('storage/images/' . $userId->icon_image) }}">
  <div class="anotherProfile_wrapper">
    <div class="anotherProfile_username">
      <p class="content_label">ユーザー名</p>
      <p class="content_text">{{ $userId->username }}</p>
    </div>
    <div class="anotherProfile_bio">
      <p class="content_label">自己紹介</p>
      <p class="content_text">{{ $userId->bio }}</p>
    </div>
  </div>
  <div class="btn_follow_container">
    @if($check->contains($userId->id))
    <a class="another_btn btn btn-danger" href="{{ route('profileUnFollowing',$userId->id) }}">フォロー解除</a>
    @elseif($userId->id==Auth::user()->id)
    <p></p>
    @else
    <a class="another_btn btn btn-info" href="{{ route('profileFollowing',$userId->id) }}">フォローする</a>
    @endif
  </div>
</div>

<div class="post_read">
@foreach($postId as $postIds)
<ul>
  <li class="post_icon"><img class="icon-logo" src="{{ asset('storage/images/' . $postIds->user->icon_image) }}"></li>
  <div class="post_wrapper">
  <li class="post_username">{{ $postIds->user->username }}</li>
  <li class="post_content">{{ $postIds->post }}</li>
  </div>
  <li class="post_time">{{ $postIds->created_at->format('Y-m-d H:i') }}</li>
</ul>
@endforeach
</div>

</x-login-layout>
