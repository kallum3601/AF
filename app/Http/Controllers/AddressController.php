<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function saveAddresses(Request $request, $username) {
        $addresses = $request->input('addresses');
    
        foreach ($addresses as $address) {
            Address::create([
                'username' => $username,
                'address' => $address
            ]);
        }
    
        return redirect()->back()->with('success', 'Addresses added successfully.');
    }
    
}
