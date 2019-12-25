<?php 
namespace App\Interfaces;

interface MovieRepositoryInterface {
    public function fetchList($params);
    public function fetchDetails($id);
}