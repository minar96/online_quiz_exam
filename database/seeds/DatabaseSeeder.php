<?php

use Illuminate\Database\Seeder;
use App\User;
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
    	$admin = User::where('email', 'admin@example.com')
    	->first();
    	if (is_null($admin)) {
    		$admin = new User();
	        $admin->name = "admin";
	        $admin->email = "admin@example.com";
	        $admin->password = Hash::make('12345678');
	        $admin->email_verified_at = NOW();
	        $admin->occupation = "president";
	        $admin->address = "dhaka";
	        $admin->phone = "01780540839";
	        $admin->is_admin = 1;
	        $admin->save();	
    	}
        // $this->call(UsersTableSeeder::class);
    }
}
