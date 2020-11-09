<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderByDesc('name')->simplePaginate(15);
        $categories = BlogCategory::orderByDesc('name')->get();
        return view('dashboard.blog.index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name', 'asc')->pluck('name', 'id')->all();
        $blogs = Blog::orderByDesc('name')->get();
        return view('dashboard.blog.create', compact('blogs', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];

        $validator = Validator::make($request->all(), [
            "name" => 'required|string',
            "description" => 'required|string',
            "blog_owner" => 'required|integer',
        ]);
        if ($validator->fails()) {
            $this->fail($validator, $request->input());
        }

        $data['name'] = $request['name'];
        $data['description'] = $request['description'];
        $data['user_id'] = $request['blog_owner'];
        $data['status'] = 1;

        if($blog = Blog::create($data)){

            Session::flash("site_message", __('messages.Successfully_Added', ['operation' => trans_choice('site.Blog', 1)]));
            Session::flash("site_message_type", "success");

            return redirect()->route('blog.create');
        }

        Session::flash("site_message", __('messages.An_Error_Occurred', ['operation' => __('site.Creating')]));
        Session::flash("site_message_type", "error");

        return redirect()->route('blog.create');

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();
        $users = User::orderBy('name', 'asc')->pluck('name', 'id')->all();
        return view('dashboard.blog.edit', compact('blog', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = [];
        $blog = Blog::where('id', $id)->first();

        $validator = Validator::make($request->all(), [
            "name" => 'required|string',
            "description" => 'required|string',
            "blog_owner" => 'required|integer',
        ]);
        if ($validator->fails()) {
            $this->fail($validator, $request->input());
        }

        $data['name'] = $request['name'];
        $data['description'] = $request['description'];
        $data['user_id'] = $request['blog_owner'];

        if($blog->update($data)){
            Session::flash("site_message", __('messages.Successfully_Updated', ['operation' => trans_choice('site.Blog',1)]));
            Session::flash("site_message_type", "success");
            return redirect()->route('blog.edit', ['blog' => $id]);
        }

        Session::flash("site_message", __('messages.An_Error_Occurred', ['operation' => __('site.Updating')]));
        Session::flash("site_message_type", "error");

        return redirect()->route('blog.edit', ['blog' => $id])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        foreach( $blog->blog_posts as $blog_post){
            if($blog_post -> image){
                @unlink('images/blog/'.$blog_post->image);
                $blog_post -> image -> delete();
            }
            $blog_post->delete();
        }

        if($blog->delete()){
            Session::flash("site_message", __('messages.Successfully_Deleted', ['operation' => trans_choice('site.Blog',1)]));
            Session::flash("site_message_type", "success");

            return redirect()->route('blog.index');
        }

        Session::flash("site_message", __('messages.An_Error_Occurred', ['operation' => trans_choice('site.Deleting',1)]));
        Session::flash("site_message_type", "danger");

        return redirect()->route('blog.edit', ['blog' => $id]);
    }

    public function store_category(Request $request){
        $data = [];

        $validator = Validator::make($request->all(), [
            "name" => 'required|string',
        ]);
        if ($validator->fails()) {
            $this->fail($validator, $request->input());
        }

        $data['name'] = $request['name'];
        $data['description'] = $request['description'];

        if($blog = BlogCategory::create($data)){
            Session::flash("site_message", __('messages.Successfully_Added', ['operation' => trans_choice('site.Category', 1)]));
            Session::flash("site_message_type", "success");

            return redirect()->route('blog.index');
        }

        Session::flash("site_message", __('messages.An_Error_Occurred', ['operation' => __('site.Creating')]));
        Session::flash("site_message_type", "error");

        return redirect()->route('blog.create');
    }

    public function update_category(Request $request){

        $validator = Validator::make($request->all(), [
            "id" => 'required',
            "update_name" => 'required|string',
        ]);
        if ($validator->fails()) {
            $this->fail($validator, $request->input());
        }

        $data = [];
        $data['id'] = $request['id'];
        $data['name'] = $request['update_name'];
        $data['description'] = $request['update_description'];

        $category = BlogCategory::find($data['id']);

        if($category->update($data)){
            Session::flash("site_message", __('messages.Successfully_Updated', ['operation' => trans_choice('site.Category', 1)]));
            Session::flash("site_message_type", "success");

            return redirect()->route('blog.index');
        }

        Session::flash("site_message", __('messages.An_Error_Occurred', ['operation' => __('site.Updating')]));
        Session::flash("site_message_type", "error");

        return redirect()->route('blog.index');
    }

    public function delete_category(Request $request){

        $category = BlogCategory::find($request["id"]);

        BlogPost::where('category_id', $request["id"]) -> update(['category_id' => 1]);

        if($category->delete()){
            Session::flash("site_message", __('messages.Successfully_Deleted', ['operation' => trans_choice('site.Category',1)]));
            Session::flash("site_message_type", "success");

            return redirect()->route('blog.index');
        }

        Session::flash("site_message", __('messages.An_Error_Occurred', ['operation' => trans_choice('site.Deleting',1)]));
        Session::flash("site_message_type", "danger");

        return redirect()->route('blog.index');
    }

    public function fail($validator, $data){
        Session::flash("site_message", __('general.Required_Field'));
        Session::flash("site_message_type", "error");

        return redirect()->back()
            ->withErrors($validator)
            ->withInput($data);
    }
}
