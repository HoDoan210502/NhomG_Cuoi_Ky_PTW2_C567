<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class InfoController extends Controller
{
    //Admin Login
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    //Add San Pham
    public function addInfo()
    {
        $this->AuthLogin();
        $user_info = DB::table('tbl_user')->orderBy('user_id', 'desc')->get();
        $pay_info = DB::table('tbl_pay')->orderBy('pay_id', 'desc')->get();
        return view('admin.addinfo')->with('user_info', $user_info)->with('pay_info', $pay_info);
    }

    //All San Pham
    public function allInfo()
    {
        $this->AuthLogin();
        $all_info = DB::table('tbl_info')->join('tbl_user', 'tbl_info.user_id', '=', 'tbl_user.user_id')->join('tbl_pay', 'tbl_info.pay_id', '=', 'tbl_pay.pay_id')->orderBy('tbl_info.info_id', 'desc')->paginate(3);

        return view('admin.allinfo')->with('all_info', $all_info);
    }

    //Luu San Pham
    public function saveInfo(Request $request)
    {
        $this->AuthLogin();
        $data = array();

        $data['user_id'] = $request->info_user;
        $data['pay_id'] = $request->info_pay;
        $data['info_number'] = $request->info_number;
        DB::table('tbl_info')->insert($data);
        Session::put('message', 'Thêm thành công');
        return view('admin.dashboard');
    }

    //Sua San Pham
    public function editInfo($info_id)
    {
        $this->AuthLogin();
        $user_info = DB::table('tbl_user')->orderBy('user_id', 'desc')->get();
        $pay_info = DB::table('tbl_pay')->orderBy('pay_id', 'desc')->get();

        $edit_info = DB::table('tbl_info')->where('info_id', $info_id)->get();
        $manager_info = view('admin.editinfo')->with('editinfo', $edit_info)->with('user_info', $user_info)->with('pay_info', $pay_info);
        return view('adminlayout')->with('admin.editinfo', $manager_info);
    }

    //Cap Nhat San Pham
    public function updateInfo(Request $request, $info_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['user_id'] = $request->info_user;
        $data['pay_id'] = $request->info_pay;
        $data['info_number'] = $request->info_number;
        DB::table('tbl_info')->where('info_id', $info_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return view('admin.dashboard');
    }

    //Xoa San Pham
    public function deleteInfo($info_id)
    {
        $this->AuthLogin();
        DB::table('tbl_info')->where('info_id', $info_id)->delete();
        Session::put('message', 'Xoá sản phẩm thành công');
        return view('admin.dashboard');
    }
}
