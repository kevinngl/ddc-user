<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class Category extends Model
{
    use HasFactory;

    protected $table = "category";

    protected $fillable = [
        'id',
        'id_user',
        'tc_title',
    ];
    public function userItem()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }

    /**
     * This static method is used to get data of this model by its category.
     *
     * @param string $category
     * @return mixed
     */
    public static function getCategoryByTitle(string $category)
    {

        return self::where('tc_title', 'like', '%' . $category . '%')->get(['tc_title']);
    }
}
