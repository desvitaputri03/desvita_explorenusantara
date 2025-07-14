<?php

namespace App\Http\Controllers;

use App\Models\DesvitaDestination;
use Illuminate\Http\Request;

class DesvitaFrontendController extends Controller
{
    public function home()
    {
        $destinations = DesvitaDestination::take(6)->get();
        return view('desvita.frontend.home', compact('destinations'));
    }

    public function about()
    {
        return view('desvita.frontend.about');
    }

    public function contact()
    {
        return view('desvita.frontend.contact');
    }

    public function destinations()
    {
        $destinations = DesvitaDestination::paginate(12);
        return view('desvita.frontend.destinations.index', compact('destinations'));
    }

    public function showDestination(DesvitaDestination $destination)
    {
        return view('desvita.frontend.destinations.show', compact('destination'));
    }
} 