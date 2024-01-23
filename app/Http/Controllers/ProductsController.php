<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    // go to products list page
    public function listPage(){
        $products = Products::select('products.*', 'categories.name as category_name')
                            ->when(request('searchKey'), function($query){
                                $query->where('products.name', 'like', '%'.request('searchKey').'%');
                            })
                            ->leftJoin('categories', 'products.category_id', 'categories.id')
                            ->paginate(3);
        $products->appends(request()->all());
        return view('admin.products.list', compact('products'));
    }

    // go to products create page
    public function createPage(){
        // get all the cateogries from category_table
        $categories = Category::select('id', 'name')->get();
        return view('admin.products.create', compact('categories'));
    }

    // go to products details page
    public function details($id){
        $product = Products::where('id', $id)->first();
        return view('admin.products.details', compact('product'));
    }

    // create a product
    public function create(Request $req){
        $this->validateProducts($req);
        $data = $this->getProducts($req);

        $fileName = uniqid().$req->file('pizzaImage')->getClientOriginalName();
        $req->file('pizzaImage')->storeAs('public', $fileName);
        $data['image'] = $fileName;
        Products::create($data);
        return redirect()->route('admin#productList');
    }

    // delete product
    public function delete($id){
        Products::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Product has been deleted successfully!']);
    }

    // validate products
    private function validateProducts($req){
        Validator::make($req->all(), [
            'pizzaName' => 'required|unique:products,name',
            'pizzaCategory' => 'required',
            'pizzaDescription' => 'required',
            'pizzaWaitingTime' => 'required',
            'pizzaPrice' => 'required',
            'pizzaImage' => 'required|mimes:jpg,jpeg,png,webp',
        ])->validate();
    }

    private function getProducts($req){
        return [
            'name' => $req->pizzaName,
            'category_id' => $req->pizzaCategory,
            'description' => $req->pizzaDescription,
            'waiting_time' => $req->pizzaWaitingTime,
            'price' => $req->pizzaPrice,            
        ];
    }

}
