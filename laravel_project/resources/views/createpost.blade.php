@extends('layouts.app')

@section('content')
    @if(Auth::check())
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <textarea class="form-control" style="height:150px" name="content" placeholder="Content"></textarea>
                </div>

            </div>

            @if((Auth::check() && count(Auth::user()->posts) > 0))
            <div>
                <input type="checkbox" id="spoiler" name="spoiler" value="1">
                <label for="spoiler">Spoiler</label><br>
            </div>
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" id="user_id" name="user_id" value="{{auth::user()->id}}" class="btn btn-primary">Submit</button>

            </div>
        </div>

    </form>
    @else
        <h2>You are not allowed to be here without logging in, try logging in</h2>
    @endif
@endsection
