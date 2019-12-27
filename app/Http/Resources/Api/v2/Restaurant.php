<?php

namespace App\Http\Resources\Api\v2;

use Illuminate\Http\Resources\Json\JsonResource;

class Restaurant extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'RestaurantName' => $this->name,
            'branch' => $this->branch,
            'phone' => $this->phone,
            'email' => $this->email,
            'logo' => $this->logo,
            'address' => $this->address,
            'housenumber' => $this->housenumber,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'url' => $this->url,
            'open' => $this->open,
            'bestMatch' => $this->bestMatch,
            'newestScore' => $this->newestScore,
            'ratingAverage' => $this->ratingAverage,
            'popularity' => $this->popularity,
            'averageProductPrice' => $this->averageProductPrice,
            'deliveryCosts' => $this->deliveryCosts,
            'minimumOrderAmount' => $this->minimumOrderAmount,
        ];
    }
}
