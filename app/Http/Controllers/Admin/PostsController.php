<?php

namespace App\Http\Controllers\Admin;


use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getAjaxData()
    {
        $model = Post::with('user');

        return Datatables::of($model)
            ->addColumn('created_at', function ($post) {
                return $post->created_at->diffForHumans(); })
            ->addColumn('category', function ($post) {
                return '<span class="label label-success">'.$post->category->name.'</span>';})
            ->addColumn('update', function ($post) {
                return '<a href="/admin/posts/' . $post->id . '/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>'; })
            ->addColumn('delete', function ($post) {
                return '<button class="btn btn-danger btn-delete" data-remote="/admin/posts/' . $post->id . '"><i class="fa fa-remove"></i></button>'; })
            ->rawColumns(['link1', 'update','delete','category'])


            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create')->with('categories',Category::all());
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
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        Post::create($attributes+['user_id'=>auth()->id()]);
        Session::flash('message', 'Post Is Created Successfully');
        return redirect('/admin/posts');
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
    public function edit(Post $post)
    {
        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        $post->update($attributes);
        Session::flash('message', 'Post Is Updated Successfully');
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return response(['message' => 'Post Is Deleted Successfully', 'status' => 'success']);
        }
        return response(['message' => 'Failed To Delete Post', 'status' => 'error']);
    }

}
