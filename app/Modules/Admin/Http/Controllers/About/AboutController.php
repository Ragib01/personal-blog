<?php

namespace App\Modules\Admin\Http\Controllers\About;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\About;
Use Auth;

class AboutController extends Controller
{

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required'
        ]);

        $about_data = $request->all();

        $about = new About;
        $about->title       = $about_data['title'];
        $about->description = $about_data['description'];
        $about->created_by  = $user_id;
        $about->updated_by  = $user_id;

        if ($about->save()){
            return redirect()
                ->route('admin_about_edit')
                ->with('notification.status', 'success')
                ->with('notification.message', 'About Added Successfully!');
        }
        else
        {
            return 'Sorry! Cannot Edit About.Please Follow Instrution';
        }
    }


    public function edit($id)
    {
        $about = About::find($id);



        if (count($about) == 1)
        {
            return view('admin::about.edit', compact('about'));
        }
        else
        {
            return 'Woops! something wrong. Please fill up everything carefully';
        }
    }


    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $about_data = $request->all();

        $about = About::find($id);
        $about->title       = $about_data['title'];
        $about->description = $about_data['description'];
        $about->updated_by  = $user_id;

        if ($about->update()) {
            return redirect()
                ->route('admin_about_edit',['id' => $id])
                ->with('notification.status', 'success')
                ->with('notification.message', 'About Article Added Successfully!');
        }
        else {
            return 'Sorry! Please Follow Isntruction. Go Back';
        }
    }

    public function destroy($id)
    {
        //
    }
}
