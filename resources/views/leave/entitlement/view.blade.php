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
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0">List Leave Entitlement</h5>
                        <p class="text-sm mb-0">Overview of the yearly annual leave entitlement for staff.</p>
                    </div>
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">
                            <a href="{{url('leave-entitlement/create/'.$user->id)}}" class="btn btn-outline-dark btn-sm mb-0 @if($currentYearRecord) disabled @endif">
                                +&nbsp; <script>document.write(new Date().getFullYear())</script> Form
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                    <table class="table table-flush text-sm" id="leaves-list">
                        <thead class="thead-light">
                            <tr>
                                <th>YEAR</th>
                                <th>ANNUAL LEAVE</th>
                                <th>MEDICAL LEAVE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ( $le as $e )
                            <tr>
                                <td>{{ $e->created_at->format('Y') }}</td>
                                <td>{{ $e->leaves_earned }}</td>
                                <td>{{ $e->leaves_ml_earned }}</td>
                                <td>
                                    <a href="{{url('leave-entitlement/edit/'.$e->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                    <i class="fas fa-edit text-secondary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        if (document.getElementById('leaves-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#leaves-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 7
            });

            document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                type: type,
                filename: "soft-ui-" + type,
                };

                if (type === "csv") {
                data.columnDelimiter = "|";
                }

                dataTableSearch.export(data);
            });
            });
        };
    </script>
@endsection