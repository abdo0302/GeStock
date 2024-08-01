<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GererUsersController extends Controller
{
    public function show_all(Request $reques){
        $user = Auth::user();
        if ($user->can('gere les Users')) {
            $Users=User::paginate(10);
                 return response()->json([
                 $Users
                 ],200);
        }else{
            return response()->json([
                'error'=>'Non autorisé'
            ],500);
        }
        
    } 

    public function show(Request $reques){
        $user = Auth::user();
        if ($user->can('gere les Users')) {
            $id=$reques->id;
            $User=User::find($id);
            if($User){
                return response()->json([
                    $User
                    ],200);
            }
        }else{
            return response()->json([
                'error'=>'Non autorisé'
            ],500);
        }
    }

    public function destroy($id){
        $user = Auth::user();
        if ($user->can('gere les Users')) {
            $User = User::findOrFail($id);
            $User->delete();
            return [
                'success' => 'User deleted successfully'
            ];
        }else{
            return response()->json([
                'error'=>'Non autorisé'
            ],500);
        }
        
    }
}
