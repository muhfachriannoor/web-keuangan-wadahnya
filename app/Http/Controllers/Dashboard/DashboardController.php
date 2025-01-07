<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\User;

class DashboardController extends Controller
{

  public function index()
  {
    $title = 'Dashboard Web Keuangan Wadahnya';

    $countDataKeuangan = Finance::count();
    $countDataAkun = User::count();

    return view('dashboard/index', compact('title', 'countDataKeuangan', 'countDataAkun'));
  }
}
