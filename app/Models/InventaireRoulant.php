<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventaireRoulant extends Model
{
    use HasFactory;

    protected $fillable = ['roulant_id', 'annee', 'situation'];

    public function roulant()
    {
        return $this->belongsTo(Roulant::class);
    }
}
