@extends('layouts.app')
@section('l-show', 'show')
@section('l-active', 'active')
@section('l-e-show', 'show')
@section('l-e-active', 'active')

@section('content')
<div class="container-fluid">
    <div class="page-header min-height-100 border-radius-xl mt-4">
        <span class="mask bg-gradient-info opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="https://t3.ftcdn.net/jpg/00/64/67/52/360_F_64675209_7ve2XQANuzuHjMZXP3aIYIpsDKEbF5dD.jpg" alt="profile_image" class="w-100 border-radius-lg bg-white shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">{{ $user->name }}</h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        @foreach($user->getRoleNames() as $roleName)
                            {{ $roleName }}
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-12 mx-auto">
        <div class="card card-body mt-4">
            <h5 class="mb-0">Leaves Entitlement Form: <script>document.write(new Date().getFullYear())</script></h5>
            <form action="{{url('leave-entitlement/create')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row mt-3">
                    <input class="form-control" type="number" onfocus="focused(this)" onfocusout="defocused(this)" name="user_id" value="{{ $user->id }}" hidden>
                    <div class="col-12 col-sm-6">
                        <label>Annual Leave</label>
                        <input class="form-control" type="number" onfocus="focused(this)" onfocusout="defocused(this)" name="leaves_earned">
                    </div>
                    <div class="col-12 col-sm-6">
                        <label>Medical Leave</label>
                        <input class="form-control" type="number" onfocus="focused(this)" onfocusout="defocused(this)" name="leaves_ml_earned">
                    </div>
                </div>
                <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection