@php
$dataBerita =  get_news_data();
@endphp

<x-app-layout>
    <div class="bg-cover bg-center h-80 flex items-center justify-center" style="background-image: url('path/to/cover-image.jpg');">
        <h1 class="text-4xl font-bold text-white">Berita</h1>
    </div>

    <div class="container mx-auto p-8 mt-4">
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-center">Berita</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8 mx-auto">
                @foreach ($dataBerita as $news)
                    <div class="overflow-hidden bg-gray-200 rounded-lg shadow-md">
                        <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="Foto" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <p class="text-lg font-semibold mb-2">{!! $news->content !!}</p>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-full">Lihat Selengkapnya</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</x-app-layout>
