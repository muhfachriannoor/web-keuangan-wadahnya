<?php

namespace App\Http\Controllers\DataAkun;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class DataAkunController extends Controller
{

  public function index(): View
  {
    $title = 'Data Akun';
    $users = User::all();

    return view('dataakun/index', compact('title', 'users'));
  }

  public function create(): View
  {
    $title = 'Tambah Data Akun';
    return view('dataakun/form-add', compact('title'));
  }

  public function store(Request $request): RedirectResponse
  {
    $request->validate([
        'nama'              => 'required|min:4',
        'email'             => 'required|unique:users|min:4',
        'password'          => 'required|same:konfirm_password|min:4',
        'konfirm_password'  => 'required|min:4',
    ]);

    $nama       = $request->input('nama');
    $email      = $request->input('email');
    $password   = $request->input('password');

    $insert = User::create([
        'name'  => $nama,
        'email'  => $email,
        'password'  => bcrypt($password)
    ]);

    if ($insert == TRUE) {
        return redirect('dashboard/data-akun')->with('success', 'Berhasil Menambahkan Akun Baru!');
    } else {
        return redirect('dashboard/data-akun')->with('error', 'Gagal Menambahkan Akun Baru!');
    }
  }

  public function edit(User $data_akun): View
  {
    $title = 'Ubah Data Akun';
    return view('dataakun/form-edit', compact('title', 'data_akun'));
  }

  public function update(User $data_akun, Request $request): RedirectResponse
  {
    $request->validate([
        'nama' => 'required|min:4',
        'email' => 'required|min:4', Rule::unique('users')->ignore($data_akun->id),
    ]);
  
    $nama       = $request->input('nama');
    $email      = $request->input('email');
    $password   = $request->input('password');

    if ($password != "") {
        $request->validate([
            'password'          => 'same:konfirm_password|min:4',
            'konfirm_password'  => 'min:4',
        ]);
        $passwordnya = bcrypt($password);
    } else {
        $passwordnya = $data_akun->password;
    }

    $update = User::where('id', $data_akun->id)->update([
        'name'  => $nama,
        'email'  => $email,
        'password'  => $passwordnya
    ]);

    if ($update == TRUE) {
        return redirect('dashboard/data-akun')->with('success', 'Berhasil Mengubah Data!');
    } else {
        return redirect('dashboard/data-akun')->with('error', 'Gagal Mengubah Data!');
    }
  }

  public function destroy(User $data_akun): RedirectResponse
  {
      $data_akun->delete();

      return redirect('dashboard/data-akun')->with('success', 'Berhasil Hapus Akun!');
  }
}
