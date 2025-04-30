@extends('cms.layouts.app')

@section('title')
    Detail Role
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Detail Role</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Roles List</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="#!">Detail Role</a></li>
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
                      <div class="card-body">
                         <div class="form-group">
                            <label for="input_role_name" class="font-weight-bold">
                               Role name
                            </label>
                            <input id="input_role_name" value="{{ $role->name }}" name="name" type="text" class="form-control" readonly />
                         </div>
                         <!-- permission -->
                         <div class="form-group">
                            <label for="input_role_permission" class="font-weight-bold">
                               permission
                            </label>
                            <div class="row">
                               <!-- list manage name:start -->
                               <ul class="list-group mx-1">
                                  <li class="list-group-item bg-dark text-white">
                                     Manage name
                                  </li>
                                  <!-- list permission:start -->
                                  <li class="list-group-item">
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                           value="" onclick="return false;" checked>
                                        <label class="form-check-label">
                                           Role name
                                        </label>
                                     </div>
                                  </li>
                                  <!-- list permission:end -->
                               </ul>
                               <!-- list manage name:end  -->
                            </div>
                         </div>
                         <!-- button  -->
                         <div class="d-flex justify-content-end">
                            <a href="" class="btn btn-primary mx-1" role="button">
                               Back
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
