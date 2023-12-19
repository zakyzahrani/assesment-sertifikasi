<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\CarReturn;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Illuminate\Support\Facades\Auth;


class CarController extends Controller
{

    public function index_boat()
    {
        $provincies = Province::all();
        $cities = City::all();
        $districts = District::all();
        return view('index_daftar', compact('provincies','cities','districts'));
    }


    public function add_daftar(Request $request)
    {
        $user_id = Auth::id();
        $request->validate(
            [
                'name' => 'required',
                'alamat_ktp' => 'required',
                'alamat_lengkap' => 'required',
                'kecamatan' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
                'kewarganegaraan' => 'required',
                'tanggal_lahir' => 'required',
                'tempat_lahir' => 'required',
                'propinsi_lahir' => 'required',
                'kabupaten_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'status_menikah' => 'required',
                'agama' => 'required',
                'no_telp' => 'required',
                'no_hp' => 'required',
                'email_daftar' => 'required',
            ]
        );

        Pendaftaran::create([
            'name' => $request->name,
            'alamat_ktp' => $request->alamat_ktp,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'kewarganegaraan' => $request->kewarganegaraan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'propinsi_lahir' => $request->propinsi_lahir,
            'kabupaten_lahir' => $request->kabupaten_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_menikah' => $request->status_menikah,
            'agama' => $request->agama,
            'no_telp' => $request->no_telp,
            'no_hp' => $request->no_hp,
            'email_daftar' => $request->email_daftar,
            'user_id' => $user_id
        ]);
        return Redirect::route('index_boat')->with('success', 'Pendaftaran berhasil terkirim');
        
    }


    // ACC Admin
    public function dashboard_pendaftar()
    {
        $provincies = Province::all();
        $cities = City::all();
        $districts = District::all();
        $pendaftar = Pendaftaran::all();
        return view('admin.dashboard_return', compact('pendaftar'));
    }

    public function edit_pendaftar(Pendaftaran $pendaftaran)
    {
        $provincies = Province::all();
        $cities = City::all();
        $districts = District::all();
        return view('admin.dashboard_edit_return', compact('pendaftaran','provincies','cities','districts'));
    }
    public function update_pendaftar(Pendaftaran $pendaftaran, Request $request)
    {

        $request->validate([ 
            
            'status_daftar' => 'required',
        ]);
        

        $dataToUpdate = [
            
            'status_daftar'=> $request->status_daftar,
        ];
        
        $pendaftaran->update($dataToUpdate);
        return Redirect::route('dashboard_pendaftar')->with('success', 'Pendaftaran berhasil di Approve');
    }

    //end acc admin

    public function dashboard_home()
    {        
        return view('admin.dashboard_home');
    }

//show history pengajuan
    public function show_history_pendaftaran()
    {
        $user_id = Auth::id();
        $pendaftar = Pendaftaran::whereHas('User', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        return view('show_order', compact('pendaftar'));
    }

    public function delete_pendaftar(Pendaftaran $pendaftar)
    {
        $pendaftar->delete();
        return Redirect::back()->with('success', 'Pendaftaran berhasil dihapus');
    }

    public function show_edit(Pendaftaran $pendaftaran)
    {
        $provincies = Province::all();
        $cities = City::all();
        $districts = District::all();
        return view('show_edit', compact('pendaftaran','provincies','cities','districts'));
    }
    public function update_pendaftar_user(Pendaftaran $pendaftaran, Request $request)
    {

        $request->validate([ 
            'name' => 'required',
            'alamat_ktp' => 'required',
            'alamat_lengkap' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kewarganegaraan' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'propinsi_lahir' => 'required',
            'kabupaten_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'status_menikah' => 'required',
            'agama' => 'required',
            'no_telp' => 'required',
            'no_hp' => 'required',
            'email_daftar' => 'required',
            
        ]);
        

        $dataToUpdate = [
            'name' => $request->name,
            'alamat_ktp' => $request->alamat_ktp,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'kewarganegaraan' => $request->kewarganegaraan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'propinsi_lahir' => $request->propinsi_lahir,
            'kabupaten_lahir' => $request->kabupaten_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_menikah' => $request->status_menikah,
            'agama' => $request->agama,
            'no_telp' => $request->no_telp,
            'no_hp' => $request->no_hp,
            'email_daftar' => $request->email_daftar,
            
        ];
        
        $pendaftaran->update($dataToUpdate);
        return Redirect::route('show_history_pendaftaran')->with('success', 'pendaftaran berhasil diupdate');
    }
}
