<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Models\Services;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        
        $services = Services::all(); 
        return view('services.index' , [
            'services' => $services]);
    }

    public function show()
    {
        $services = Services::all(); 
        $reviews = Reviews::with('user')->get();
        return view('index', [
        'services' => $services, 'reviews' => Reviews::paginate(2)]);
    }
}