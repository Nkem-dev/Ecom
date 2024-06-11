<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   //

   //when you are trying a form and you are getting some inputs from your html form then you must make use of this
   public function store(Request $request)
   {
      //validation of inputs
      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
         'email' => 'required|email|unique:users,email|max:225,string',
         'address' => 'required|string',
         'phone' => 'required|string',
         'password' => 'required|min:5|max:40',
         'confirm_password' => 'required|min:5|max:40|same:password',
      ]);

      if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }

      $user = new User(); //one of the method of adding a new data to the database in the user table
      $user->name = $request->name; //user is holding our user table then you have a column called name in the user table then what is going to be the value that is why we are requesting name(whatever anybody put in the input field that has an attribute of name). you can do the same thing for other values.
      $user->email = $request->email;
      $user->address = $request->address;
      $user->phone = $request->phone;
      $user->password = Hash::make($request->password);
      $save = $user->save();

      if ($save) {
         return redirect()->route('login')->with('message', 'Registration Successful');
      }
   }


   public function logout()
   {
      Auth::guard('web')->logout();
      return redirect('/')->with('message', 'You have successfully logged out');
   }

   public function product_details($id)
   {
      $data = Products::findorFail($id);
      $getId = $data->id;
      //dd($getId);

      $getCat = $data->productCategory;

      $similar = Products::where('productCategory', $getCat)->where('id', '!=', $data->id)->latest()->paginate(4);

      return view('product_details', compact('data', 'similar'));

   }
}
