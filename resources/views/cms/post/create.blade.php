@extends('cms.layouts.app')

@section('title')
    Create Post
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Create Post</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Post</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="#!">Create Post</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <div class="row">
                <div class="col-xl-8 col-md-7 cdx-xl-60">
                    <div class="card">
                        <div class="card-header">
                            <h4>contact infomation</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <div class="small-group">
                                        <div>
                                            <label class="form-label">Mobile number</label>
                                            <input class="form-control" type="number"
                                                placeholder="Enter Your Mobile Number">
                                        </div>
                                        <div>
                                            <label class="form-label">Email id</label>
                                            <input class="form-control" type="email" placeholder="Enter Your  Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="small-group">
                                        <div>
                                            <label class="form-label">Address</label>
                                            <input class="form-control" type="text" placeholder="Enter Your  Address">
                                        </div>
                                        <div>
                                            <label class="form-label">Website </label>
                                            <input class="form-control" type="text" placeholder="website link">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="small-group">
                                        <div>
                                            <label class="form-label">company</label>
                                            <input class="form-control" type="text" placeholder="Enter company name">
                                        </div>
                                        <div>
                                            <label class="form-label">Postal/zip code </label>
                                            <input class="form-control" type="text" placeholder="zip code">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="small-group">
                                        <div>
                                            <label class="form-label">home town</label>
                                            <input class="form-control" type="text" placeholder="Enter Your town city">
                                        </div>
                                        <div>
                                            <label class="form-label">city</label>
                                            <input class="form-control" type="text" placeholder="Enter Your city">
                                        </div>
                                        <div>
                                            <label class="form-label">country</label>
                                            <input class="form-control" type="text"
                                                placeholder="Enter Your website link">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">about bio</label>
                                    <textarea class="form-control" placeholder="enter your bio"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="group-btn"><a class="btn btn-success" href="#!">Update</a><a
                                            class="btn btn-danger ms-2" href="#!">Cancel</a></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-5 cdx-xl-40">
                    <div class="card">
                        <div class="card-header">
                            <h4>My Infomation</h4>
                        </div>
                        <div class="card-body">
                            <div class="info-group mb-3">
                                <div class="media align-items-center">
                                    <div class="userimg-wrap me-2"><img class="img-fluid w-50 rounded-2"
                                            src="../assets/images/avtar/1.jpg" alt=""></div>
                                    <div class="media-body">
                                        <h6>Mark Odem</h6>
                                        <p class="fs-14 text-light"> Ui/Ux desinger</p>
                                    </div><span class="badge badge-primary"><a href="#!"><i
                                                class="fa fa-cloud-upload"></i></a></span>
                                </div>
                            </div>
                            <div class="info-group">
                                <form>
                                    <div class="form-group">
                                        <div class="small-group">
                                            <div>
                                                <label class="form-label">First Name</label>
                                                <input class="form-control" type="text" placeholder="your first name"
                                                    value="Mark">
                                            </div>
                                            <div>
                                                <label class="form-label">Last Name</label>
                                                <input class="form-control" type="text" placeholder="your last name"
                                                    value="Odem">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="small-group">
                                            <div>
                                                <label class="form-label">Day</label>
                                                <select class="form-control hidesearch" name="day[]">
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                    <option>04</option>
                                                    <option>05</option>
                                                    <option>06</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">Month </label>
                                                <select class="form-control hidesearch" name="month[]">
                                                    <option>Jan</option>
                                                    <option>Feb</option>
                                                    <option>March</option>
                                                    <option>April</option>
                                                    <option>May</option>
                                                    <option>Jun</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">Year</label>
                                                <select class="form-control hidesearch" name="year[]">
                                                    <option>1992</option>
                                                    <option>1993</option>
                                                    <option>1994</option>
                                                    <option>1995</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Designation</label>
                                        <input class="form-control" type="text" placeholder="your designation name"
                                            value="Ui/Ux desinger">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email Address</label>
                                        <input class="form-control" type="text" placeholder="your email"
                                            value="mark@example.com">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mobile</label>
                                        <input class="form-control" type="text" placeholder="your mobile number"
                                            value="+9588489584">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Website</label>
                                        <input class="form-control" type="text" placeholder="your website"
                                            value="https://Rohi.com">
                                    </div>
                                    <div class="form-group mb-0"><a class="btn btn-primary" href="#!">Submit</a>
                                    </div>
                                </form>
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
