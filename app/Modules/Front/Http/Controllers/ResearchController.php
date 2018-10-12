<?php

namespace App\Modules\Front\Http\Controllers;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\ResearchCategory;
use App\Models\ResearchPost;

class ResearchController extends Controller
{

    public function index()
    {
        $categories = ResearchCategory::all();
        $posts      = ResearchPost::orderBy('created_at','ASEC')->paginate(8);
        $short      = ResearchPost::get()->sortByDesc('count')->take(4);
        return view('front::research.all_research_post',compact('categories','posts','short'));
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

        $post = new ResearchPost;
        $post->title       = $post_data['title'];
        $post->description = $post_data['description'];
        $post->category_id = $post_data['category_id'];

    }

    public function show($id)
    {
        $post = ResearchPost::find($id);
        $post->count = $post['count']+1;
        $post->update();

        $related     = ResearchPost::where('category_id',$id)->take(4)->get();
        $categories  = ResearchCategory::all();
        return view('front::research.single_research_post', compact('post','categories','related'));

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
        $categories = ResearchCategory::all();
        $posts      = ResearchPost::orderBy('created_at','ASEC')->where('category_id', $id)->paginate(8);
        $short      = ResearchPost::get()->sortByDesc('count')->take(4);
        return view('front::research.category_research_post',compact('categories','posts','short'));
    }
}
