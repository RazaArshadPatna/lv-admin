<?php
namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $webinfo = User::all();

        return view('index', compact('sliders', 'webinfo'));
    }
}