<?php

namespace App\Modules\Admin\Http\Controllers\Gallery;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\GalleryCategory;
Use Auth;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::all();
        return view('admin::gallery.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin::gallery.category.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required'
        ]);

        $category_data = $request->all();

            $category = new GalleryCategory;
            $category->title       = $category_data['title'];
            $category->description = $category_data['description'];
            $category->created_by  = $user_id;
            $category->updated_by  = $user_id;

            if ($category->save())
            {
                return redirect()
                    ->route('admin_gallery_category_create')
                    ->with('notification.status', 'success')
                    ->with('notification.message', 'Gallery Category Added Successfully!  Want to create more?');
            }

        else
        {
            return redirect()
                ->route('admin_gallery_category_create')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot add gallery category.');
        }
    }

    public function show($id)
    {
        $category = GalleryCategory::find($id);

        if (count($category) > 0)
        {
            return view('admin::gallery.category.show', compact('category'));
        }
        else
        {
            return redirect()
                ->route('admin_gallery_category_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! No Category Found.');
        }
    }

    public function edit($id)
    {
        $category = GalleryCategory::find($id);

        if (count($category) > 0)
        {
            return view('admin::gallery.category.edit', compact('category'));
        }
        else
        {
            return redirect()
                ->route('admin_gallery_category_edit')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! No Category Found.');
        }
    }

    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required'
        ]);

        $category_data = $request->all();

        $category = GalleryCategory::find($id);

        $category->title       = $category_data['title'];
        $category->description       = $category_data['description'];
        $category->updated_by  = $user_id;

        if ($category->update())
        {
            return redirect()
                ->route('admin_gallery_category_index', ['id' => $id])
                ->with('notification.status', 'success')
                ->with('notification.message', 'Gallery Category Updated Successfully!');
        }
        else
        {
            return redirect()
                ->route('admin_gallery_category_edit', ['id' => $id])
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot update gallery category.');
        }
    }

    public function destroy($id)
    {
        $category = GalleryCategory::find($id);

        if ($category->delete())
        {

            return redirect()
                ->route('admin_gallery_category_index')
                ->with('notification.status', 'success')
                ->with('notification.message', 'Category has been deleted successfully.');
        }
        else
        {
            return redirect()
                ->route('admin_gallery_category_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot delete gallery category.');
        }
    }
}
