<?php

namespace App\Modules\Admin\Http\Controllers\Blog;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Auth;

class BlogController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::all();
        $posts      =BlogPost::all();
        return view('admin::blog.post.index',compact('categories','posts'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin::blog.post.create',compact('categories'));
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
        $post = new BlogPost;

        if ($request->hasFile('url'))
        {
            $file   = $request->file('url');
            $prefix = 'blog_post';
            $path   = 'uploads\url\blog-post';

            $file_upload = new FileUpload();
            $upload = $file_upload->upload($file, $prefix, $path);

            if ($upload['status'] == true)
            {
                $url_name = $upload['file_name'];

                $post->url        = $url_name;
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
                ->route('admin_blog_create')
                ->with('notification.status', 'success')
                ->with('notification.message', 'Blog Post Added Successfully!  Want to create more?');
        }
        else
        {
            return redirect()
                ->route('admin_blog_create')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot add blog post.');
        }
    }

    public function show($id)
    {
        $post = BlogPost::find($id);

        if (count($post) > 0)
        {
            return view('admin::blog.post.show', compact('post'));
        }
        else
        {
            return redirect()
                ->route('admin_blog_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! No Category Found.');
        }
    }

    public function edit($id)
    {
        $categories = BlogCategory::all();
        $post       = BlogPost::find($id);
        return view('admin::blog.post.edit',compact('categories','post'));
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

        $post = BlogPost::find($id);

        if ($request->hasFile('url'))
        {


            $file = $post->url;

            if($file)
            {
                $path   = "uploads/url/blog-post/";
                $file_remove = new FileUpload();
                if($file_remove->remove($file, $path))
                {
                    $file   = $request->file('url');
                    $prefix = 'blog_post';
                    $path   = 'uploads\url\blog-post';

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
                ->route('admin_blog_index', ['id' => $id])
                ->with('notification.status', 'success')
                ->with('notification.message', 'Blog post Updated Successfully!.Want to create more post?');
        }
        else {
            return redirect()
                ->route('admin_blog_edit', ['id' => $id])
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot update blog post');
        }
    }

    public function destroy($id)
    {
        $post = BlogPost::find($id);

        if ($post->delete())
        {

            return redirect()
                ->route('admin_blog_index')
                ->with('notification.status', 'success')
                ->with('notification.message', 'Posts has been deleted successfully.');
        }
        else
        {
            return redirect()
                ->route('admin_blog_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot delete blog post.');
        }
    }
}
