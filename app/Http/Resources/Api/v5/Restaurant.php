<?php

namespace App\Http\Resources\api\v5;

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
        if ($request->client_version == Config('constants.versions.v_5_12_300')) {
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
        return parent::toArray(($this));
    }
}
