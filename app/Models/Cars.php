<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'marka',
        'model',
        'rok_produkcji',
        'inf_dodatkowe'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
