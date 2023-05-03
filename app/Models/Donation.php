<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;
use Illuminate\Pagination\Paginator;

class Donation extends Model
{
    use HasFactory;

    protected $table = "donation";

    protected $fillable = [
        'id',
        'id_user',
        'id_category',
        'td_title',
        'td_receiver',
        'td_location',
        'td_target',
        'td_duration_started',
        'td_duration_end',
        'td_description',
        'td_image',
        'td_collected_fund',
        'td_status',
        'comment',
        'created_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'id_category','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }
    /**
     * The attributes that define directory for uploaded files of this model.
     * @var string
     */
    public static string $FILE_DESTINATION = 'uploaded/donation';

    /**
     * This static method is used to get all data of this model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAllDonation()
    {

        return self::orderBy('created_at', 'td_title')->get([
            'id',
            'id_user',
            'id_category',
            'td_title',
            'td_target',
            'td_duration_started',
            'td_duration_end',
            'td_description',
            'td_image',
            'td_collected_fund',
            'td_status',
            'created_at'
        ]);
    }

    /**
     * This static method is used to get data of this model by its judul.
     *
     * @param string $judul
     * @param number $page
     * @return mixed
     */
    public static function getDonationByTitle(string $title)
    {
        $perPage = 10;
        $page = Paginator::resolveCurrentPage() ?: 1;

        return self::where('td_title', 'like', '%' . $title . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page)
            ->get([
                'id',
                'id_user',
                'id_category',
                'td_title',
                'td_target',
                'td_duration_started',
                'td_duration_end',
                'td_description',
                'td_image',
                'td_collected_fund',
                'td_status',
                'created_at'
        ]);
    }

    /**
     * This static method is used to get data of this model by its category.
     *
     * @param string $category
     * @return mixed
     */
    public static function getDonationByCategory(string $category)
    {
        $perPage = 10;
        $page = Paginator::resolveCurrentPage() ?: 1;

        return self::select('donation.*')
            ->where('category.tc_title', 'like', '%' . $category . '%')
            ->join('category', 'id_category', 'category.id')
            ->orderBy('donation.created_at', 'desc', 'donation.td_duration', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);
    }

    /**
     * This static method is used to get data of this model by its judul and tag.
     *
     * @param string $judul
     * @param string $tag
     * @return mixed
     */
    // public static function getDonationByTitleAndTag(string $judul, string $tag)
    // {
    //     return self::where('judul', 'like', '%' . $judul . '%')
    //         ->where('tag', 'like', '%' . $tag . '%')
    //         ->orderBy('updated_at', 'desc')
    //         ->get([
    //             'id',
    //             'id_user',
    //             'id_category',
    //             'td_title',
    //             'td_target',
    //             'td_duration',
    //             'td_description',
    //             'td_image',
    //             'td_collected_fund',
    //             'td_status',
    //             'created_at'
    //         ]);
    // }

    /**
     * This static method is used to get one data of this model by id.
     *
     * @param int $id
     * @return mixed
     */
    public static function getDonationById(int $id)
    {
        return self::where('id', $id)->first([
            'id',
            'id_user',
            'id_category',
            'td_title',
            'td_receiver',
            'td_target',
            'td_duration_started',
            'td_duration_end',
            'td_description',
            'td_image',
            'td_collected_fund',
            'td_status',
            'created_at'
        ]);
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param \DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        /*return $date->format('d M Y, H:i:s');*/
        $long = strtotime($date->format('Y-m-d H:i:s'));
        return (string)$long;
    }
}
