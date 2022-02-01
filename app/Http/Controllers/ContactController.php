<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function delete_contact($contact_id = 0){

        $user = auth()->user();
        if($user == null){
            return redirect('/');
        }
        $user_id = $user->id;

        $contact = Contact::where('id', '=', $contact_id)->first();
        $contact_user_id = $contact->user_id;

        if($user_id != $contact_user_id){
            return redirect('/dashboard');
        }
        $contact->delete();

        //echo "deleted contact";
        return redirect('/dashboard')->with('deleted contact');
    }


    function add_new_contact(){
        return view('add_contact');
    }


    function edit_contact($contact_id){

        $user = auth()->user();
        if($user == null){
            return redirect('/');
        }
        $user_id = $user->id;

        $contact = Contact::where('id', '=', $contact_id)->first();
        $contact_user_id = $contact->user_id;
        if($user_id != $contact_user_id){
            return redirect('/dashboard');
        }

        return view('edit_contact', array('contact' => $contact));
    }


    function save_edit_contact(Request $request){


        $user = auth()->user();
        if($user == null){
            return redirect('/');
        }
        $user_id = $user->id;
        $list_id = 1; // todo: override this with custom lists...

        $form = $request->except('_token');
        $form['list_id'] = $list_id;
        $form['user_id'] = $user_id;
        $contact_id = $form['contact_id'];

        //$contact = Contact::where('id', '=', $contact_id)->first();

        $updateOrder = Contact::find($contact_id)->update($form);

        return redirect('/dashboard');

    }



    function save_contact(Request $request){

        $user = auth()->user();
        if($user == null){
            return redirect('/');
        }
        $user_id = $user->id;
        $list_id = 1; // todo: override this with custom lists...

        $form = $request->except('_token');
        $form['list_id'] = $list_id;
        $form['user_id'] = $user_id;

        $contact = new Contact($form);
        $contact->save();

        return redirect('/dashboard');
    }
}
