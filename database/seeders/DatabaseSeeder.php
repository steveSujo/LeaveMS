<?php

namespace Database\Seeders;

use App\Models\Employees;
use App\Models\LeaveModel;
use App\Models\leaveType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        $emp = new User;

        $emp->name = "tim";
        $emp->email = "tim@abc.com";
        $emp->password = Hash::make("employee");
        $emp->save();

        DB::table('admin')->insert([

            'name' => 'tim',
            'email' => 'admin@tim.com',
            'password' => Hash::make('admin'),
        ]);

        Employees::factory(10)->create();

        leaveType::create(
            [
                'type' => 'Work from Home',
                'days' => 7
            ]
        );
        leaveType::create([
            'type' => 'part-time',
            'days' => 15
        ]);
        leaveType::create([
            'type' => 'Full-time',
            'days' => 24
        ]);
        LeaveModel::factory(10)->create();
        LeaveModel::create(
            [
                'employee_id' => $emp->id,
                'days' => 7,
                'type_id' => 1,
                'approved' => 0,
                'approved_by' => null,
            ]
        );
        $emp->save();
    }
}
