<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'category',
        'amount',
        'transaction_date',
        'description',
        'proof_file',
        'user_id',
    ];

    // Relasi ke tabel User (siapa yang mencatat)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
