<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    
    public static $sortValues = [
        'bestmatch' => 'bestMatch' ,
        'newest' => 'newestScore',
        'ratingaverage' => 'ratingAverage',
        'popularity' => 'popularity' ,
        'averageproductprice' => 'averageProductPrice' ,
        'deliverycosts' => 'deliveryCosts',
        'minimumorderamountcosts' => 'minimumOrderAmount'
    ];
}
