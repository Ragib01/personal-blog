<?php

namespace App\Modules\Admin\Http\Controllers\Contact;

use App\Models\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
Use App\User;
Use Auth;

class ContactController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'address'   => 'required',
            'email'   => 'required',
        ]);

        $contact_data = $request->all();

        $contact = new Contact();
        $contact->address     = $contact_data['address'];
        $contact->phone       = $contact_data['phone'];
        $contact->tele_phone  = $contact_data['tele_phone'];
        $contact->fax         = $contact_data['fax'];
        $contact->email       = $contact_data['email'];
        $contact->created_by  = $user_id;
        $contact->updated_by  = $user_id;

        if ($contact->save()){
            return redirect()
                ->route('admin_contact_edit')
                ->with('notification.status', 'success')
                ->with('notification.message', 'Your contact Added Successfully!');
        }
        else
        {
            return redirect()
                ->route('admin_contact_edit')
                ->with('notification.status', 'danger')
                ->with('notification.message', 'Sorry! Cannot add contact .');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);



        if (count($contact) == 1)
        {
            return view('admin::contact.edit', compact('contact'));
        }
        else
        {
            return 'Woops! something wrong. Please fill up everything carefully';
        }
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
        $user_id = Auth::user()->id;

        $this->validate($request, [
            'address'   => 'required',
            'email'   => 'required',
        ]);

        $contact_data = $request->all();

        $contact = Contact::find($id);
        $contact->address     = $contact_data['address'];
        $contact->phone       = $contact_data['phone'];
        $contact->tele_phone  = $contact_data['tele_phone'];
        $contact->fax         = $contact_data['fax'];
        $contact->email       = $contact_data['email'];
        $contact->updated_by  = $user_id;

        if ($contact->update()) {
            return redirect()
                ->route('admin_contact_edit',['id' => $id])
                ->with('notification.status', 'success')
                ->with('notification.message', 'Your contact Added Successfully!');
        }
        else {
            return 'Sorry! Please Follow Isntruction. Go Back';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
