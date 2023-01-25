<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\StaffRequest;
use App\Http\Requests\Staff\updateRequest;
use App\Models\Admin;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\StaffRepositoryInterface;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private StaffRepositoryInterface $staffRepository;

    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function index()
    {
//        $staff= DB::table('admins')->where('type','Staff')->latest()->paginate(8);
//        return view('cms.staff.index',compact('staff'));
        $staff =   $this->staffRepository->getAllStaffDetails();
        return view('cms.staff.index',compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {

//        Admin::create($request->validated() + [
//            'type' => 'Staff',
//            ]);
        $AdminDetails = $request->only([
            'name','phone','status','type', 'address','age'
          ]);

        $this->staffRepository->CreateNewStaff($AdminDetails);
        flash('Staff Added successfully');
        return redirect()->route('cms.staff.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff=Admin::findOrFail($id);
        return view('cms.staff.edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( updateRequest $updateRequest, $id)
    {
//        $staff=Admin::findOrFail($id);
//        $staff->update($request->validated());
//         $AdminId= $request->$id;
//        return $id;
        $UpdateAdminDetails = $updateRequest->only([
            'name','phone','address','status','age'
        ]);

        $this->staffRepository->UpdateStaff($id, $UpdateAdminDetails );
        flash('staff updated successfully');
        return redirect()->route('cms.staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
//        $staff=Admin::findOrFail($id);
//        $AdminId = $request->$id;
//        return $id;

        $this->staffRepository->DeleteStaff($id);
        flash('staff deleted successfully');
        return redirect()->route('cms.staff.index');
    }
}
