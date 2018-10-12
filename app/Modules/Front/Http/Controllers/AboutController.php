<?php

namespace App\Modules\Front\Http\Controllers;

use App\Http\Requests;
use App\Lib\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();
        return view('front::about',compact('about'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required'
        ]);

        $about_data = $request->all();

        $about = new About;
        $about->title       = $about_data['title'];
        $about->description = $about_data['description'];
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
