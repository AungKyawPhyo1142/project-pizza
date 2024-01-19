@extends('admin.layout.master')

@section('title','Pizza & Food Create Page')

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
                        <h3 class="text-center title-2">Pizza, Food, and Drinks</h3>
                    </div>
                    <hr>
                    <form action="{{route('admin#createProduct')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pizzaName" class="control-label mb-1">Name</label>
                            <input id="cc-pament" name="pizzaName" value="{{old('pizzaName')}}" type="text" class="form-control @error('pizzaName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Seafood...">
                            @error('pizzaName')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pizzaCategory" class="control-label mb-1">Category</label>
                            <select class="form-control" name="pizzaCategory" id="">
                                <option value="">Choose a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->name}} </option>
                                @endforeach
                            </select>
                            @error('pizzaCategory')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="pizzaDescription" class="control-label mb-1">Description</label>
                            <textarea class="form-control" name="pizzaDescription" cols="30" rows="5"></textarea>
                            @error('pizzaDescription')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="pizzaImage">Image</label>
                            <input type="file" name="pizzaImage" class="form-control">
                            @error('pizzaImage')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="pizzaWaitingTime">Waiting Time (min)</label>
                            <input type="text" name="pizzaWaitingTime" class="form-control">
                            @error('pizzaWaitingTime')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="pizzaPrice">Price (Kyats)</label>
                            <input type="number" name="pizzaPrice" class="form-control">
                            @error('pizzaPrice')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>

                        
                        
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Create</span>
                                <i class="fa-solid fa-circle-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection