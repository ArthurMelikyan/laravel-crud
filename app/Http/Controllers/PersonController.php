<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Validator;
class PersonController extends Controller
{
    public function index(){
        $persons = Person::all();
        return view('person-index', [
            'persons' => $persons
        ]);
    }


    public function edit($id)
    {
        $person =  Person::findOrFail($id);

        return view('edit-person', ['person' => $person]);
    }

    public function update(Request $request, $id)
    {
        $person = Person::find($id);


        $rules = [
            'name'       => 'required',
            'email'      => 'required',
            'password'   => 'required',
            'img'        => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->to('/edit-person/'.$id)
                ->withErrors($validator)
                ->withInput();
        } else{
            $person->name  = $request->name;
            $person->email  = $request->email;
            $person->password = bcrypt($request->password);
            $img =  $img_name = time() . '.'. $request->img->getClientOriginalExtension();
            $person->img = $img;
            $request->img->move(public_path('images'), $img_name);


            $person->save();
            session()->flash('message', 'Successfully updated person');
            return redirect()->to('/');
        }
    }


    public function destroy($id){
        $getPerson = Person::find($id);
        $getPerson->delete();
        session()->flash('message', 'Successfully deleted the person!');
        return redirect()->to('/');
    }

}
