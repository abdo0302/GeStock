<?php

namespace App\Http\Controllers;

use App\Models\Fournissur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FournissurController extends Controller
{
    public function store(Request $reques){
        $user = Auth::user();
        if ($user->can('gere les Fournisseurs')) {
            $validateDta=$reques->validate([
            'nom'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
            'address'=>'required|string',
            ]);

            $Fournissur=Fournissur::create($validateDta);
            if($Fournissur){
                return response()->json([
                'success'=>'Fournissur created successfully'
            ],200);
            }else{
                return response()->json([
                    'error'=>'Fournissur not created'
                ],500);
            }
        }else{
            return response()->json([
                'error'=>'Non autorisé'
            ],500);
        }
        
        
    }

    public function show_all(Request $reques){
        $Fournissur=Fournissur::paginate(10);
        return response()->json([
            $Fournissur
        ],200);
    } 

    public function show(Request $reques){
        $id=$reques->id;
        $Fournissur=Fournissur::find($id);
        if($Fournissur){
            return response()->json([
                $Fournissur
                ],200);
        }
    }

    public function update(Request $reques,$id){
        $user = Auth::user();
        if ($user->can('gere les Fournisseurs')) {
            $Fournissur = Fournissur::findOrFail($id);

            $validatedData = $reques->validate([
                'nom' => 'nullable|string',
                'email' => 'nullable|email',
                'phone' => 'nullable|string',
                'address' => 'nullable|string',
            ]);
            $Fournissur->update($validatedData);
            return response()->json($Fournissur);
        }else{
            return response()->json([
                'error'=>'Non autorisé'
            ],500);
        }
        
    }

    public function destroy($id){
        $user = Auth::user();
        if ($user->can('gere les Fournisseurs')) {
            $Fournissur = Fournissur::findOrFail($id);
            $Fournissur->delete();
                return [
                    'success' => 'Fournissur deleted successfully'
                   ];
        }else{
            return response()->json([
                'error'=>'Non autorisé'
            ],500);
        }
        
    }
}