<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'setting_group',
        'setting_key',
        'setting_value',
    ];

    public function subSettings(){
        return $this->hasMany(Setting::class, 'setting_group', 'setting_key');
    }
}
