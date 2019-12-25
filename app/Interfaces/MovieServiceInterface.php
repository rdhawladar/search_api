<?php 
namespace App\Interfaces;

interface MovieServiceInterface {
    public function listData($params);
    public function detailsData($slug);
}