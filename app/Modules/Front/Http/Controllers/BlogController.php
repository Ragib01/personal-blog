<?php

namespace App\Modules\Front\Http\Controllers;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\BlogCategory;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::all();
        $posts      = BlogPost::orderBy('created_at','ASEC')->paginate(8);
        $short      = BlogPost::get()->sortByDesc('count')->take(4);
        return view('front::blog.all_blog_post',compact('categories','posts','short'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $post_data = $request->all();

        $post = new BlogPost;
        $post->title       = $post_data['title'];
        $post->description = $post_data['description'];
        $post->category_id = $post_data['category_id'];
        $post->file        = $post_data['file'];
    }

    public function show($id)
    {
        $post = BlogPost::find($id);
        $post->count = $post['count']+1;
        $post->update();

        $related = BlogPost::where('category_id',$post->category_id)->take(4)->get();
        $categories  = BlogCategory::all();
        return view('front::blog.single_blog_post', compact('post','categories','related'));
    }

    public function download($id)
    {

        $BlogFile = BlogPost::find($id);
        $file_name = $BlogFile->url;
        $url    = "uploads/url/blog-post/".$file_name;
        $download_link = public_path($url);
        return response()->download($download_link);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function CategoryPost($id)
    {
        $categories = BlogCategory::all();
        $posts      = BlogPost::orderBy('created_at','ASEC')->where('category_id', $id)->paginate(8);
        $short      = BlogPost::get()->sortByDesc('count')->take(4);
        return view('front::blog.category_blog_post',compact('categories','posts','short'));
    }
}
