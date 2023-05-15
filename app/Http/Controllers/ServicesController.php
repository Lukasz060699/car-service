<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        
        $services = Services::all(); 
        return view('panelServices.services', [
            'services' => Services::paginate(2)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panelServices.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $services = new Services($request->all());
        $services->zdjecie = $request->file('zdjecie')->store('services');
        $services->save();
        return redirect(route('services.index'));
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
    public function edit(Services $services)
    {
        return view('panelServices.edit', [
            'services' => $services ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * 
     */
    public function update(Request $request, Services $services)
    {
        $services->fill($request->all());
        if($request->hasFile('zdjecie')){
            $services->zdjecie = $request->file('zdjecie')->store('services');
        }
        $services->save();
        return redirect(route('services.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Services::findOrFail($id)->delete();
        return redirect()->route('services.index');
    }
}
