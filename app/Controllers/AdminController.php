<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\CategoryModel;

class AdminController extends BaseController
{
    public function gotologin()
    {
        helper(['form']);
        return view('adminlogin');
    }
    public function gotoregister()
    {
        helper(['form']);
        return view('adminregister');
    }
    public function administrator()
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
        helper(['form']);
        return view('administrator', $data);
    }
    public function auth_login()
    {
        $session = session();
        $main = new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $main->where('username',$username)->first();
        if($data){
            $pass = $data['password'];
            $authpass = password_verify($password, $pass);
            if($authpass){
                $ses_dat = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'isLoggedIn' => true,
                ];
                $session->set($ses_dat);
                return redirect()->to('/administrator');
            }else{
                $session->setFlashdata('msg','Password is incorrect');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg','There is no such Username');
            return redirect()->to('/login');
        }
    }
    public function createaccount()
    {
        $session = session();
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[1]|max_length[99]',
            'password' => 'required|min_length[1]|max_length[99]'
        ];
        if($this->validate($rules)){
            $main = new AdminModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)
            ];
            $main->save($data);
            return redirect()->to('/login');
        }else{
            $session->setFlashdata('msg','Failed to create an account. Try Again');
            $data['validation'] = $this->validator;
            return view('adminregister');
        }
    }
    public function submitform($id)
    {
        $user = new UserModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'quantity' => $this->request->getVar('quantity')
        ];

        if ($this->request->getMethod() == 'post') {
            $datcat = $this->request->getVar('category');
            $valcat = 0;

            if ($datcat == 'Wears') {
                $valcat = 1;
            } elseif ($datcat == 'Electronics') {
                $valcat = 2;
            } elseif ($datcat == 'Jewelry') {
                $valcat = 3;
            }
            $file = $this->request->getFile('image');
            $filename = pathinfo($file->getName(), PATHINFO_FILENAME);
        
            $datatoadd = [
                'name' => $data['name'],
                'category' => $valcat,
                'description' => $data['description'],
                'price' => $data['price'],
                'quantity' => $data['quantity'],
                'image' => $filename,
            ];
        
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move('./products/images');
            } else {
                unset($datatoadd['image']);
            }
            $user->set($datatoadd)->where('id', $id)->update();
        
            return redirect()->to('/administrator');
        }
    }
    public function addproduct(){        
        $user = new UserModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'quantity' => $this->request->getVar('quantity')
        ];

        if ($this->request->getMethod() == 'post') {
            $datcat = $this->request->getVar('category');
            $valcat = 0;

            if ($datcat == 'Wears') {
                $valcat = 1;
            } elseif ($datcat == 'Electronics') {
                $valcat = 2;
            } elseif ($datcat == 'Jewelry') {
                $valcat = 3;
            }

            $rules = [
                'image' => 'uploaded[image]'
            ];

            if ($this->validate($rules)) {
                $file = $this->request->getFile('image');
                $filename = pathinfo($file->getName(), PATHINFO_FILENAME);

                $datatoadd = [
                    'name' => $data['name'],
                    'category' => $valcat,
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'quantity' => $data['quantity'],
                    'image' => $filename,
                ];
                $user->save($datatoadd);

                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move('./products/images');
                }

                return redirect()->to('/administrator');
            }
        }
    }
    public function deleteitem($id)
    {
        $user = new UserModel();
        $record = $user->find($id);
        if($record != null){
            $user->delete($id);
            
            $filename = $record['image'];
            $filePath = './products/images/' . $filename . '.png';
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            return redirect()->to('/administrator');
        }else{
            return "Record not found";
        }
    }
    public function edititem($id)
    {
        $category = new CategoryModel();
        $user = new UserModel();
        $data = [
            'category' => $category->findAll(),
            'products' => $user->findAll(),
            'toedit' => $user->where('id',$id)->first(),
        ];
        return view('administrator', $data);
    }
}