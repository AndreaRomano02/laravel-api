<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $projects = Project::orderBy('created_at', 'DESC')->limit(5)->get();
    return view('guest.home', compact('projects'));
  }
}
