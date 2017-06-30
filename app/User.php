<?php

namespace App;
use DB;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class User extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'user';
	public function getUsers(){
		$allUsers = file_get_contents((storage_path()."/users.json"), true);
		return $allUsers;
	}
	public function newUser($name, $surname, $age, $bank_account){
		$user = new User();
		$user->name = $name;
		$user->surname = $surname;
		$user->age = $age;
		$user->bank_account = $bank_account;
		$user->save();
	}
}
