<?php

namespace App\Http\Controllers;

use Auth;
use Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Materi;
use App\User;
use App\School;
use App\Soal;
use App\Kelas;
use DB;

class LatihanController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Halaman daftar latihan siswa
   * Menampilkan materi yang status='Y' dan
   * paket soal latihan (jenis=2) yang tersedia untuk kelas siswa
   */
  public function index()
  {
    $user   = User::where('id', Auth::user()->id)->first();
    $school = School::first();
    $id_kelas_siswa = Auth::user()->id_kelas;

    // Ambil materi yang aktif (status Y) dan sesuai kelas siswa atau semua kelas
    $materis = Materi::where('status', 'Y')
                ->where(function($q) use ($id_kelas_siswa) {
                  $q->whereNull('id_kelas')
                    ->orWhere('id_kelas', '')
                    ->orWhere('id_kelas', 0)
                    ->orWhere('id_kelas', $id_kelas_siswa);
                })
                ->orderBy('id', 'DESC')
                ->paginate(8);

    // Ambil paket soal latihan (jenis=2) yang tersedia
    $soal_latihans = DB::table('soals')
                      ->select('soals.*', 'users.nama as nama_guru', 'materis.judul as judul_materi')
                      ->join('users', 'soals.id_user', '=', 'users.id')
                      ->leftJoin('materis', 'soals.materi', '=', 'materis.id')
                      ->where('soals.jenis', 2)
                      ->orderBy('soals.id', 'DESC')
                      ->get();

    return view('siswa.latihan.index',
      compact('materis', 'user', 'school', 'soal_latihans'));
  }

  /**
   * Detail materi + soal latihan terkait
   */
  public function detail($id, $judul)
  {
    $user   = User::where('id', Auth::user()->id)->first();
    $school = School::first();

    $materi = Materi::join('users', 'materis.id_user', '=', 'users.id')
              ->select('users.nama as nama_user', 'users.gambar as gambar_user',
                       'users.status as jenis_user', 'materis.*')
              ->where('materis.status', 'Y')
              ->where('materis.id', $id)
              ->first();

    if ($materi) {
      // Ambil paket soal latihan yang terhubung ke materi ini
      $soal_latihans = Soal::where('jenis', 2)
                        ->where('materi', $materi->id)
                        ->get();
    } else {
      $soal_latihans = collect();
    }

    return view('siswa.latihan.detail',
      compact('user', 'school', 'materi', 'soal_latihans'));
  }

  /**
   * Halaman kerjakan soal latihan
   */
  public function kerjakan($id_soal)
  {
    $user   = User::where('id', Auth::user()->id)->first();
    $school = School::first();
    $soal   = Soal::find($id_soal);

    if (!$soal || $soal->jenis != 2) {
      return redirect('/latihan')->with('error', 'Paket soal tidak ditemukan.');
    }

    // Ambil detailsoals untuk soal latihan ini
    $detailsoals = DB::table('detailsoals')
                    ->where('id_soal', $id_soal)
                    ->where('status', 'Y')
                    ->get();

    return view('siswa.latihan.kerjakan',
      compact('user', 'school', 'soal', 'detailsoals'));
  }
}
