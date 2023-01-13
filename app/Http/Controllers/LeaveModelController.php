<?php

namespace App\Http\Controllers;

use App\Mail\NewEmployeeFrom;
use App\Models\LeaveModel;
use App\Models\leaveType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LeaveModelController extends Controller
{

    public function LeaveNotices()
    {
        $data["list"] = LeaveModel::join('users', 'users.id', '=', 'leave_models.employee_id')->select("leave_models.id", "users.name", "approved", "approved_by", "days")->get();
        return view('adminView.LeaveList', $data);
    }

    public function LeaveTypes()
    {
        $data["list"] = leaveType::select('id', 'type', 'days')->get();
        return view('adminView.LeaveTypeList', $data);
    }
    public function CRLeaveType(Request $request, leaveType $type)
    {
        if ($request->has('remove')) {
            User::where('type', $type->id)->update(['type' => null]);
            $type->delete();
        } else if ($request->has('days')) {
            leaveType::create([
                'type' => $request->type,
                'days' => $request->days,
            ]);
        }

        return redirect()->back();
    }
    public function updateleave(Request $request, LeaveModel $leave)
    {
        $leave->approved_by = Auth::id();

        if ($request->has('reject')) {
            $leave->approved = "REJECT";
        } elseif ($request->has('approve')) {
            $leave->approved = "APPROVE";
        }
        $leave->save();
        return redirect()->back();
    }
    public function leaveDetails()
    {

        $data['leaveList'] = LeaveModel::where('employee_id', Auth::id())->leftJoin('admin', 'leave_models.approved_by', '=', 'admin.id')->select('leave_models.id', 'days', 'approved', 'admin.name')->get();
        $data['total_days'] = leaveType::where('id', Auth::user()->type)->first()->days;
        $data['remaining_days'] = $data['total_days'] - $data['leaveList']->sum('days');;

        return view('employeeView.leaveDetails', $data);
    }
    public function ApplyLeave(Request $request)
    {
        $leave = new LeaveModel;
        $leave->employee_id = Auth::id();
        if ($request->has('days')) {
            $leave->days = $request->days;
        }
        $leave->save();

        return redirect()->back();
    }

    public function EmployeeList()
    {
        $data["list"] = User::leftJoin('leave_types', 'leave_types.id', '=', 'users.type')->select('users.id as id', 'name', 'email', 'leave_types.type')->get();
        $data['typeList'] = leaveType::select('id', 'type')->get();
        return view('adminView.EmployeeList', $data);
    }
    public function CRUDEmp(Request $request, User $emp)
    {
        // dd($emp);
        if ($request->has('remove')) {
            LeaveModel::where('employee_id', $emp->id)->delete();
            $emp->delete();
        } elseif ($request->has('changeType')) {
            if ($request->EmployeeType == 'null') {
                $emp->type = null;
            } else {

                $emp->type = $request->EmployeeType;
            }
            $emp->save();
        }

        return redirect()->back();
    }
    public function storeEmployee(Request $request)
    {
        User::factory(1)->create();

        Mail::to($request->email)->send(new NewEmployeeFrom);
        return redirect()->back();
    }
}
