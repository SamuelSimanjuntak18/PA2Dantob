<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Objek_Wisata;
use App\Models\Kategori_Wisata;
use App\Models\Kabupaten;

use Illuminate\Http\Request;

class objekWisataController extends Controller
{
    public function indexAction()
    {
        $objwisatakabupaten = DB::table('objwisatakabupaten')->get();
        return view('user-page.objek-wisata', ['objwisatakabupaten' => $objwisatakabupaten]);
    }

    public function kelolaindexAction()
    {


        $objekwisata = DB::table('objek_wisata')
            ->select('objek_wisata.*', 'objwisatakabupaten.nama_kab', 'kategori_wisata.nama_kategori')
            ->join('objwisatakabupaten', 'objwisatakabupaten.id_obj_wisata_kabupaten', '=', 'objek_wisata.id_obj_wisata_kabupaten')
            ->join('kategori_wisata', 'kategori_wisata.id_kategori', '=', 'objek_wisata.id_kat_wisata')
            ->get();
        return view('admin.kelolaobjekwisata', compact('objekwisata'));
    }

    public function indexAction2($id_obj_wisata_kabupaten)
    {
        $objwisatakabupaten = DB::table('objwisatakabupaten')->get();
        $objek_wisata = DB::table('objek_wisata')
            ->where('id_obj_wisata_kabupaten', '=', $id_obj_wisata_kabupaten)
            ->get();
        return view('user-page.detail1_objek_wisata', ['objek_wisata' => $objek_wisata, 'objwisatakabupaten' => $objwisatakabupaten]);
    }

    public function tambah()
    {
        $kabupaten = Kabupaten::all();
        $kategori = Kategori_Wisata::all();
        return view('admin.tambah-objek-wisata', compact('kabupaten', 'kategori'));
    }



    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama_wisata' => 'required',
                'deskripsi' => 'required',
                'nama_kategori' => 'required',
                'nama_kabupaten' => 'required',
                'file_foto' => 'required|mimes:jpeg,jpg,png,gif'
            ]
        );
        $objek = new Objek_Wisata();
        $objek->nama_wisata = $request->nama_wisata;
        $objek->deskripsi = $request->deskripsi;
        $objek->id_obj_wisata_kabupaten = $request->nama_kabupaten;
        $objek->id_kat_wisata = $request->nama_kategori;
        if ($request->hasFile('file_foto')) {
            $file = $request->file('file_foto')->getClientOriginalName();
            $request->file('file_foto')->move('images/objekwisata', $file);
            $objek->file_foto = $file;
        }

        $objek->save();
        return redirect('kelolaobjek');
    }

    public function edit($id_obj_wisata)
    {
        $update = Objek_Wisata::find($id_obj_wisata);
        $kabupaten = DB::table('objwisatakabupaten')->get();
        $kategori = DB::table('kategori_wisata')->get();
        return view('admin.ubah-objekwisata', compact('update', 'kabupaten', 'kategori'));
    }

    public function update(request $request, $id_obj_wisata)
    {
        $this->validate(
            $request,
            [
                'nama_wisata' => 'required',
                'deskripsi' => 'required',
                'nama_kategori' => 'required',
                'deskripsi' => 'required',
                'nama_kabupaten' => 'required'
               
            ]
        );
        $update = Objek_Wisata::find($id_obj_wisata);
        $file = $update->file_foto;
        if ($request->hasFile('file_foto')) {
            $file = $request->file('file_foto')->getClientOriginalName();
            $request->file('file_foto')->move('images/objekwisata', $file);
            $update->file_foto = $file;
        }
        $update->nama_wisata = $request->nama_wisata;
        $update->file_foto = $file;
        $update->deskripsi = $request->deskripsi;
        $update->id_kat_wisata = $request->nama_kategori;
        $update->id_obj_wisata_kabupaten = $request->nama_kabupaten;
        $update->save();

        return redirect('/kelolaobjek');
    }

    public function hapus($id_obj_wisata)
    {
        $hapus = Objek_Wisata::find($id_obj_wisata);
        if ($hapus->delete()) {
        }
        return redirect()->back();
    }
}
