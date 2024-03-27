<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use Auth;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function register(Request $request)
    {
        // Example logic for registering a user
        echo "string";exit;
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // Return a JSON response
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    /**
     * Other CRUD methods
     */
}
?>