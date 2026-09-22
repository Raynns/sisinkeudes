<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // 'category' diganti menjadi 'activity_id'
    protected $fillable = [
        'type',
        'activity_id', 
        'amount',
        'transaction_date',
        'description',
        'proof_file',
        'user_id',
    ];

    // Relasi ke Pembuat (User)
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Data Kegiatan
    public function activity() {
        return $this->belongsTo(Activity::class);
    }
}