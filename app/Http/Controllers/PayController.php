<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PayController extends Controller
{
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
    public function addPay()
    {
        $this->AuthLogin();
        return view('admin.addpay');
    }

    //All Manu
    public function allPay()
    {
        $this->AuthLogin();
        $all_pay = DB::table('tbl_pay')->paginate(3);
        return view('admin.allpay')->with('all_pay', $all_pay);
    }

    //Save Manu
    public function savePay(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['pay_name'] = $request->pay_name;
        $data['pay_status'] = $request->pay_status;
        $data['pay_desc'] = $request->pay_desc;

        DB::table('tbl_pay')->insert($data);
        Session::put('message', 'Thêm thành công');
        return view('admin.addpay');
    }

    //Show Manu
    public function showPay($pay_id)
    {
        $this->AuthLogin();
        DB::table('tbl_pay')->where('pay_id', $pay_id)->update(['pay_status' => 0]);
        Session::put('message', 'Thay đổi phương thức thể hiện của pay thành công');
        return view('admin.dashboard');
    }

    //Hide Manu
    public function hidePay($pay_id)
    {
        $this->AuthLogin();
        DB::table('tbl_pay')->where('pay_id', $pay_id)->update(['pay_status' => 1]);
        Session::put('message', 'Thay đổi phương thức thể hiện của pay thành công');
        return view('admin.dashboard');
    }

    //Edit Manu
    public function editPay($pay_id)
    {
        $this->AuthLogin();
        $edit_pay = DB::table('tbl_pay')->where('pay_id', $pay_id)->get();
        return view('admin.editpay')->with('edit_pay', $edit_pay);
    }

    //Update Manu
    public function updatePay(Request $request, $pay_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['pay_name'] = $request->pay_name;
        $data['pay_desc'] = $request->pay_desc;
        DB::table('tbl_pay')->where('pay_id', $pay_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return view('admin.dashboard');
    }

    //Delete Manu
    public function deletePay($pay_id)
    {
        $this->AuthLogin();
        DB::table('tbl_pay')->where('pay_id', $pay_id)->delete();
        Session::put('message', 'Xoá thành công');
        return view('admin.dashboard');
    }
}
