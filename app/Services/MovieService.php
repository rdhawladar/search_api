<?php

namespace App\Services;

use App\Interfaces\MovieRepositoryInterface;
use App\Interfaces\MovieServiceInterface;
use Carbon;
use URL;
class MovieService implements MovieServiceInterface
{
    protected $moviesRepository;

    public function __construct(MovieRepositoryInterface $moviesRepository)
    {
        $this->moviesRepository = $moviesRepository;
    }

    public function listData($request)
    {
        // dd(URL::to('/'));
        $data = $this->moviesRepository->fetchList($request);
        $result['code'] = Config('constants.status.ok');
        $base_url = URL::to('/');
        $result['data'] = $data->map(function ($item, $key) {
            $item['poster_url'] = URL::to('/') .Config('constants.poster_path'). $item['poster'];
            $item['slug'] = str_replace(' ', '-', strtolower($item['title']));
            unset($item['poster']);
            return $item;
        });
        return $result;
    }

    public function detailsData($slug)
    {
        $slug = str_replace('-', ' ', $slug);
        $data = $this->moviesRepository->fetchDetails($slug);
        $result['code'] = Config('constants.status.ok');
        $result['data'] = $data->map(function ($item, $key) {
            $item['year']         = substr($item['release_date'], 0, 4);
            $item['runtime']      = intdiv('0' . $item['runtime'], 60) . ' h ' . ($item['runtime'] % 60) . ' min';
            $item['release_date'] = Carbon\Carbon::parse($item['release_date'])->isoFormat('MMMM Do, YYYY');
            $item['cover_url'] = URL::to('/') .Config('constants.cover_path'). $item['cover'];
            unset($item['created_at'], $item['updated_at']);
            unset($item['cover']);
            return $item;
        });
        $result['data'] = $result['data'][0];
        return $result;
    }

    public function gerUserCount($request)
    {
        $result['code'] = Config('constants.status.ok');
        if (!$request->has('from_date') || !$request->has('to_date')) {
            $result['message'] = Config('constants.messages.inputError');
            $result['code'] = Config('constants.status.bad_request');
            return $result;
        }
        $page = $request->page;
        $result['data'] = $this->moviesRepository->fetchUserCount($request->from_date, $request->to_date, $page);
        if (count($result['data']) == 0) {
            $result['message'] = Config('constants.messages.emptyData');
            $result['code'] = Config('constants.status.bad_request');
            return $result;
        }
        return $result;
    }
}
