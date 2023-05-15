<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visites = Visit::all(); 
        return view('services.information', [
            'visites' => Visit::paginate(2)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingVisit = Visit::where('user_id', Auth::id())
                           ->where('id_uslugi', $request->input('id'))
                           ->where('data', $request->input('start'))
                           ->first();

        if($existingVisit) {
            return redirect()->route('services.show')->with('error', 'Ta data jest już zajęta. Wybierz inną datę.');
        }

        $user_id = Auth::id();
        $visits = new Visit;
        $visits->data = $request->input('start');
        $visits->user_id = $user_id;
        $visits->id_uslugi = $request->input('id');
        $visits->save();
        return redirect()->route('services.show')->with('success', 'Wizyta została umówiona!');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $wizyty = Visit::where('user_id', $user->id)->with('service')->get();
        return view('services.user-notification', compact('wizyty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $visit = Visit::findOrFail($id);
        $visit->accept = 1;
        $visit->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $visit = Visit::findOrFail($id);

        if ($request->input('status')) {
            $visit->status = 1;
        } 
       else {
            $visit->status = 0;
        }

        $visit->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
