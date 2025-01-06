<?php

namespace App\Http\Controllers\DataKeuangan;


use App\Http\Controllers\Controller;
use App\Models\Finance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DataKeuanganController extends Controller
{

  public function index(): View
  {
    $title = 'Data Keuangan';
    $finances = Finance::all();

    return view('datakeuangan/index', compact('title', 'finances'));
  }

  public function create(): View
  {
    $title = 'Tambah Data Keuangan';
    return view('datakeuangan/form-add', compact('title'));
  }

  public function store(Request $request): RedirectResponse
  {

      $input = $request->all();

      $input['balance'] = ($request->price + $request->cash_in) - $request->cash_out;
      $input['user_id'] = auth()->id();

      Finance::create($input);

      return redirect('dashboard/data-keuangan')->with('success', 'Berhasil Input Keuangan!');
  }

  public function edit(Finance $data_keuangan): View
  {
    $title = 'Edit Data Keuangan';
    return view('datakeuangan/form-edit', compact('title', 'data_keuangan'));
  }

  public function update(Finance $data_keuangan, Request $request): RedirectResponse
  {
      $input = $request->all();

      $input['balance'] = ($request->price + $request->cash_in) - $request->cash_out;
      $input['user_id'] = auth()->id();

      $data_keuangan->update($input);

      return redirect('dashboard/data-keuangan')->with('success', 'Berhasil Update Keuangan!');
  }

  public function destroy(Finance $data_keuangan): RedirectResponse
  {
      $data_keuangan->delete();

      return redirect('dashboard/data-keuangan')->with('success', 'Berhasil Hapus Keuangan!');
  }
}
