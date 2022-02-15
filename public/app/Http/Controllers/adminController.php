<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;


class adminController extends Controller
{
    public function adminPage()
    {
        $Users = User::all();




        return view('adminPage', compact('Users'));
    }

    public function groupsPage(){
        $groups = Role::all();



        return view('groups', compact('groups'));
    }

    public function addAdmin($id){

        $u = User::find($id);
        if ($u != null) {
            $u->addRole('admin');
        }
        else{
             return response('User does not exist', 200);
        }

        return view('dashboard')->with('info', 'User admin gemaakt.');
    }

    public function removeAdmin($id){



        $u = User::find($id);



        if ($u != null) {
            $u->revokeRole('admin');
        }





        return view('dashboard');
    }

    public function removeRoleFromUser($role, $id){



        $u = User::find($id);



        if ($u != null) {
            $u->revokeRole("$role");
        }





        return view('dashboard');
    }

    public function newGroup() {

        return view('newGroup');

    }

    public function addingNewGroup(Request $request) {
        $roleName = $request->input('groupName');

        $role = Role::create(['name' => $roleName]);

        return view('dashboard');
    }

    public function createRole($roleName){

        $role = Role::create(['name' => $roleName]);

        return view('dashboard');

    }

    public function removeRole($roleName){
        $user = Roles::where('name', $roleName);

        $user->delete();
        return view('dashboard');
    }

    public function newUser($roleName) {
        $userId = Auth::id();




        return view('invitePage', compact('roleName', 'userId'));
    }

    public function addingRoleToNewUser($roleName, $id){



        $u = User::find($id);



        if ($u != null) {
            $u->addRole($roleName);
        }
        else{
            return response('User does not exist', 200);
        }

        return view('dashboard')->with('info', 'User admin gemaakt.');
    }

}
