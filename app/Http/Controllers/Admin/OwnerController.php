<?php

namespace App\Http\Controllers\Admin;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    public function edit(Owner $owner)
    {
        return view('admin.owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name'      => [ 'required', 'min:3', 'max:25' ],
            'last_name' => [ 'required', 'min:3', 'max:25' ],
            'last_name_second' => [ 'nullable', 'min:3', 'max:255' ],
            'phone_number' => [ 'required', 'min:10', 'max:17' ],
            'email'     => [ 'nullable', 'email', 'max:255' ],
        ]);

        $owner->update($request->only(
            'name',
            'last_name',
            'last_name_second',
            'phone_number',
            'email',
        ));

        return redirect()->route('admin.properties.index')
            ->with('success', 'Actualizado correctamente');
    }
}
