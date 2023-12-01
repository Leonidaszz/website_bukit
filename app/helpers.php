<?php

use App\Models\gallery;
use App\Models\news;

function get_gallery_data($key){
    $data = gallery::where("post_as", $key)->get();
        return $data;
 }

 function display_gallery_foto() {
    $galleryData = get_gallery_data('FOTO');

    if ($galleryData->count() > 0) {
        echo '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">';
        
        foreach ($galleryData as $item) {
            echo '<div class="overflow-hidden bg-gray-200 rounded-lg shadow-md">';
            echo '<img src="' . asset('storage/' . $item->file) . '" alt="Foto" class="w-full h-48 object-cover">';
            echo '<div class="p-4">';
            echo '<p class="text-lg font-semibold mb-2">' . $item->description . '</p>';
            echo '<button class="bg-blue-500 text-white px-4 py-2 rounded-full">Lihat Detail</button>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo '<p>Tidak ada foto yang tersedia.</p>';
    }
}
function display_gallery_video() {
    $galleryData = get_gallery_data('VIDEO');

    if ($galleryData->count() > 0) {
        echo '<h2 class="text-2xl font-bold mb-4 text-center">Video</h2>';
        echo '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">';
        
        foreach ($galleryData as $item) {
            echo '<div class="overflow-hidden bg-gray-200 rounded-lg shadow-md">';
            echo '<div class="relative" style="padding-top: 56.25%;">';
            echo '<iframe src="' . asset('storage/' . $item->file) . '" class="absolute top-0 left-0 w-full h-full" frameborder="0" allowfullscreen></iframe>';
            echo '</div>';
            echo '<div class="p-4">';
            echo '<p class="text-lg font-semibold mb-2">' . $item->description . '</p>';
            echo '<button class="bg-blue-500 text-white px-4 py-2 rounded-full">Tonton Sekarang</button>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo '<p>Tidak ada video yang tersedia.</p>';
    }
}

function get_news_data() {
    $data = news::all();
    return $data ?: [];
}

function display_news() {
    $newsData = get_news_data();

    if ($newsData->count() > 0) {
        echo '<h2 class="text-2xl font-bold mb-4 text-center">Video</h2>';
        echo '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">';
        
        foreach ($newsData as $news) {
            echo '<div class="overflow-hidden bg-gray-200 rounded-lg shadow-md">';
            echo '<div class="relative" style="padding-top: 56.25%;">';
            echo '<iframe src="' . asset('storage/' . $news->thumbnail) . '" class="absolute top-0 left-0 w-full h-full" frameborder="0" allowfullscreen></iframe>';
            echo '</div>';
            echo '<div class="p-4">';
            echo '<p class="text-lg font-semibold mb-2">' . $news->title . '</p>';
            echo '<p class="text-lg font-semibold mb-2">' . $news->content . '</p>';
            echo '<button class="bg-blue-500 text-white px-4 py-2 rounded-full">Tonton Sekarang</button>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>Tidak ada video yang tersedia.</p>';
    }
}
