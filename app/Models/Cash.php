<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class Cash extends Model
{
    use HasFactory;

    protected $table = "cash";

    protected $fillable = [
        'id',
        'id_user',
        'id_donation',
        'tc_source',
        'tc_total',
    ];
    public function donation()
    {
        return $this->belongsTo(Donation::class,'id_donation','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }
}
