<?php

namespace App\Modules\Admin\Http\Controllers\Gallery;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
Use Auth;

class GalleryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::all();
        $images      =GalleryImage::all();
        return view('admin::gallery.image.index',compact('categories','images'));
    }

    public function create()
    {
        $categories = GalleryCategory::all();
        return view('admin::gallery.image.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title'       => 'required',
            'image'       => 'required',
            'category_id' => 'required'
        ]);

        $image_data = $request->all();

        if ($request->hasFile('image'))
        {
            $file   = $request->file('image');
            $prefix = 'gallery_image';
            $path   = 'uploads\images\gallery-image';

            $file_upload = new FileUpload();
            $upload = $file_upload->upload($file, $prefix, $path);

            if ($upload['status'] == true)
            {
                $image_name = $upload['file_name'];
            }
            else
            {
                return redirect()
                    ->route('admin_gallery_create')
                    ->with('notification.status', 'danger')
                    ->with('notification.message', 'Sorry! Cannot add gallery image.');
            }

            $image = new GalleryImage;
            $image->title       = $image_data['title'];
            $image->image       = $image_name;
            $image->category_id = $image_data['category_id'];
            $image->created_by  = $user_id;
            $image->updated_by  = $user_id;

            if ($image->save())
            {
                return redirect()
                    ->route('admin_gallery_create')
                    ->with('notification.status', 'success')
                    ->with('notification.message', 'Gallery Image Added Successfully!  Want to create more?');
            }
        }

        else
        {
            return redirect()
                ->route('admin_gallery_create')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot add gallery image.');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $categories = GalleryCategory::all();
        $image = GalleryImage::find($id);

        return view('admin::gallery.image.edit', compact('image','categories'));

    }

    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title'       => 'required',
            'category_id' => 'required'
        ]);

        $image_data = $request->all();

        $image = GalleryImage::find($id);

        if ($request->hasFile('image'))
        {


            $file = $image->image;

            if($file)
            {
                $path   = "uploads/images/gallery-image/";
                $file_remove = new FileUpload();
                if($file_remove->remove($file, $path))
                {
                    $file   = $request->file('image');
                    $prefix = 'gallery-image';
                    $path   = 'uploads\images\gallery-image';

                    $file_upload = new FileUpload();
                    $upload = $file_upload->upload($file, $prefix, $path);

                    if ($upload['status'] == true)
                    {
                        $image_name = $upload['file_name'];
                    }

                }

            }

        }else{
            $image_name = $image->image;
        }

        $image->title = $image_data['title'];
        $image->category_id = $image_data['category_id'];
        $image->image = $image_name;

        if ($image->update())
        {
            return redirect()
                ->route('admin_gallery_edit', ['id' => $id])
                ->with('notification.status', 'success')
                ->with('notification.message', 'Gallery Image Updated Successfully!');
        }
        else
        {
            return redirect()
                ->route('admin_gallery_edit', ['id' => $id])
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot update Gallery Image.');
        }
    }

    public function destroy($id)
    {
        $image = GalleryImage::find($id);
        $file = $image->image;
        $path   = "uploads/images/gallery-image/";

        if ($image->delete())
        {
            $file_remove = new FileUpload();
            $file_remove->remove($file, $path);

            return redirect()
                ->route('admin_gallery_index')
                ->with('notification.status', 'success')
                ->with('notification.message', 'Gallery image has been deleted successfully.');
        }
        else
        {
            return redirect()
                ->route('admin_gallery_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot delete gallery image.');
        }
    }
}
