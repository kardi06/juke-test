<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class DashboardProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $profil = Profile::all();
        return view('dashboard_profile.main', compact(['profil']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard_profile.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => ['required','unique:'.Profile::class],
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
        ];

        $validated = $request->validate($rules);

        $profil = new Profile([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'username' => $request->get('username'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'zip_code' => $request->get('zip_code'),
            'address' => $request->get('address'),
        ]);
        $profil->save();
        return redirect('/dashboard-profile')->with(['simpan' => 'update']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $profil = Profile::find($id);
        return view('dashboard_profile.form_edit', compact(['profil']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => ['required', 'unique:profiles,username,' . $id],
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
        ];

        $validated = $request->validate($rules);

        $profil=Profile::find($id);
        $profil->first_name = $request->get('first_name');
        $profil->last_name = $request->get('last_name');
        $profil->username = $request->get('username');
        $profil->city = $request->get('city');
        $profil->state = $request->get('state');
        $profil->zip_code = $request->get('zip_code');
        $profil->address = $request->get('address');
        

        $profil->save();
        return redirect('/dashboard-profile')->with(['update'=>'update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $profile = Profile::find($id);
        $profile->delete();

        return redirect('/dashboard-profile');
    }
}
