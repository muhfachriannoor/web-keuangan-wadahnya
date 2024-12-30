<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

  public function index()
  {
    $title = 'Dashboard Web Keuangan Wadahnya';
    return view('dashboard/index', compact('title'));
  }
}
