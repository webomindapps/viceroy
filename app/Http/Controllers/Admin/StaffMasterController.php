<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffMasterController extends Controller
{
    public function index(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');


        if ($from_date && $to_date) {
            $users = Staff::whereBetween('created_at', [$from_date . ' 00:00:00', $to_date . ' 23:59:59'])
                ->latest()
                ->paginate(20);
        } else {
            $users = Staff::latest()->paginate(20);
        }
        return view('admin.staffmaster.index', compact('users'));
    }
    public function create()
    {
        return view('admin.staffmaster.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:staff',
            'password' => 'required|same:conf_password',
            'conf_password' => 'required',
        ]);
        $staff = new Staff();
        $staff->name = $request->input('name');
        $staff->email = $request->input('email');
        $staff->password = Hash::make($request->password);
        $staff->save();
        return redirect()->route('staffmaster')->with('success', 'Staff Added Successfully');
    }

    public function edit($id)
    {

        $staff = Staff::find($id);
        return view('admin.staffmaster.edit', compact('staff'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|same:conf_password',
            'conf_password' => 'required',
        ]);
        $staff = Staff::find($id);
        $staff->name = $request->input('name');
        $staff->email = $request->input('email');
        $staff->password = Hash::make($request->password);
        $staff->save();
        return redirect()->route('staffmaster')->with('success', 'Staff Updated Successfully');
    }
    public function delete($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect()->route('staffmaster')->with('success', 'Staff Deleted Successfully');
    }
}
