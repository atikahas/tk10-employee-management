@extends('layouts.app')
@section('a-users', 'active')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12 mx-auto">
        <div class="card mt-4">
            <div class="card-header pb-0">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0">List Leave</h5>
                        <p class="text-sm mb-0">Overview of the yearly annual leave entitlement for staff.</p>
                    </div>
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">
                            <a href="/" class="btn btn-outline-dark btn-sm mb-0 ">
                                +&nbsp; Create New User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-0 pt-0">
                <div class="table-responsive">
                    <table class="table table-flush text-sm" id="users-list">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>ROLE</th>
                                <th>CREATION DATE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $data as $key => $u )
                            <tr>
                                <td>{{ ++$i }}</td>
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
                                    <a class="btn bg-gradient-info" href="{{ route('users.show',$u->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn bg-gradient-secondary" href="{{ route('users.edit',$u->id) }}"><i class="fas fa-edit"></i></a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $u->id],'style'=>'display:inline']) !!}
                                        <button type="submit" class="btn bg-gradient-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                    {!! Form::close() !!}
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

        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
@endsection