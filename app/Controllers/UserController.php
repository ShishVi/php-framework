<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
   public function register():void
   {
       view('user/register', ['title'=> "Register page"]);
   }

   public function store()
   {
      $model = new User();
      $model->loadData();
      $data = $model->attributes;
      dump($model->validate());
      dump($model->getErrors());
      dump($data);
      dump($_POST);
   }

   public function login():void
   {
       view('user/login', ['title'=> "Login"]);
   }
}