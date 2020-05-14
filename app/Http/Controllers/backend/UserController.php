<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getListUser(){
        $data['user'] = User::where('level','>=',auth()->user()->level)->paginate(5);
        return view('backend.user.listuser',$data);
    }
    public function getAddUser(){
        return view('backend.user.adduser');
    }
    function postAddUser(AddUserRequest $r){
        
        $user = new User;
        $user->email = $r->email;
        $user->password = Hash::make($r->password);
        $user->fullname = $r->fullname;
        $user->age = $r->age;
        $user->sex = $r->sex;
        $user->level = $r->level;
        $user->save();
        return redirect('/admin/user')->with('thongbao','Đã thêm thành công');
    }
     function getEditUser($idUser){
        $data['user'] = User::find($idUser);
        return view('backend.user.edituser',$data);
    }
     function postEditUser(EditUserRequest $r,$idUser){
        $user = User::find($idUser);
        $user->email = $r->email;
        $user->password = Hash::make($r->password);
        $user->fullname = $r->fullname;
        $user->age = $r->age;
        $user->sex = $r->sex;
        $user->level = $r->level;
        $user->save();

        return redirect('/admin/user')->with('thongbao','Đã Sửa thành công');
    }
    function delUser($idUser){
        $user = User::find($idUser)->delete();
        return redirect('/admin/user')->with('thongbao','Đã xóa thành công');
    }
}
