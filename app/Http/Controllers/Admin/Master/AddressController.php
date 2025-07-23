<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return view('admin.pages.master.address.index', [
            'addresses' => District::latest()->get()
        ]);
    }

    public function store(Request $request)
    {

        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'name_bn' => ['required', 'string']
        ]);

        District::create($attributes);

        return redirect()->route('master.addresses.index')->with('success', 'Address added successfully!');
    }

     public function update(Request $request, District $address)
    {

        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'name_bn' => ['required', 'string']
        ]);

        $address->update($attributes);

        return redirect()->route('master.addresses.index')->with('success', 'Address update successfully!');
    }

    public function destroy(District $address)
    {
        $address->delete();

         return redirect()->route('master.addresses.index')->with('success', 'Address deleted successfully!');
    }
}
