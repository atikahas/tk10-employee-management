<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use App\Models\LeaveEntitlement;

class LeaveEntitlementController extends Controller
{

    public function index(){
        $users = User::all();

        return view('leave.entitlement.index', compact('users'));
    }

    public function view(User $user){
        $le = LeaveEntitlement::where('user_id', $user->id)->get();
        $currentYear = now()->year;
        $currentYearRecord = LeaveEntitlement::where('user_id', $user->id)
                                            ->whereYear('created_at', $currentYear)
                                            ->exists();

        return view('leave.entitlement.view', compact('user', 'le', 'currentYearRecord'));
    }

    public function create(User $user){
        return view('leave.entitlement.create', compact('user'));
    }

    public function store(Request $request){
        try{
            $data = $request->all();
            $data['created_by'] = Auth::user()->id;
            $le = LeaveEntitlement::create($data);

            return redirect('leave-entitlement/view/'.$request->user_id)->with('success', 'New Leave Entitle Added.');
        } catch(\Exception $e) {
            dd($e);
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit(LeaveEntitlement $le){
        $user = User::where('id', $le->user_id)->first();

        return view('leave.entitlement.edit', compact('le', 'user'));
    }

    public function update(Request $request, LeaveEntitlement $le) {
        try {
            $data = $request->except(['_token']);
            $data = array_filter($request->all());
            $data['updated_by'] = Auth::user()->id;
            $le->update($data);
            
            return back()->with('success', 'Leaves Updated.');
        } catch(\Exception $e) {
            dd($e);
            return back()->with('error', $e->getMessage())->withInput();
        }
    }
    
}
