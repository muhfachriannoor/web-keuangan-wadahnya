<?php

namespace App\Http\Controllers\DataKeuangan;


use App\Http\Controllers\Controller;

class DataKeuanganController extends Controller
{

  public function index()
  {
    $title = 'Data Keuangan';
    return view('datakeuangan/index', compact('title'));
  }

  public function create()
  {
    $title = 'Tambah Data Keuangan';
    return view('datakeuangan/form-add', compact('title'));
  }
}
