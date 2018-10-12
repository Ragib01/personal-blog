<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserListController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin::userList',compact('users'));
    }

    public function update($id)
    {

        $users = User::find($id);

        if($users->status == 0)
        {
            $users->status =1;

            if ($users->update()) {
                return redirect()
                    ->route('admin_user_list')
                    ->with('notification.status', 'success')
                    ->with('notification.message', ''.$users->name.' Active successfully');
            }
            else {
                return redirect()
                    ->route('admin_user_list')
                    ->with('notification.status', 'success')
                    ->with('notification.message', 'Woops error');
            }
        }
        elseif($users->status == 1)
        {
            $users->status =0;
            if ($users->update()) {
                return redirect()
                    ->route('admin_user_list')
                    ->with('notification.status', 'success')
                    ->with('notification.message', ''.$users->name.' deactive successfully');
            }
            else {
                return redirect()
                    ->route('admin_user_list')
                    ->with('notification.status', 'success')
                    ->with('notification.message', 'Woops error');
            }
        }



    }
}
