<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class userController extends Controller
{
    // Create Post Method for User Registration

    public function addUser(Request $request): JsonResponse
    {
        try {
            $user = new User();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->social = $request->input('social');
            $user->address = $request->input('address');
            $user->last_login = now();
            $user->is_admin = 0;
            $user->save();
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['success' => 'User Created Successfully']);

    }

    // Create Get Method for User Login

    public function getAllUsers(): JsonResponse
    {
        try {
            $users = User::all();
            if (count($users) > 0) {
                return response()->json(['200' => 'OK', 'users' => $users]);
            }
            return response()->json(['404' => 'No users were found']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    //Get User By Id
    public function getUserById($id): JsonResponse
    {
        try {
            $user = User::find($id);
            if ($user) {
                return response()->json(['200' => 'OK', 'user' => $user]);
            }
            return response()->json(['404' => 'No user was found']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    //Create Update Method for User Update

    public function updateUser(Request $request, $id): JsonResponse
    {
        // Validate the request data before updating the user record
        try {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name'  => 'required',
                'email'      => 'required',
                'password'   => 'required',
                'social'     => 'required',
                'address'    => 'required',

            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        try
        {
            // Update the user record
            $user = User::find($id);
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password= $request->input('password');
            $user->social = $request->input('social');
            $user->address = $request->input('address');
            $user->is_admin = $request->input('is_admin');
            $user->save();

        }
        catch (Exception $e)
        {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['success' => 'User Updated Successfully']);
    }

    //Create Delete Method for User Delete

    public function deleteUser($id): JsonResponse
    {
        try {
            $user = User::find($id);
            if ($user) {
                $user->delete();
                return response()->json(['200' => 'OK', 'message' => 'User Deleted Successfully']);
            }
            return response()->json(['404' => 'No user was found']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
