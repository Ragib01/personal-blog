<?php

namespace App\Modules\Admin\Http\Controllers\Breaking;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\Breaking;
Use Auth;

class BreakingController extends Controller
{

    public function index()
    {
        $posts      = Breaking::all();
        return view('admin::breaking.index',compact('posts'));
    }

    public function create()
    {
        return view('admin::breaking.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title'       => 'required',
            'status' => 'required'
        ]);

        $post_data = $request->all();

        $post = new Breaking();
        $post->title       = $post_data['title'];
        $post->url       = $post_data['url'];
        $post->status = $post_data['status'];
        $post->created_by  = $user_id;
        $post->updated_by  = $user_id;

        if ($post->save()){
            return redirect()
                ->route('admin_breaking_create')
                ->with('notification.status', 'success')
                ->with('notification.message', 'Breaking Added Successfully!');
        }
        else
        {
            return redirect()
                ->route('admin_blog_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot add breaking.');
        }
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post      = Breaking::find($id);
        return view('admin::breaking.edit',compact('post'));
    }
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title' => 'required',
            'status' => 'required'
        ]);

        $post_data = $request->all();

        $post = Breaking::find($id);
        $post->title       = $post_data['title'];
        $post->url       = $post_data['url'];
        $post->status = $post_data['status'];
        $post->created_by  = $user_id;
        $post->updated_by  = $user_id;

        if ($post->update()) {
            return redirect()
                ->route('admin_breaking_edit', ['id' => $id])
                ->with('notification.status', 'success')
                ->with('notification.message', 'Breaking Updated Successfully!.Want to create more post?');
        }
        else {
            return redirect()
                ->route('admin_breaking_index', ['id' => $id])
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot update breaking');
        }
    }

    public function destroy($id)
    {
        $post = Breaking::find($id);

        if ($post->delete())
        {

            return redirect()
                ->route('admin_breaking_index')
                ->with('notification.status', 'success')
                ->with('notification.message', 'Breaking has been deleted successfully.');
        }
        else
        {
            return redirect()
                ->route('admin_breaking_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot delete breaking.');
        }
    }
}
