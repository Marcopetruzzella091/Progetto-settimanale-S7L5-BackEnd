<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function activities()
    {
        return $this->hasMany(Activity::class);
        
    }

    protected $fillable = [
        'nome_corso', 'stato_richiesta', 'numero_sala', 'data_prenotazione', 'fascia_oraria', 'user_id', 'id'
    ];
}
