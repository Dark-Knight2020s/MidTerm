<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients =Client::orderBy('name', 'asc')->get();
        return view('Clients.index',compact('clients'));
    } 

    public function create()
    {
        return view('Clients.add_edit');
    }

    public function store(Request $request)
    {   

        $request->validate([
            'user_name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255',
            'user_email' => 'required|email:rfc,dns|unique:App\Client,email',
            'user_phone'=> 'required|integer|regex:/^\d{10}$/',
        ]);
        
        $client = new Client;
        $client->name = $request->user_name;
        $client->email = $request->user_email;
        $client->phone = $request->user_phone;
        $client->save();
        return redirect('add')->with('status', 'User added Successfuly ^-^'); 
    }

    public function show(Client $client_edit) //Client $user it works like Client::(wildcard);
    {
        // return $client_edit;
        // $client_edit =Client::findOrFail($id);

        return view('Clients.add_edit',compact('client_edit'));
    } 

    public function destroy (Client $client_delete)
    {   
        $client_delete->delete();
        return redirect('index');
    }

    public function update(Request $request,Client $client_update)
    { 
        $request->validate([
            'user_name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255',
            'user_email' => 'required|email:rfc,dns|unique:App\Client,email,'.$client_update->id,
            'user_phone'=> 'required|integer|regex:/^\d{10}$/',
        ]);
        
        // $client =Client::findOrFail($id);
        $client_update->name = $request->user_name;
        $client_update->email = $request->user_email;
        $client_update->phone = $request->user_phone;
        $client_update->save();
        return redirect('index')->with('status', 'User Updated Successfuly ^-^'); ; 
    }

}
