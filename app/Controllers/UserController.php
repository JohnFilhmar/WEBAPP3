<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CategoryModel;

class UserController extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $cat = new CategoryModel();
        $userdata = [
        'products' => $user->findAll(),
        'item' => [],
        ];
        $catdata = [
            'category' => $cat->findAll(),
            'cat' => [],
        ];
        $data = array_merge($userdata, $catdata);
        return view('userinterface', $data);
    }
}
