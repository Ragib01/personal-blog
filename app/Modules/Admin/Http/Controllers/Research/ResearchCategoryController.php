<?php

namespace App\Modules\Admin\Http\Controllers\Research;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\ResearchCategory;
Use Auth;

class ResearchCategoryController extends Controller
{
    public function index()
    {
        $categories = ResearchCategory::all();
        return view('admin::research.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin::research.category.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
            'image'       => 'required'
        ]);

        $category_data = $request->all();

        if ($request->hasFile('image'))
        {
            $file   = $request->file('image');
            $prefix = 'research_category';
            $path   = 'uploads\images\research-category';

            $file_upload = new FileUpload();
            $upload = $file_upload->upload($file, $prefix, $path);

            if ($upload['status'] == true)
            {
                $image_name = $upload['file_name'];
            }
            else
            {
                return redirect()
                    ->route('admin_research_category_create')
                    ->with('notification.status', 'danger')
                    ->with('notification.message', 'Sorry! Cannot add research category.');
            }

            $category = new ResearchCategory;
            $category->title       = $category_data['title'];
            $category->description = $category_data['description'];
            $category->image       = $image_name;
            $category->created_by  = $user_id;
            $category->updated_by  = $user_id;

            if ($category->save())
            {
                return redirect()
                    ->route('admin_research_category_create')
                    ->with('notification.status', 'success')
                    ->with('notification.message', 'Research Category Added Successfully!  Want to create more?');
            }

        }
        else
        {
            return redirect()
                ->route('admin_research_category_create')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot add research category.');
        }
    }

    public function show($id)
    {
        $category = ResearchCategory::find($id);

        if (count($category) > 0)
        {
            return view('admin::research.category.show', compact('category'));
        }
        else
        {
            return redirect()
                ->route('admin_research_category_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! No Category Found.');
        }
    }

    public function edit($id)
    {
        $category = ResearchCategory::find($id);

        if (count($category) > 0)
        {
            return view('admin::research.category.edit', compact('category'));
        }
        else
        {
            return redirect()
                ->route('admin_research_category_index')
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

        $category = ResearchCategory::find($id);

        if ($request->hasFile('image'))
        {


            $file = $category->image;

            if($file)
            {
                $path   = "uploads/images/research-category/";
                $file_remove = new FileUpload();
                if($file_remove->remove($file, $path))
                {
                    $file   = $request->file('image');
                    $prefix = 'research_category';
                    $path   = 'uploads\images\research-category';

                    $file_upload = new FileUpload();
                    $upload = $file_upload->upload($file, $prefix, $path);

                    if ($upload['status'] == true)
                    {
                        $image_name = $upload['file_name'];
                    }

                }

            }

        }else{
            $image_name = $category->image;
        }

        $category->title       = $category_data['title'];
        $category->description = $category_data['description'];
        $category->image = $image_name;
        $category->updated_by  = $user_id;

        if ($category->update())
        {
            return redirect()
                ->route('admin_research_category_index', ['id' => $id])
                ->with('notification.status', 'success')
                ->with('notification.message', 'Research Category Updated Successfully!');
        }
        else
        {
            return redirect()
                ->route('admin_research_category_edit', ['id' => $id])
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot update research category.');
        }
    }

    public function destroy($id)
    {
        $category = ResearchCategory::find($id);
        $file = $category->image;
        $path   = "uploads/images/research-category/";

        if ($category->delete())
        {
            $file_remove = new FileUpload();
            $file_remove->remove($file, $path);

            return redirect()
                ->route('admin_research_category_index')
                ->with('notification.status', 'success')
                ->with('notification.message', 'Category has been deleted successfully.');
        }
        else
        {
            return redirect()
                ->route('admin_research_category_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot delete research category.');
        }
    }
}
