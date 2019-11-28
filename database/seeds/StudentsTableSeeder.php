<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Student;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = Role::where('name', 'user')->first();

      foreach ($role_user->users as $user){

        $student = new Student();

        $student->address = $this->random_str(3, '0123456789') . " Main Street";
        $student->phone = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
        $student->user_id = $user->id;
        $student->save();

        }
    }
    private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1; for ($i = 0; $i < $length; ++$i) {
    $pieces []= $keyspace[random_int(0, $max)]; }
    return implode('', $pieces); }
}
