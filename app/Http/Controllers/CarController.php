<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'user') {
            $cars = Cars::where('user_id', $user->id)->get();
            return view('cars.index', compact('cars'));
        } elseif ($user->role === 'admin') {
            $cars = Cars::with('user')->get();
            return view('cars.index', compact('cars'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $cars = new Cars($request->all());
        $cars->user_id = $userId;
        $cars->save();
        return redirect(route('cars.index'));
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
    public function edit(Cars $cars)
    {
        return view('cars.edit', [
            'cars' => $cars ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cars $cars)
    {
        $cars->fill($request->all());
        $cars->save();
        return redirect(route('cars.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cars::findOrFail($id)->delete();
        return redirect()->back();
    }
}
