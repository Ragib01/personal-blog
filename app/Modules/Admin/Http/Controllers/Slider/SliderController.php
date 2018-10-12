<?php

namespace App\Modules\Admin\Http\Controllers\Slider;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\Slider;
Use Auth;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin::slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin::slider.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title'       => 'required',
            'image'       => 'required'
        ]);

        $slider_data = $request->all();

        if ($request->hasFile('image'))
        {
            $file   = $request->file('image');
            $prefix = 'slider';
            $path   = 'uploads\images\slider';

            $file_upload = new FileUpload();
            $upload = $file_upload->upload($file, $prefix, $path);

            if ($upload['status'] == true)
            {
                $image_name = $upload['file_name'];
            }
            else
            {
                return redirect()
                    ->route('admin_slider_create')
                    ->with('notification.status', 'danger')
                    ->with('notification.message', 'Sorry! Cannot add Slider.');
            }

            $slider = new Slider;
            $slider->title       = $slider_data['title'];
            $slider->image       = $image_name;
            $slider->created_by  = $user_id;
            $slider->updated_by  = $user_id;

            if ($slider->save())
            {
                return redirect()
                    ->route('admin_slider_create')
                    ->with('notification.status', 'success')
                    ->with('notification.message', 'Slider Added Successfully!  Want to create more?');
            }

        }
        else
        {
            return redirect()
                ->route('admin_slider_create')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot add Slider');
        }
    }

    public function show($id)
    {
//        $slider = Slider::find($id);
//
//        if (count($slider) > 0)
//        {
//            return view('admin::slider.show', compact('slider'));
//        }
//        else
//        {
//            return redirect()
//                ->route('admin_slider_index')
//                ->with('notification.status', 'danger')
//                ->with('notification.message', 'Sorry! No Slider Found.');
//        }
    }

    public function edit($id)
    {
        $slider = Slider::find($id);

        if (count($slider) > 0)
        {
            return view('admin::slider.edit', compact('slider'));
        }
        else
        {
            return redirect()
                ->route('admin_slider_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! No Slider Found.');
        }
    }

    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title'       => 'required'

        ]);

        $slider_data = $request->all();

        $slider = Slider::find($id);

        if ($request->hasFile('image'))
        {


            $file = $slider->image;

            if($file)
            {
                $path   = "uploads/images/slider/";
                $file_remove = new FileUpload();
                if($file_remove->remove($file, $path))
                {
                    $file   = $request->file('image');
                    $prefix = 'slider';
                    $path   = 'uploads\images\slider';

                    $file_upload = new FileUpload();
                    $upload = $file_upload->upload($file, $prefix, $path);

                    if ($upload['status'] == true)
                    {
                        $image_name = $upload['file_name'];
                    }

                }

            }

        }else{
            $image_name = $slider->image;
        }

        $slider->title       = $slider_data['title'];
        $slider->image       = $image_name;
        $slider->updated_by  = $user_id;

        if ($slider->update())
        {
            return redirect()
                ->route('admin_slider_index', ['id' => $id])
                ->with('notification.status', 'success')
                ->with('notification.message', 'Slider Updated Successfully!');
        }
        else
        {
            return redirect()
                ->route('admin_slider_edit', ['id' => $id])
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot update slider.');
        }
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $file = $slider->image;
        $path   = "uploads/images/slider/";

        if ($slider->delete())
        {
            $file_remove = new FileUpload();
            $file_remove->remove($file, $path);

            return redirect()
                ->route('admin_slider_index')
                ->with('notification.status', 'success')
                ->with('notification.message', 'Slider has been deleted successfully.');
        }
        else
        {
            return redirect()
                ->route('admin_slider_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot delete slider.');
        }
    }
}
