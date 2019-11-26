@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card">
                                <div class="card-header">User profile: {{$user->name}}</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            @if ($user->gender == 'male')
                                            <img src="https://cdn3.iconfinder.com/data/icons/human-resources-management/512/business_man_office_male-512.png" alt="" width="150px" height="150px">
                                            <h6>Gender: Male</h6>
                                            @else
                                            <img src="https://cdn0.iconfinder.com/data/icons/ibrandify-female-user-action-icon-2/512/26-512.png" width="150px" height="150px">
                                            <h6>Gener: Female</h6>
                                            @endif
                                        </div>
                                        <div class="col-lg-8">
                                                <h4>Hello my name is: {{$user->name}}, nice to meet you</h4>
                                                <p>About me:{{$user->about}}</p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-12"><a href="/profile" class="btn btn-primary" style="margin-top: 10px;">Back to my profile</a></div>
                </div>
        </div>
</div>

@endsection
