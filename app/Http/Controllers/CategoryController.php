<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // go to category list page
    public function listPage(){
        $data = Category::when(request('searchKey'), function($query){
            $query->where('name', 'like', '%'.request('searchKey').'%');
        })
        ->orderBy('created_at','desc')
        ->paginate(5);
        $data->appends(request()->all());
        return view('admin.category.list', compact('data'));
    }
    
    // go to create category page
    public function createPage(){
        return view('admin.category.create');
    }

    // create category
    public function create(Request $request){
        $this->validateCategory($request);
        $data = $this->getRequestData($request);
        Category::create($data);
        return redirect()->route('admin#categoryList');
    }

    // delete category
    public function delete($id){
        Category::where('id', $id)->delete();
        // return redirect()->route('admin#categoryList')
        return back()->with(['deleteSuccess' => 'Category deleted successfully!']);
    }

    // go to edit category page
    public function editPage($id){
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }


    // edit category
    public function edit($id, Request $req){
        // edit validation
        $validationRules = [
            'categoryName' => 'required|unique:categories,name,'.$id
        ];
        Validator::make($req->all(),$validationRules)->validate();

        $data = $this->getRequestData($req);
        Category::where('id', $id)->update($data);
        return redirect()->route('admin#categoryList')->with(['updateSuccess' => 'Category updated successfully!']);
    }



    //---------------------- PRIVATE FUNCTIONS ----------------------//
    private function validateCategory(Request $request){
        $validationRules = [
            'categoryName' => 'required|unique:categories,name'
        ];
        Validator::make($request->all(),$validationRules)->validate();
    }

    private function getRequestData(Request $request){
        return [
            'name' => $request->categoryName
        ];
    }

}
