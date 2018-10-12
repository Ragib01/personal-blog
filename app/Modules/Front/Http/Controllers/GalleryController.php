<?php

namespace App\Modules\Front\Http\Controllers;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
class GalleryController extends Controller
{

    public function index()
    {
        $categories = GalleryCategory::all();
        $images      =GalleryImage::all();
        return view('front::gallery',compact('categories','images'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'category_id' => 'required'
        ]);

        $image_data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $prefix = 'gallery_image';
            $path = 'uploads\images\gallery-image';

            $file_upload = new FileUpload();
            $upload = $file_upload->upload($file, $prefix, $path);

            if ($upload['status'] == true) {
                $image_name = $upload['file_name'];
            } else {
                return redirect()
                    ->route('gallery_index')
                    ->with('notification.status', 'danger')
                    ->with('notification.message', 'Sorry! Cannot add gallery image.');
            }

            $image = new GalleryImage;
            $image->title = $image_data['title'];
            $image->image = $image_name;
            $image->category_id = $image_data['category_id'];
        }
    }

    public function show($id)
    {
        //
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
