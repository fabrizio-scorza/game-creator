<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'attack', 'defence', 'speed', 'life', 'type_id'];

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
