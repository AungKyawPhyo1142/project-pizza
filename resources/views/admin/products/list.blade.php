@extends('admin.layout.master')

@section('title', 'Products Page')

@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="overview-wrap">
                        <h2 class="title-1">Pizzas</h2>

                    </div>
                </div>
                <div class="table-data__tool-right">
                    <a href="{{route('admin#productCreatePage')}}">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add item
                        </button>  
                    </a>
                    
                </div>
            </div>

            {{-- SEARCH --}}
            <form action="{{route('admin#productList')}}" method="GET">
                @csrf
                <div class=" d-flex col-3 offset-9">
                    <input class="form-control" value="{{old('searchKey')}}" type="text" name="searchKey"  placeholder="Search">
                    <button class=" btn btn-dark text-white" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th>name</th>
                                <th>views</th>
                                <th>price</th>
                                <th>category</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr class="tr-shadow">
                                    <td><img class="img-thumbnail" style="width: 100px" src="{{asset('storage/'.$item->image)}}" alt=""></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->view_count}}</td>
                                    <td>{{$item->price}} Ks</td>
                                    <td>{{$item->category_name}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{route('admin#productDetails', $item->id)}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('admin#deleteProduct',$item->id)}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{$products->links()}}
                    </div>
                </div>
                <!-- END DATA TABLE -->              


        </div>

    </div>

    @if(session('deleteSuccess'))
        <div class="mt-5 alert alert-danger alert-dismissible fade show col-5 offset-7" role="alert">
            {{session('deleteSuccess')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('updateSuccess'))
        <div class="mt-5 alert alert-warning alert-dismissible fade show col-5 offset-7" role="alert">
            {{session('updateSuccess')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
</div>

@endsection