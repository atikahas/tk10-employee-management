@extends('layouts.app')
@section('l-show', 'show')
@section('l-active', 'active')
@section('l-e-show', 'show')
@section('l-e-active', 'active')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12 mx-auto">
        <div class="card card-body mt-4">
            <h5 class="mb-0">All Users</h5>
            <div class="table-responsive">
                <table class="table table-flush text-sm" id="users-list">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>CREATION DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $u )
                        <tr>
                            <td>AGA000{{  $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                @foreach ($u->getRoleNames() as $roleName)
                                    <span class="badge bg-gradient-dark">{{ $roleName }}</span>
                                @endforeach
                            </td>
                            <td>{{ $u->created_at->toFormattedDateString() }}</td>
                            <td>
                                <a href="{{url('leave-entitlement/view/'.$u->id)}}" class="mx-3 btn bg-gradient-secondary" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                <i class="fas fa-edit"></i>
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
@endsection

@section('script')
    <script>
        if (document.getElementById('users-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#users-list", {
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