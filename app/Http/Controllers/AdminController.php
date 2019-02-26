<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\User;
use Illuminate\Http\Request;
use App\Models\Level;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        $data['levels'] = Level::all();

        return view('admin.home', $data);
    }

    public function alluser( )
    {
        $data['users'] = User::paginate(10);
        $data['lecturers'] = User::whereRole('lecturer')->paginate(10);
        $data['students'] = User::whereRole('student')->paginate(10);
        $data['admins'] = User::whereRole('admin')->paginate(10);

        return view('admin.listingAllUsers', $data);
    }

    public function createuser()
    {
        $data['levels'] = Level::all();
        return view('admin.createuser', $data);
    }
    public function viewclass()
    {
        $data['classes'] = SchoolClass::orderBy('level_id', 'desc')->paginate(4);
        return view('admin.allclasses', $data);
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
