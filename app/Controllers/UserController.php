<?php

namespace App\Controllers;

use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;
class UserController extends BaseController
{
   public function register():void
   {
       //dump(Capsule::insert('insert into users (name, email, password) values (?,?,?)', ['Dmitry', 'dim@mail.ru', 'asas525']));
      /* $users = Capsule::table('users')->get();
       dump($users);
       $users = Capsule::select('select name, email from users where email = ?', ['andrey@mail.ru']);
       dump($users);
       $user = Capsule::table('users')->where('id', 3)->get();
       dump($user);
       $user = Capsule::table('users')->where('id', 3)->first();
       dump($user);*/
       $user = User::all();
       dump($user);
       view('user/register', ['title'=> "Register page"]);
   }

   public function store()
   {
      $model = new User();
      $model->loadData();
      $data = $model->attributes;
      if(!$model->validate())
      {
          session()->setFlash("error","Validation errors!");
          session()->set("form_errors", $model->getErrors());
          session()->set("form_data", $model->attributes);

      }else{

          /*dump(User::query()->create([
              "name" => $model->attributes['name'],
              "email" => $model->attributes['email'],
              "password" => $model->attributes['password'],
          ]));*/

          if($model->save())
          {
              session()->setFlash("success","Thanks for registration!");
          }else{
              session()->setFlash("error","Error registration!");
          }

      }


      redirect("/register");

   }

   public function login():void
   {
       view('user/login', ['title'=> "Login"]);
   }


}