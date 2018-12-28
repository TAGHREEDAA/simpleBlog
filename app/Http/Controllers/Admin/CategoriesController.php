<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index')->with('categories',Category::all());
    }


    /**
     * @return mixed
     * @throws \Exception
     */
    public function getAjaxData()
    {
        $model = Category::query();

        return Datatables::of($model)
            ->addColumn('created_at', function ($category) {
                return $category->created_at->diffForHumans(); })
            ->addColumn('update', function ($category) {
                return '<a href="/admin/categories/' . $category->id . '/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>'; })
            ->addColumn('delete', function ($category) {
                return '<button class="btn btn-danger btn-delete" data-remote="/admin/categories/' . $category->id . '"><i class="fa fa-remove"></i></button>'; })
            ->rawColumns(['link', 'update','delete'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create($attributes);
        Session::flash('message', 'Category Is Created Successfully');
        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category->update($attributes);
        Session::flash('message', 'Category Is Updated Successfully');
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return response(['message' => 'Category Is Deleted Successfully', 'status' => 'success']);
        }
        return response(['message' => 'Failed To Delete Category', 'status' => 'error']);
    }
}
