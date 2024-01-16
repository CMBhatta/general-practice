<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('email', 'name')->where('status', 1)->get();
         if(count($users)>0){
        //   user exits
        $response = [
            'message' => count($users) . 'users found',
            'status' => 1,
            'data' => $users,
        ];  
        return response()->json($response, 200);
         } else{
            //user doesnot exit
            $response = [
                'message' => count($users) . 'users not found',
                'status' => 0,
            ];
            return response()->json($response, 500);
         };
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
       'name' => ['required'],
       'email' => ['required', 'unique:users,email'],
       'password' =>['required', 'min:8','confirmed'],
       'password_confirmation' =>['required'],
      ]);
      if($validator->fails()){
        return response()->json($validator->messages(), 400);
      }else{
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
      
        DB::beginTransaction();
        try {
           $user = User::create($data);
            DB::commit();
        } catch (Exception $e) {
            p($e->getMessage());
            $user = null;
        }
        if($user != null){
            return response()->json([
                'message' => 'User Registered successfully'
            ], 200);
        } else{
            return response()->json([
                'message' => 'Internal Server Error'
            ], 500);
        }
      }
    //   p($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            $response = [
            'message' => 'User not found',
            'status' => 0,
            ];
        } else{
          $response =[
          'message' => 'User Found',
          'status' => 1,
          'data' => $user
          ];
        }
        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
