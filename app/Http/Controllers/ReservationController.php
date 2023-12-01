<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;

class ReservationController extends Controller
{
    
    public function showForm()
    {
        // Ambil daftar meja yang tersedia
        $availableTables = Table::all();

        $availableTables = Table::whereDoesntHave('reservations', function ($query) {
            $query->where('tanggal_reservasi', '>=', now());
        })->get();

        return view('pages.meja_cafe', ['availableTables' => $availableTables]);
    }

    public function submitReservation(Request $request)
    {
        
        $request->validate([
            'nama' => 'required|string',
            'tanggal_reservasi' => 'required|date',
            'meja' => 'required|exists:tables,id',
        ]);

        // Simpan data reservasi ke database
        Reservation::create([
            'nama' => $request->nama,
            'tanggal_reservasi' => $request->tanggal_reservasi,
            'table_id' => $request->meja,
        ]);

        // Update status meja yang telah terpilih
        Table::where('id', $request->meja)->update(['status' => 'booked']);

        return redirect()->route('show_reservation_form')->with('success', 'Reservasi meja berhasil!');
    }
}
