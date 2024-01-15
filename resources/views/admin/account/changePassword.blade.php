@extends('admin.layout.master')

@section('title','Change Password Page')

@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 offset-8">
                <a href="{{route('admin#categoryList')}}"><button class="btn bg-dark text-white my-3">List</button></a>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Change Password Form</h3>
                    </div>
                    <hr>
                    <form action="{{route('admin#changePassword')}}" method="post" novalidate='novalidate' >
                        @csrf
                        <div class="form-group">
                            <label for="oldPassword" class="control-label mb-1">Old Password</label>
                            <input id="cc-pament" name="oldPassword" value="{{old('oldPassword')}}" type="text" class="form-control @error('oldPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Old Password">
                            @error('oldPassword')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newPassword" class="control-label mb-1">New Password</label>
                            <input id="cc-pament" name="newPassword" value="{{old('newPassword')}}" type="text" class="form-control @error('newPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="New Password">
                            @error('newPassword')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword" class="control-label mb-1">Confirm Password</label>
                            <input id="cc-pament" name="confirmPassword" value="{{old('confirmPassword')}}" type="text" class="form-control @error('confirmPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Confirm Password">
                            @error('confirmPassword')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa-solid fa-key"></i>
                                <span id="payment-button-amount">Change Password</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
        @if(session('notMatch'))
            <div class="mt-5 alert alert-danger alert-dismissible fade show col-5 offset-7" role="alert">
                {{session('notMatch')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>
@endsection