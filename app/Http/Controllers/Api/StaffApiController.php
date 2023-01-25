<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
//use App\Http\Requests\Staff\StaffRequest;
use App\Http\Requests\Staff\StaffRequest;
use App\Http\Requests\Staff\updateRequest;
use App\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Interfaces\StaffRepositoryInterface;

class StaffApiController extends Controller
{

    private StaffRepositoryInterface $staffRepository;

    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

//    public function staff_data($id=null){
//        if ($id){
//            if (Admin::where('id',$id)->exists()){
//                return  Admin::find($id);
//            }else{
//                return response()->json([
//                    'Message' => 'Staff Id not Found',
//                ]);
//            }
//        }else{
//            return Admin::all();
//        }
//    }

    public function staff_data() : JsonResponse{
            return response()->json([
                'data' => $this->staffRepository->getAllStaffDetails()
            ]);

    }

    public function addStaff(StaffRequest $request) :jsonResponse
    {

        $AdminDetails = $request->only([
            'name','email','password','phone','status','age','type','address'
        ]);

        $data=$this->staffRepository->CreateNewStaff($AdminDetails);
        $token = $data->createToken('staffToken')->plainTextToken;
        return response()->json([
            'Message' => 'Staff Created Successfully',
            'data' => $data,
            'token' => $token,
        ], 201);



//        $staff = new Admin;
////        $staff= Admin::all();
//        $staff->name = $request->name;
//        $staff->email = $request->email;
//        $staff->password = $request->password;
//        $staff->address = $request->address;
//        $staff->phone = $request->phone;
//        $staff->status = $request->status;
//        $staff->age = $request->age;
//        $staff->type =$request->type;
//        $staffs= $staff->save();
//        if ($staffs){
//            return response()->json([
//                'Message' => 'Staff Created Successfully',
//            ],201);
//        }else{
//            return response()->json([
//                'Message' => 'Staff not Saved',
//            ],401);
//        }

    }


    public function updateStaff(updateRequest $request, $id) :JsonResponse{
//        $staff = Admin::find($request->id);
//        $staff->name = $request->name;
//        $staff->address = $request->address;
//        $staff->phone = $request->phone;
//        $staff->status = $request->status;
//        $staff->age = $request->age;
//        $staff->type = $request->type;
//        $staffs = $staff->save();
//        if ($staffs){
//            return response()->json([
//                'Staff Updated successfully',
//            ], 201);
//        }else{
//            return response()->json([
//                'Staff does not updated',
//            ], 201);
//        }

        $UpdateAdminDetails =  $request->only([
            'name','phone','address','status','age','type'
        ]);

        $this->staffRepository->UpdateStaff($id, $UpdateAdminDetails);

        return response()->json([
            'message' => 'Staff Update Successfully',
        ], 202);
    }

    Public function deleteStaff($id){
//        $staff = Admin::find($id);
//        if (Admin::where('id',$id)->exists()){
//            $staff->delete();
//            return response()->json([
//                'Message' => 'Staff Deleted Successfully',
//            ]);
//        }else{
//            return response()->json([
//                'Message' => 'Staff ID does not found'
//            ]);
//        }
        $data=$this->staffRepository->DeleteStaff($id);
        return response()->json([
            'Message' => 'Data Deleted Successfully',
        ], 404);
    }


    public function staffSku($name){
        if (Admin::where('name',$name)->exists()){
            return Admin::where('name',$name)->get();
        }else{
            return response()->json([
                'Message' => 'Staff Name Not found',
            ], 404);
        }
    }


    public function staffPhone($phone): JsonResponse{

        return response()->json([
            $this->staffRepository->StaffPhoneNumber($phone),
        ]);
//        if (Admin::where('phone',$phone)->exists()){
//            return Admin::where('phone',$phone)->get();
////            return "hello";
//        }else{
//            return response()->json([
//                'Message' => 'Staff Phone NUmber not found',
//            ]);
//        }
    }

    public function ActiveStaff($status){
        return response()->json([
            $this->staffRepository->ActiveStaff($status),
        ]);
    }
}
