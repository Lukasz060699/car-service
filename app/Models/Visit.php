<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Visit extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'data',
        'user_id',
        'id_pojazdu',
        'id_uslugi',
        'status',
        'accept'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Services::class, 'id_uslugi');
    }

    public function car()
    {
        return $this->belongsTo(Cars::class, 'id_pojazdu');
    }
}
