<?php

namespace App\Modules\Front\Http\Controllers;

use App\Models\Breaking;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// Models...
use App\User;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\About;
use App\Models\ResearchCategory;
use App\Models\ResearchPost;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::all();
//        $researchCategories = ResearchCategory::all();
        $breakings  = Breaking::where('status',1)->get();
        $posts      = BlogPost::get()->sortByDesc('count');
        return view('front::index',compact('categories','posts','breakings'));
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
        $post->count       =0;

    }
//    public function researchStore(Request $request)
//    {
//        $this->validate($request, [
//            'title'       => 'required',
//            'description' => 'required',
//            'category_id' => 'required'
//        ]);
//
//        $post_data = $request->all();
//
//        $post = new ResearchPost;
//        $post->title       = $post_data['title'];
//        $post->description = $post_data['description'];
//        $post->category_id = $post_data['category_id'];
//
//
//    }

    public function show($id)
    {
        return view('front::blog.single_blog_post', compact('post'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
