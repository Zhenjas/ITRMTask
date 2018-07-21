<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    private $rules = array(
            'title' => 'required|string|max:255',
            'forename' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'country' => 'required|string',
            'town' => 'required|string',
            'post_code' => 'required|string',
            'from_date' => 'required|string|max:255',
            'until_date' => 'required|string',
            'address_one' => 'required',
    );


    private $password_rules = array(
            'password' => 'required|string|min:6|confirmed',
    );


    public function update(Request $request, User $user)
    {

        $v = Validator::make($request->all(), $this->rules);

        if ($v->fails())
        {
            redirect()->back()->withErrors($v)->withInput();
        }


        $current_id = \Auth::user()->id;
        $profile= \App\User::find($current_id);
        $profile->title=$request->get('title');
        $profile->forename=$request->get('forename');
        $profile->surname=$request->get('surname');
        $profile->dob=$request->get('dob');
        $profile->gender=$request->get('gender');
        $profile->country=$request->get('country');
        $profile->county=$request->get('county');
        $profile->town=$request->get('town');
        $profile->post_code=$request->get('post_code');
        $profile->from_date=$request->get('from_date');
        $profile->until_date=$request->get('until_date');
        $profile->address_one=$request->get('address_one');
        $profile->address_two=$request->get('address_two');
        $profile->save();
        return redirect()->back()->withMessage('Profile is updated');
    }


    public function password_update(Request $request, User $user)
    {

        $v = Validator::make($request->all(), $this->password_rules);

        if ($v->fails())
        {
            redirect()->back()->withErrors($v)->withInput();
        }


        $current_id = \Auth::user()->id;
        $profile= \App\User::find($current_id);
        $profile->password=Hash::make($request->get('password'));
        $profile->save();
        return redirect()->back()->withMessage('Password changed');
    }

}
