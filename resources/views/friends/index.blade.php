@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h3>your friends</h3>
            @if(!$friends()->count())
                <p>{{$user->getFirstNameOrUsername()}} has no friends.Yet</p>
            @else
                @foreach($friends() as $user)
                    @include('user/partials/userblock')
                @endforeach
            @endif
        </div>
        <div class="col-lg-6">
            <h4>Friends Requests</h4>
        </div>
    </div>
@stop