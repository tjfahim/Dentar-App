@extends('admin.layouts.master')
@section('title')
User Manage |
@endsection
@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">User Lists</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                            <i class="mdi mdi-printer"></i>
                            Print
                        </button>
                        <a href="{{ route('usersCreate') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add User"><i class=" mdi mdi-library-plus"></i> Add User</a>

                    </div>
                </div>

                <div class="table-responsive pt-3">
                    <div class="company-info text-center">
                        <h1>{{settings()->website_name}}</h1>
                        <p class="mt-1">{{settings()->address}}</p>
                        <p class="mt-1">{{settings()->website_email}}</p>
                    </div>
                    <table id="usersTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th> # Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                {{-- @if(auth()->user()->hasRole('root admin')) --}}
                                <th class="action">Action</th>
                                {{-- @endif --}}
                            </tr>
                        </thead>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <tbody id="usersTableBody">
                            @forelse ($users as $user)
                            <tr class="text-center">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->role == 'admin' ? 'Admin' : 'App User' }}</td>
                                <td>
                                    @if ($user->status == 'active')
                                        <span style="color: green">Active</span>
                                    @elseif ($user->status == 'pending')
                                        <span style="color: orange">Pending</span>
                                    @elseif ($user->status == 'block')
                                        <span style="color: red">Block</span>
                                    @elseif ($user->status == 'suspend')
                                        <span style="color: darkred">Suspend</span>
                                    @endif
                                </td>
                                {{-- @if(auth()->user()->hasRole('root admin')) --}}
                                <td class="action d-flex justify-content-center align-items-center">

                                    <a href="{{ route('usersEdit', $user->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit User"><i class="mdi mdi-grease-pencil"></i></a>


                                    <form action="{{ route('usersDestroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="mb-0">
                                        @method('DELETE')
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger" role="alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif


                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete User">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>

                                    </form>
                                    {{-- <a href="{{ route('user.profile', $user->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="User details"><i></i>User details</a> --}}
                                </td>
                                {{-- @endif --}}
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="3">No data found</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

