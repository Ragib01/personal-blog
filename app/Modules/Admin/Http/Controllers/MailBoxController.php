<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Models...
use App\User;
use App\Models\Mailbox;
use Auth;

class MailBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails   = Mailbox::all();
        return view('admin::mailbox.index',compact('mails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'title'   => 'required',
            'email'   => 'required',
            'email'   => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mails  = Mailbox::find($id);
        return view('admin::mailbox.show',compact('mails'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mails = Mailbox::find($id);

        if ($mails->delete())
        {

            return redirect()
                ->route('admin_mail_index')
                ->with('notification.status', 'success')
                ->with('notification.message', 'E-Mail has been deleted successfully.');
        }
        else
        {
            return redirect()
                ->route('admin_mail_show')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot delete E-Mail.');
        }
    }
}
