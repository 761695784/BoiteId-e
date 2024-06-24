<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'idee_id',
        'auteur_email',
        'action',
        'sent_at',
    ];

    public function idee()
    {
        return $this->belongsTo(Idee::class);
    }
}
