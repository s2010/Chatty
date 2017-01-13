@extends('templates.default)

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form role="form" action="{{route('status.post')}}" method="post">
                <div class="form-group{{$errors->has('status') ? 'has-error' : ''}}">
                    <textarea placeholder="What's up {{Auth::user()->getFirstNameOrUsername()}}?" name="status" class="form-control" rows="2"></textarea>
                    @if($errors->has('status'))
                        <span class="help-block">{{$errors->first('status')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Update status</button>
                <input type="submit" name="_token" value="{{Session::token()}}">
            </form>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            @if(!$statuses->count())
                <p>{{ $user->getFirstNameOrUsername() }} hasn't posted anything yet.</p>
            @else
              @foreach($statuses as $status)
                  <div class="media">

                      <a class="pull-left" href="{{route('profile.index', ['username' =>$status->user->username])}}">
                          <img class="media-object" alt="{{$status->user->getNameOrUsername()}}" src="{{$status->user->getAvaterUrl()}}">
                      </a>

                      <div class="media-body">
                          <h4 class="media-heading"><a href="{{route('profile.index', ['username' =>$status->user->username])}}">{{$status->user->getNameOrUsername()}}</a></h4>
                          <p>{{$status->body}}</p>
                          <ul class="list-inline">
                              <li>{{$status->created_at->diffForHumans()}}</li>
                          </ul>

                          @foreach($status->replies as $reply)
                              <div class="media">
                                  <a class="pull-left" href="{{ route('profile.index', ['username' => $reply->user->username]) }}">
                                      <img class="media-object" alt="{{ route('profile.index', ['username' => $reply->user->username]) }}" src="{{ $reply->user->getAvatarUrl() }}">
                                  </a>
                                  <div class="media-body">
                                      <h4 class="media-heading"><a href="#">{{ $reply->user->getNameOrUsername() }}</a></h4>
                                      <p>{{ $reply->body }}</p>
                                      <ul class="list-inline">
                                          <li>{{ $reply->created_at->diffForHumans() }}</li>
                                          @if($reply->user->id !== Auth::user()->id)
                                          <li><a href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a></li>
                                          @endif
                                      </ul>
                                  </div>
                              </div>
                          @endforeach

                          @if($authUserIsFriend || Auth::user()->id === $status->user->id)
                              <form role="form" action="{{ route('status.reply') }}" method="post">
                                  <div class="form-group{{ $errors->has("reply-{$status->id}" ? 'has-error': '') }}">
                                      <textarea name="reply-{{$status->id}}" class="form-control" role="2" placeholder="Reply to this status"></textarea>
                                      @if($errors->has('reply-{{$status->id}}'))
                                          <span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
                                      @endif
                                  </div>
                                  <input type="submit" value="Reply" class="btn btn-default btn-sm">
                                  <input type="hidden" name="_token" value="{{ Session::token()}}">
                              </form>
                          @endif
                      </div>
                  </div>
              @endforeach
                {!! $statuses->render() !!}
            @endif
        </div>
    </div>
@stop