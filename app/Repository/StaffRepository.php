<?php
namespace App\Repository;

use App\Interfaces\StaffRepositoryInterface;
use App\Models\Admin;

class StaffRepository implements StaffRepositoryInterface{
    public function getAllStaffDetails(){
            return Admin::latest()->paginate(10);
    }

    public function getStaffById($AdminId){
            return Admin::findOrFail($AdminId);
    }
    

    public function CreateNewStaff(array $AdminDetails){
          return   Admin::create($AdminDetails);
//            $token = $admin->createToken('staffToken')->plainTextToken;
//            return response()->json([
//               'staff' => $admin,
//               'token' => $token
//            ], 201);
    }

    public function UpdateStaff($AdminId, array $UpdateAdminDetails){
//        echo "$AdminId"
            return Admin::whereId($AdminId)->update($UpdateAdminDetails);
    }

    public function DeleteStaff($AdminId){
        Admin::destroy($AdminId);
    }


    public function StaffPhoneNumber($phone){

        if (Admin::where('phone',$phone)->exists()){
            return Admin::where('phone',$phone)->get();
//
        }else{
            return response()->json([
                'Message' => 'Staff Phone NUmber not found',
            ]);
        }

    }

    public function ActiveStaff($status)
    {
        // TODO: Implement StaffActive() method.
        if (Admin::where('status',$status)->exists()){
            return Admin::where('status','Active')->get();
        }else{
            return response()->json([
                'message'=> 'Status NOt found'
            ]);
        }
    }

}
