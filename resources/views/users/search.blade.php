<x-login-layout>

<div class="search_container">
  <form action="{{url('search')}}">
    <input class="search_text" type="text" name="keyword" placeholder="ユーザー名">
    <button type="submit">
      <img class="btn_search" src="{{asset('images/search.png')}}">
    </button>
    <span>検索ワード：{{ $keyword }}</span>
  </form>
</div>

<div class="user_read">
@foreach($users as $user)
<div class="user_container">
  <tr>
    <td><a href=""><img class="icon-logo" src="{{ asset('images/' . $user->icon_image) }}"></a></td>
    <td>{{ $user->username }}</td>
  </tr>
</div>
@endforeach
</div>

</x-login-layout>
