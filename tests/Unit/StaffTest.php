<?php

use App\Enums\Gender;
use App\Models\Staff;

class StaffTest extends \Tests\TestCase
{
    public function testReadRecordsTest() {
        $staffs = Staff::all();
        $this->assertCount(2, $staffs);
    }

    public function testCreateRecordTest() {
        $staff = new Staff;
        $staff->first_name = "Simple2";
        $staff->last_name = "C2";
        $staff->gender = Gender::MALE;
        $staff->address_line_one = "PP";
        $staff->address_line_two = "PV";
        $success = $staff->save();
        $this->assertTrue($success);
    }

    public function testUpdateRecordTest() {
        $staff = Staff::firstWhere('first_name', '=', 'Simple2');
        $staff->address->lineOne = "PP2";
        $staff->address->lineTwo = "PV2";
        $success = $staff->save();
        $this->assertTrue($success);
    }

    public function testDeleteRecordTest() {
        $staff = Staff::firstWhere('first_name', '=', 'Simple2');
        $id = $staff->delete();
        $this->assertNotEmpty($id);
    }
}
