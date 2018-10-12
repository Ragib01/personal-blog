<?php

namespace App\Modules\Front\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Models
use App\User;
use App\Models\Contact;
use App\Models\Mailbox;
use Auth;

class ContactController extends Controller
{
    public function index()
    {
        $contact    = Contact::all();
        $mails      = Mailbox::all();
        return view('front::contact',compact('contact'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'adress'   => 'required',
            'email'   => 'required',
        ]);

        $contact_data = $request->all();

        $contact = new Contact;
        $contact->address     = $contact_data['address'];
        $contact->phone       = $contact_data['phone'];
        $contact->tele_phone  = $contact_data['tele_phone'];
        $contact->fax         = $contact_data['fax'];
        $contact->email         = $contact_data['email'];
    }

    public function mailStore(Request $request)
    {

        $this->validate($request, [
            'name'   => 'required',
            'email'   => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $mailStore_data = $request->all();

        $mailStore = new Mailbox;
        $mailStore->name     = $mailStore_data['name'];
        $mailStore->email    = $mailStore_data['email'];
        $mailStore->phone    = $mailStore_data['phone'];
        $mailStore->subject  = $mailStore_data['subject'];
        $mailStore->message  = $mailStore_data['message'];

        if ($mailStore->save()){
            return redirect()
                ->route('contact_index')
                ->with('notification.status', 'success')
                ->with('notification.message', 'E-Mail send Successfully!');
        }
        else
        {
            return redirect()
                ->route('contact_index')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot send e-mail.');
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
