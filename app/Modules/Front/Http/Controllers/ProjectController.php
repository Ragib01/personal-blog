<?php

namespace App\Modules\Front\Http\Controllers;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\ProjectCategory;
use App\Models\ProjectPost;

class ProjectController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::all();
        $posts      = ProjectPost::orderBy('created_at','ASEC')->paginate(8);
        $short      = ProjectPost::get()->sortByDesc('count')->take(4);
        return view('front::project.all_project_post',compact('categories','posts','short'));
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

        $post = new ProjectPost;
        $post->title       = $post_data['title'];
        $post->description = $post_data['description'];
        $post->category_id = $post_data['category_id'];
    }

    public function show($id)
    {
        $post = ProjectPost::find($id);
        $post->count = $post['count']+1;
        $post->update();

        $related     = ProjectPost::where('category_id',$id)->take(4)->get();
        $categories  = ProjectCategory::all();
        return view('front::project.single_project_post', compact('post','categories','related'));
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

    public function CategoryPost($id)
    {
        $categories = ProjectCategory::all();
        $posts      = ProjectPost::orderBy('created_at','ASEC')->where('category_id', $id)->paginate(8);
        $short      = ProjectPost::get()->sortByDesc('count')->take(4);
        return view('front::project.category_project_post',compact('categories','posts','short'));
    }
}
