<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\BlogPost;
use App\Models\ResearchPost;
use App\Models\ProjectPost;

class DashboardController extends Controller
{
    public function index()
    {
        $blogs      = BlogPost::all();
        $researches = ResearchPost::all();
        $projects   = ResearchPost::all();


        $total_blog = count($blogs);
        $total_research = count($researches);
        $total_project = count($projects);
        return view('admin::dashboard',compact('total_blog','total_research','total_project'));
    }

}
