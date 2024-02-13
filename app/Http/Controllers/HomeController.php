<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Url;


class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'urls' => Url::with('user')->latest()->get(),
        ]);
    }
}