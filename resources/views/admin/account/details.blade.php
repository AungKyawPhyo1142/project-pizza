@extends('admin.layout.master')

@section('title','Account Details')

@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 offset-9">
                <a href="{{route('admin#categoryList')}}"><button class="btn bg-dark text-white my-3">List</button></a>
            </div>
        </div>
        <div class="col-lg-8 offset-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-1">Account Information</h3>
                    </div>
                    <hr>
                    <div class="d-flex px-3 align-items-center">
                        <div class="col-5 mr-5">
                            <img src="{{asset('admin/images/default_image.jpeg')}}" class="img-thumbnail" alt="Default Image" />
                            <button class="btn btn-primary mt-2 w-100"><i class="fa-solid fa-pen mr-2"></i>Edit</button>
                        </div>
                        <div class="">
                            <p class="mb-2" style="font-size: 1.35em"> <i class="fa-solid fa-user mr-3"></i> {{Auth::user()->name}}</p>
                            <p class="mb-2" style="font-size: 1.35em"> <i class="fa-solid fa-envelope mr-3"></i> {{Auth::user()->email}}</p>
                            <p class="mb-2" style="font-size: 1.35em"> <i class="fa-solid fa-phone mr-3"></i> {{Auth::user()->phone}}</p>
                            <p class="mb-2 text-uppercase" style="font-size: 1.35em"> <i class="fa-solid fa-circle-exclamation mr-3"></i> {{Auth::user()->role}}</p>
                            <p class="mb-2" style="font-size: 1.35em"> <i class="fa-solid fa-map mr-3"></i> {{Auth::user()->address}}</p>
                            <p style="font-size: 1.35em"> <i class="fa-solid fa-calendar mr-3"></i> {{Auth::user()->created_at->format('j-F-Y')}}</p>
                        </div>
                    </div>
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