<?php
namespace App\Interfaces;

interface StaffRepositoryInterface{
    public function getAllStaffDetails();
    public function getStaffById($AdminId);
    public function CreateNewStaff(array $AdminDetails);
    public function UpdateStaff($AdminId, array $UpdateAdminDetails);
    public function DeleteStaff($AdminId);
    public function StaffPhoneNumber($phone);
    public function ActiveStaff($status);
}
