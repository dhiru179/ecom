@extends('front.templates')
@section('page_title','register')
@section('section')

<!-- Cart view section -->
<section id="aa-myaccount">

@if(session()->has('message'))
<div class="alert alert-success bg-green alert-dimissible" role="alert">
    <span class="badge badge-pill badge-success">{{session('message')}}</span>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="aa-myaccount-register">
                                <h4>Register</h4>
                                <form action="{{route('home.registration')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-name" class="control-label mb-1">Name</label>
                                        <input id="cc-name" name="name" type="text" class="form-control">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-email" class="control-label mb-1">Email</label>
                                        <input id="cc-email" name="email" type="email" class="form-control">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <!-- <div class="form-group">
                                    <label for="cc-mobile" class="control-label mb-1">Mobile</label>
                                    <input id="cc-mobile" name="mobile" type="text" class="form-control">
                                </div> -->
                                    <div class="form-group">
                                        <label for="cc-password" class="control-label mb-1">Password</label>
                                        <input id="cc-password" name="password" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-cnfpassword" class="control-label mb-1">Cnform Password</label>
                                        <input id="cc-cnfpassword" name="cnfpassword" type="text" class="form-control">
                                    </div>
                                    <button class="btn btn-danger" type="submit" value="">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Cart view section -->
@endsection