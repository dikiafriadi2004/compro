@extends('cms.layouts.app')

@section('title')
    Create Role
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Create Role</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Roles List</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="#!">Create Role</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body common-dash" data-simplebar>
        <div class="custom-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="input_role_name" class="font-weight-bold">
                                        Role name
                                    </label>
                                    <input id="input_role_name" value="" name="name" type="text"
                                        class="form-control" />
                                </div>
                                <!-- permission -->
                                <div class="form-group">
                                    <label for="input_role_permission" class="font-weight-bold">
                                        permission
                                    </label>
                                    <div class="form-control overflow-auto h-100 " id="input_role_permission">
                                        <div class="row">
                                            <!-- list manage name:start -->
                                            @foreach ($authorities as $manageName => $permissions)
                                                <ul class="list-group mx-1 col">
                                                    <li class="list-group-item bg-dark text-white">
                                                        Manage name
                                                    </li>
                                                    <!-- list permission:start -->
                                                    @foreach ($permissions as $permission)
                                                        <li class="list-group-item">
                                                            <div class="form-check">
                                                                <input class="form-check-input" id="{{ $permission }}" name="permissions[]" type="checkbox"
                                                                    value="{{ $permission }}">
                                                                <label class="form-check-label" for="{{ $permission }}">
                                                                    {{ trans("permissions-en.{$permission}") }}
                                                                </label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                    <!-- list permission:end -->
                                                </ul>
                                            @endforeach
                                            <!-- list manage name:end  -->
                                        </div>
                                    </div>
                                </div>
                                <div class="float-end mb-4">
                                    <a class="btn btn-warning px-4 mx-2" href="">
                                        Back
                                    </a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
