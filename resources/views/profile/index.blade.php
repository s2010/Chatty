@extends('templates.default')

@section('content')
  <div class="row">
      <div class="col-lg-5">
          @include('user.partials.userblock')
          <hr>
      </div>
      <div class="col-lg-4 col-lg-offset-3">
          @if(Auth::user()->hasFriendRequestsPending($user))
              <p>Waiting for {{$user->getFirstNameOrUsername()}} to accept your request.</p>
          @elseif(Auth::user()->hasFriendRequestsReceived($user))
              <a href="#" class="btn btn-primary">Accept friend request</a>
          @elseif(Auth::user()->isFriendsWith($user))
              <p>You & {{$user->getFirstNameOrUsername()}} are friends.</p>
          @else
              <a href="{{route('friend.add',['username' => $user->username])}}" class="btn btn-primary">Add as friend</a>
          @endif

          <h4>{{$user->getFirstNameOrUsername()}}'s friends</h4>

          @if(!$user->friends()->count())
              <p>{{$user->getFirstNameOrUsername()}} has no friends.</p>
          @else
              @foreach($user->friends() as $user)
                  @include('user/partials/userblock')
              @endforeach
          @endif
      </div>
  </div>
@stop