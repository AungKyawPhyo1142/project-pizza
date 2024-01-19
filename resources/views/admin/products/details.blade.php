@extends('admin.layout.master')

@section('title','Products Details')

@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="col-lg-8 offset-2">
            <div class="card" style="min-height: 350px">
                <div class="card-body">
                   <div class="d-flex" style="min-height: 350px">
                        <div class="mr-5">
                            <img class="rounded" src="{{asset('storage/'.$product->image)}}" alt="">
                        </div>
                        <div style="position: relative">
                            <h1 style="font-size: 3rem">{{$product->name}}</h1>
                            <div class="mt-2">
                                <span class="btn btn-secondary btn-sm"> <i class="fa-solid fa-tag "></i> {{$product->price}} Ks</span>
                                <span class="btn btn-secondary btn-sm"> <i class="fa-solid fa-eye"></i> {{$product->view_count}}</span>
                                <span class="btn btn-secondary btn-sm"> <i class="fa-solid fa-clock"></i> {{$product->waiting_time}}</span>
                                <span class="btn btn-secondary btn-sm"> <i class="fa-solid fa-calendar"></i> {{$product->created_at->format('d-M-Y')}}</span>
                            </div>
                            <div class="mt-4 text-wrap">
                                <p style="width: 350px" class=" text-justify">
                                    {{$product->description}}
                                </p>
                            </div>
                            <div class=" w-100 d-flex justify-content-between" style="position: absolute; bottom: 0;">
                                <a href="{{route('admin#productList')}}" class="btn btn-dark">Back</a>
                                <a href="" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                        
                   </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection