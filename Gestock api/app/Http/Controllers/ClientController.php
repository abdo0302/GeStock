<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function store(Request $reques){
        $user = Auth::user();

            $validateDta=$reques->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
            'address'=>'required|string',
            ]);

            $client=client::create($validateDta);
            if($client){
                return response()->json([
                'success'=>'client created successfully'
            ],200);
            }
    }

    public function show_all(Request $reques){
        $clients=client::get();
        return response()->json([
            $clients
        ],200);
    } 

    public function show(Request $reques){
        $id=$reques->id;
        $client=client::find($id);
        if($client){
            return response()->json([
                $client
                ],200);
        }
    }

    public function update(Request $reques,$id){
        $user = Auth::user();
            $client = client::findOrFail($id);
            $validatedData = $reques->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            ]);
            $client->update($validatedData);
            return response()->json($client);
    }

    public function destroy($id){
        $user = Auth::user();
            $client = client::findOrFail($id);
            $client->delete();
            return [
                'success' => 'client deleted successfully'
            ];
    }
   
}
