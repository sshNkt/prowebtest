@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<profile-component :user_id="{{Auth::id()}}"></profile-component>

@endsection
