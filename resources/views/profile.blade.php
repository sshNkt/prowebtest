@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
        </div>
    </div>
</div>
<profile-component :user_id="{{Auth::id()}}"></profile-component>

@endsection
