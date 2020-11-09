<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = [];

        $validator = Validator::make($request->all(), [
            "blog_id" => 'required|integer',
            "category_id" => 'required|integer',
            "title" => 'required|text',
            "content" => 'required|text',
            "status" => 'required|integer',
        ]);
        if ($validator->fails()) {
            $this->fail($validator, $request->input());
        }

        $data['blog_id'] = $request['blog_id'];
        $data['category_id'] = $request['category_id'];
        $data['title'] = $request['title'];
        $data['content'] = $request['content'];;
        $data['status'] = $request['status'];;

        if($blog = BlogPost::create($data)){

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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
