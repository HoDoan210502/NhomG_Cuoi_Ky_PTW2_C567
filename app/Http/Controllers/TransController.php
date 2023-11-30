<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TransController extends Controller
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

    //Add Manu
    public function addTrans()
    {
        $this->AuthLogin();
        return view('admin.addtrans');
    }

    //All Manu
    public function allTrans()
    {
        $this->AuthLogin();
        $all_trans = DB::table('tbl_trans')->paginate(3);
        return view('admin.alltrans')->with('all_trans', $all_trans);
    }

    //Save Manu
    public function saveTrans(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['trans_name'] = $request->trans_name;
        $data['trans_status'] = $request->trans_status;
        $data['trans_desc'] = $request->trans_desc;

        DB::table('tbl_trans')->insert($data);
        Session::put('message', 'Thêm thành công');
        return view('admin.addtrans');
    }

    //Show Manu
    public function showTrans($trans_id)
    {
        $this->AuthLogin();
        DB::table('tbl_trans')->where('trans_id', $trans_id)->update(['trans_status' => 0]);
        Session::put('message', 'Thay đổi phương thức thể hiện của dvvc thành công');
        return view('admin.dashboard');
    }

    //Hide Manu
    public function hideTrans($trans_id)
    {
        $this->AuthLogin();
        DB::table('tbl_trans')->where('trans_id', $trans_id)->update(['trans_status' => 1]);
        Session::put('message', 'Thay đổi phương thức thể hiện của dvvc thành công');
        return view('admin.dashboard');
    }

    //Edit Manu
    public function editTrans($trans_id)
    {
        $this->AuthLogin();
        $edit_trans = DB::table('tbl_trans')->where('trans_id', $trans_id)->get();
        return view('admin.edittrans')->with('edit_trans', $edit_trans);
    }

    //Update Manu
    public function updateTrans(Request $request, $trans_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['trans_name'] = $request->trans_name;
        $data['trans_desc'] = $request->trans_desc;
        DB::table('tbl_trans')->where('trans_id', $trans_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return view('admin.dashboard');
    }

    //Delete Manu
    public function deleteTrans($trans_id)
    {
        $this->AuthLogin();
        DB::table('tbl_trans')->where('trans_id', $trans_id)->delete();
        Session::put('message', 'Xoá thành công');
        return view('admin.dashboard');
    }
}
