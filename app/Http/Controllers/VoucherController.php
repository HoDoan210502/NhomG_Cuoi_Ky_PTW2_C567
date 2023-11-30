<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class VoucherController extends Controller
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
    public function addVou()
    {
        $this->AuthLogin();
        return view('admin.addvoucher');
    }

    //All Manu
    public function allVou()
    {
        $this->AuthLogin();
        $all_vou = DB::table('tbl_voucher')->paginate(3);
        return view('admin.allvoucher')->with('all_vou', $all_vou);
    }

    //Save Manu
    public function saveVou(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['vou_name'] = $request->vou_name;
        $data['vou_status'] = $request->vou_status;
        $data['vou_desc'] = $request->vou_desc;

        DB::table('tbl_voucher')->insert($data);
        Session::put('message', 'Thêm thành công');
        return view('admin.addvoucher');
    }

    //Show Manu
    public function showVou($vou_id)
    {
        $this->AuthLogin();
        DB::table('tbl_voucher')->where('vou_id', $vou_id)->update(['vou_status' => 0]);
        Session::put('message', 'Thay đổi phương thức thể hiện của voucher thành công');
        return view('admin.dashboard');
    }

    //Hide Manu
    public function hideVou($vou_id)
    {
        $this->AuthLogin();
        DB::table('tbl_voucher')->where('vou_id', $vou_id)->update(['vou_status' => 1]);
        Session::put('message', 'Thay đổi phương thức thể hiện của voucher thành công');
        return view('admin.dashboard');
    }

    //Edit Manu
    public function editVou($vou_id)
    {
        $this->AuthLogin();
        $edit_vou = DB::table('tbl_voucher')->where('vou_id', $vou_id)->get();
        return view('admin.editvoucher')->with('edit_vou', $edit_vou);
    }

    //Update Manu
    public function updateVou(Request $request, $vou_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['vou_name'] = $request->vou_name;
        $data['vou_desc'] = $request->vou_desc;
        DB::table('tbl_voucher')->where('vou_id', $vou_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return view('admin.dashboard');
    }

    //Delete Manu
    public function deleteVou($vou_id)
    {
        $this->AuthLogin();
        DB::table('tbl_voucher')->where('vou_id', $vou_id)->delete();
        Session::put('message', 'Xoá thành công');
        return view('admin.dashboard');
    }
}
