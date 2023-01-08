@extends('backend.layouts.master')
@section('title','User list')
@section('content')
@if (Auth::check())
    @if (auth()->user()->user_type == 'admin')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User List</h1>
    
   <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Add User
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ( $info as $info)
                        <tr>
                            <td>{{ $info->id }}</td>
                            <td>{{$info->name }}</td>
                            <td>{{$info->email }}</td>
                            <td>{{$info->user_type}}</td>
                            <td>
                                {{-- <div class="btn-group">
                                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                                        <span class="fas fa-cog"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu custom" role="menu">
                                        @if(Auth::check())
                                            @if(auth()->user()->user_type == 'admin')
                                            <a class="dropdown-item" class="change-password" data-toggle="modal" data-target="#changePassword">
                                                <i class="fa fa-key"  aria-hidden="true" style="color:#f0ad4e;"></i>
                                                Change Password
                                            </a>
                                            @endif
                                        @endif
                                        <a class="dropdown-item" href="">
                                            <span aria-hidden="true" class="fa fa-edit" style="color: #f0ad4e;"></span>
                                            Edit
                                        </a>
                                        @if(Auth::check())
                                            @if(auth()->user()->user_type == 'admin')
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        <span aria-hidden="true" class="fa fa-trash" style="color: #dd4b39"></span>
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                </div> --}}
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fas fa-cog"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                      <li>
                                            <a class="dropdown-item" href="#">
                                            <i class="fa fa-key"  aria-hidden="true" style="color:#f0ad4e;"></i> Change Password</a>
                                      </li>
                                      <li><a class="dropdown-item" href="#">
                                        <span aria-hidden="true" class="fa fa-edit" style="color: #f0ad4e;"></span> Edit</a></li>
                                      <li><a class="dropdown-item" href="#">
                                        <span aria-hidden="true" class="fa fa-trash" style="color: #dd4b39"></span> Delete
                                    </a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr> 
                        @endforeach
                           
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
    @endif
@endif
@endsection