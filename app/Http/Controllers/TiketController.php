<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;

class TiketController extends Controller
{
    
    public function showForm()
    {
        return view('pages.tiket');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jumlah_tiket' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data ke database
        Tiket::create([
            'nama' => $request->nama,
            'jumlah_tiket' => $request->jumlah_tiket,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('tiket_success')->with('success', 'Pemesanan tiket berhasil!');
    }
    public function showSuccessPage()
    {
    return view('pages.tiket_succes');
    }
}
