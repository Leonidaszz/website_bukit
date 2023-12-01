<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class gallery extends Model
{
    use HasFactory;
    protected $fillable = ['Files', 'post_as'];

    protected static function boot()
    {
        parent::boot();
        static::updating(function($model){
            if ($model->isDirty('Files') &&($model->getOriginal('Files') !== null)){
            Storage::disk('public')->delete($model->getOriginal('Files'));
        }
        });
    }
}
