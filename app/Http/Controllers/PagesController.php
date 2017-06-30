<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
class PagesController 
{
   // function testPage(){
      //  $user = new Usr();
      //  $users = json_decode($user->getUsers())->data;
      //  return view('user', compact('users'));
 //   }
    function usersMongo(){
      $users = json_decode(User::all());
        return view('user', compact('users'));
   }
    function createUser(Request $request){
        //$newUser = new Usr();
       // $newUser->newUser($request->name, $request->surname, $request->age); 
       //TODO: ask how is better;
       $newUser = new User();
       $newUser->name = $request->name;
       $newUser->surname = $request->surname;
       $newUser->age = $request->age;
       $newUser->bank_account = $request->bank_account;
       $newUser->save();
        return redirect('/users');
    }
    function deleteUser(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return redirect('/users');
    }
    function updateUser(Request $request){
        $user = User::find($request->id);
        return $user;
       /* $user->name = $request->name;
        $user->surname = $request->surname;
        $user->age = $request->age;
        $user->bank_account = $request->bank_account;
        $user->save();
        return redirect('/users');*/
    }
}
