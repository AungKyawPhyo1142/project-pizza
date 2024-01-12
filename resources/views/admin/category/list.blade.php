@extends('admin.layout.master')

@section('title', 'Category List Page')

@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="overview-wrap">
                        <h2 class="title-1">Category List</h2>

                    </div>
                </div>
                <div class="table-data__tool-right">
                    <a href="{{route('admin#categoryCreatePage')}}">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add item
                        </button>  
                    </a>
                    
                </div>
            </div>

            {{-- SEARCH --}}
            <form action="{{route('admin#categoryList')}}" method="GET">
                @csrf
                <div class=" d-flex col-3 offset-9">
                    <input class="form-control" value="{{old('searchKey')}}" type="text" name="searchKey"  placeholder="Search">
                    <button class=" btn btn-dark text-white" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>

            @if (count($data) !== 0)
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>created date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="tr-shadow">
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->created_at->format('j-M-Y')}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                <i class="fa-solid fa-eye"></i>
                                            </button> --}}
                                            <a href="{{route('admin#categoryEditPage', $item->id)}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('admin#deleteCategory',$item->id)}}">
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

                    {{$data->links()}}

                </div>
                <!-- END DATA TABLE -->
            @else
                <div class=" text-center py-5">
                    <h3>There are no categories at the moment</h3>
                </div>
            @endif
              


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