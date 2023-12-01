<x-app-layout>
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8 text-center">Booking Meja Cafe</h1>

        <form action="{{ route('submit_reservation') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="w-full border p-2">
            </div>
            <div class="mb-4">
                <label for="tanggal_reservasi">Tanggal Reservasi:</label>
                <input type="date" name="tanggal_reservasi" id="tanggal_reservasi" class="w-full border p-2">
            </div>
            <div class="mb-4">
                <label for="meja">Pilihan Meja:</label>
                <select name="meja" id="meja" class="w-full border p-2">
                    <!-- Tampilkan daftar meja yang tersedia -->
                    @foreach($availableTables as $table)
                        <option value="{{ $table->id }}">{{ $table->nomor_meja }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full">Booking Meja</button>
        </form>
    </div>
</x-app-layout>
