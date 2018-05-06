<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Config;
class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome')->with(['title' => config('app.name')]);
    }
}