<?php

namespace App\Modules\Admin\Http\Controllers\Research;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\ResearchCategory;
use App\Models\ResearchPost;
Use Auth;
class ResearchController extends Controller
{
    public function index()
    {
        $categories = ResearchCategory::all();
        $posts      =ResearchPost::all();
        return view('admin::research.post.index',compact('categories','posts'));
    }

    public function create()
    {
        $categories = ResearchCategory::all();
        return view('admin::research.post.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $post_data = $request->all();
        $post = new ResearchPost;

        if ($request->hasFile('url'))
        {
            $file = $request->file('url');
            $prefix = 'research_post';
            $path = 'uploads\url\research-post';

            $file_upload = new FileUpload();
            $upload = $file_upload->upload($file, $prefix, $path);

            if ($upload['status'] == true) {
                $url_name = $upload['file_name'];

                $post->url = $url_name;
            }


        }
            $post->title       = $post_data['title'];
            $post->description = $post_data['description'];
            $post->category_id = $post_data['category_id'];
            $post->created_by  = $user_id;
            $post->updated_by  = $user_id;

        if ($post->save())
        {
            return redirect()
                ->route('admin_research_create')
                ->with('notification.status', 'success')
                ->with('notification.message', 'research Post Added Successfully!  Want to create more?');
        }
        else
        {
            return redirect()
                ->route('admin_research_create')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot add research post.');
        }
    }

    public function show($id)
    {
        $post = ResearchPost::find($id);

        if (count($post) > 0)
        {
            return view('admin::research.post.show', compact('post'));
        }
        else
        {
            return redirect()
                ->route('admin_research_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! No Category Found.');
        }
    }

    public function edit($id)
    {
        $categories = ResearchCategory::all();
        $post       = ResearchPost::find($id);
        return view('admin::research.post.edit',compact('categories','post'));
    }

    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $post_data = $request->all();

        $post = ResearchPost::find($id);

        if ($request->hasFile('url'))
        {


            $file = $post->url;

            if($file)
            {
                $path   = "uploads/url/research-post/";
                $file_remove = new FileUpload();
                if($file_remove->remove($file, $path))
                {
                    $file   = $request->file('url');
                    $prefix = 'research_post';
                    $path   = 'uploads\url\research-post';

                    $file_upload = new FileUpload();
                    $upload = $file_upload->upload($file, $prefix, $path);

                    if ($upload['status'] == true)
                    {
                        $url_name = $upload['file_name'];
                    }

                }

            }

        }else{
            $url_name = $post->url;
        }

        $post->title       = $post_data['title'];
        $post->description = $post_data['description'];
        $post->category_id = $post_data['category_id'];
        $post->url        = $url_name;
        $post->updated_by  = $user_id;

        if ($post->update()) {
            return redirect()
                ->route('admin_research_index', ['id' => $id])
                ->with('notification.status', 'success')
                ->with('notification.message', 'research post Updated Successfully!.Want to create more post?');
        }
        else {
            return redirect()
                ->route('admin_research_edit', ['id' => $id])
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot update research post');
        }
    }

    public function destroy($id)
    {
        $post = ResearchPost::find($id);

        if ($post->delete())
        {

            return redirect()
                ->route('admin_research_index')
                ->with('notification.status', 'success')
                ->with('notification.message', 'Posts has been deleted successfully.');
        }
        else
        {
            return redirect()
                ->route('admin_research_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot delete research post.');
        }
    }
}
