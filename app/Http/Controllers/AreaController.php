<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AreaController extends Controller
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
    public function addArea()
    {
        $this->AuthLogin();
        return view('admin.addarea');
    }

    //All Manu
    public function allArea()
    {
        $this->AuthLogin();
        $all_area = DB::table('tbl_area')->paginate(3);
        return view('admin.allarea')->with('all_area', $all_area);
    }

    //Save Manu
    public function saveArea(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['area_name'] = $request->area_name;
        $data['area_status'] = $request->area_status;
        $data['area_desc'] = $request->area_desc;

        DB::table('tbl_area')->insert($data);
        Session::put('message', 'Thêm thành công');
        return view('admin.addarea');
    }

    //Show Manu
    public function showArea($area_id)
    {
        $this->AuthLogin();
        DB::table('tbl_area')->where('area_id', $area_id)->update(['area_status' => 0]);
        Session::put('message', 'Thay đổi phương thức thể hiện của area thành công');
        return view('admin.dashboard');
    }

    //Hide Manu
    public function hideArea($area_id)
    {
        $this->AuthLogin();
        DB::table('tbl_area')->where('area_id', $area_id)->update(['area_status' => 1]);
        Session::put('message', 'Thay đổi phương thức thể hiện của area thành công');
        return view('admin.dashboard');
    }

    //Edit Manu
    public function editArea($area_id)
    {
        $this->AuthLogin();
        $edit_area = DB::table('tbl_area')->where('area_id', $area_id)->get();
        return view('admin.editarea')->with('edit_area', $edit_area);
    }

    //Update Manu
    public function updateArea(Request $request, $area_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['area_name'] = $request->area_name;
        $data['area_desc'] = $request->area_desc;
        DB::table('tbl_area')->where('area_id', $area_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return view('admin.dashboard');
    }

    //Delete Manu
    public function deleteArea($area_id)
    {
        $this->AuthLogin();
        DB::table('tbl_area')->where('area_id', $area_id)->delete();
        Session::put('message', 'Xoá thành công');
        return view('admin.dashboard');
    }
}
