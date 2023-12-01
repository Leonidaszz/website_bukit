
    <x-app-layout>
        <div class="container mx-auto p-8">
            <h1 class="text-4xl font-bold mb-8 text-center">Pemesanan Tiket</h1>
    
            <form action="{{ route('submit_ticket') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" class="w-full border p-2">
                </div>
                <div class="mb-4">
                    <label for="jumlah_tiket">Jumlah Tiket:</label>
                    <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="w-full border p-2">
                </div>
                <div class="mb-4">
                    <label for="keterangan">Keterangan:</label>
                    <textarea name="keterangan" id="keterangan" class="w-full border p-2"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full">Pesan Tiket</button>
            </form>
        </div>
    </x-app-layout>
    
