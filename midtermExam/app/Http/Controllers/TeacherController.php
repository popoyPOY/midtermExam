<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{   
    public $timestamp = false;
    private $request;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function showTeachers() {
        return response()->json(User::all());
    }  

    public function createTeacher(Request $request) {
        $rules = [
            'lastname' => 'required | max:50',
            'firstname' => 'required | max:50',
            'middlename' => 'required | max:50'
        ];

        $this->validate($request, $rules);

        $user = User::create($request->all());

        return response()->json($user, 201);
    }


    public function searchTeacher($id) {
        $user = User::findOrFail($id);

        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json("No user Found", 404);
        }
    }

    public function deleteTeacher($id) {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();

            return response()->json($user, 200);
        } else {
            return response()->json("User Not Found", 404);
        }
    }

    public function updateTeacher(Request $request, $id) {

        $rules = [
            'lastname' => 'required | max:50',
            'firstname' => 'required | max:50',
            'middlename' => 'required | max:50'
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($id);

        $user->fill($request->all());

        if ($user->isClean()) {
            return response()->json("At least one value must
            change", 403);
        } else {
            $user->save();
            return response()->json($user, 200);
        }
    }
    //
}
