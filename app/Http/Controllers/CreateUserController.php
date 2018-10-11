<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Validator;
class CreateUserController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $person = Person::all();
        // dd($person);
        return view('create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $person = new Person;

        $rules = [
            'name'       => 'required',
            'email'      => 'required',
            'password'   => 'required',
            'img'        => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return redirect()->to('/create-person')
                ->withErrors($validator)
                ->withInput();
        } else{
            $person->name       = $request->name;
            $person->email  = $request->email;
            $person->password = bcrypt($request->password);
            $img =  $img_name = time() . '.'. $request->img->getClientOriginalExtension();
            $person->img = $img;
            $request->img->move(public_path('images'), $img_name);


            $person->save();
            session()->flash('message', 'Successfully created person');
            return redirect()->to('/');
        }
    }


}
