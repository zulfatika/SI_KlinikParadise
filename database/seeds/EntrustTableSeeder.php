<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class EntrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->display_name = 'Admin Login';
        $role_admin->description = 'Admin';
        $role_admin->save();

        $role_user_dokter = new Role();
        $role_user_dokter->name = 'user_dokter';
        $role_user_dokter->display_name = 'User Dokter Page';
        $role_user_dokter->description = 'User Dokter';
        $role_user_dokter->save();

        $role_user_pegawai = new Role();
        $role_user_pegawai->name = 'user_pegawai';
        $role_user_pegawai->display_name = 'User Pegawai Page';
        $role_user_pegawai->description = 'User Pegawai';
        $role_user_pegawai->save();

        $edit_user = new Permission();
        $edit_user->name = 'edit-user';
        $edit_user->display_name = 'Edit Users';
        $edit_user->description = 'edit existing users';
        $edit_user->save();

        $insert_user = new Permission();
        $insert_user->name = 'insert-user';
        $insert_user->display_name = 'Insert User';
        $insert_user->description = 'insert all data users';
        $insert_user->save();

        $edit_data = new Permission();
        $edit_data->name = 'edit-all-data';
        $edit_data->display_name = 'Edit Data From All Table';
        $edit_data->description = 'edit data pasien, s';
        $edit_data->save();

        $insert_absence = new Permission();
        $insert_absence->name = 'insert-all-data';
        $insert_absence->display_name = 'Insert All Data ..';
        $insert_absence->description = 'insert data absence';
        $insert_absence->save();

        $view_data = new Permission();
        $view_data->name = 'view-data-rm';
        $view_data->display_name = 'View Data';
        $view_data->description = 'view data absence';
        $view_data->save();

        $role_admin->attachPermissions([$edit_user, $insert_user, $insert_absence, $edit_data]);
        $role_user_dokter->attachPermissions([$insert_absence]);
        $role_user_pegawai->attachPermissions([$insert_absence]);

        $user = User::create([
            'name' => "Admin",
            'username' => "admin",
            'password' => Hash::make("admin1"),
        ]);
        $user->attachRole(Role::find(1));
        $user->save();
    }
}
