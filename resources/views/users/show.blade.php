@extends('layouts.app')
@section('a-users', 'active')

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
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" href="{{ route('users.edit',$user->id) }}">
                                <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(304.000000, 151.000000)">
                                                    <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                    </polygon>
                                                    <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                                    <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="ms-1">Edit User</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6 col-xl-4 mt-md-0 mt-4">
        <div class="card h-100 mt-4">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Profile Information</h6>
            </div>
            <div class="card-body p-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{ $user->name }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{ $user->phone }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $user->email }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; {{ $user->city }}, {{ $user->state }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-4 mt-md-0 mt-4">
        <div class="card h-100 mt-4">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Emergency Contact</h6>
            </div>
            <div class="card-body p-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{ $user->em_name }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Relationship:</strong> &nbsp; {{ $user->em_relationship }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{ $user->em_phone }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $user->em_phone_office }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4 mt-md-0 mt-4">
        <div class="card h-100 mt-4">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Employment Information</h6>
            </div>
            <div class="card-body p-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Department:</strong> &nbsp; {{ $user->department }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Designation:</strong> &nbsp; {{ $user->designation }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Start Date:</strong> &nbsp; {{ $user->start_date }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Confirm Date:</strong> &nbsp; {{ $user->confirm_date }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Bank:</strong> &nbsp; {{ $user->bank }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Bank No.:</strong> &nbsp; {{ $user->bank_no }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tax No.:</strong> &nbsp; {{ $user->tax_no }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">EPF No.:</strong> &nbsp; {{ $user->epf_no }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">SOCSO No.:</strong> &nbsp; {{ $user->socso_no }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
@endsection