<?php
namespace App\Repositories;

use App\Interfaces\MovieRepositoryInterface;
use App\Models\Restaurant;
use App\Models\User;
use DB;
use Carbon\Carbon;

class MovieRepository implements MovieRepositoryInterface
{
    public function fetchList($params)
    {
        $data = Restaurant::get();
        dd($data);
        $params->has('related_project') ?
            $limit = Config('constants.related_movie_limit') :
            $limit = Config('constants.list_item_per_req');

        $movie = Movie::select('id', 'title', 'rating', 'release_date', 'poster');
        if ($params->has('id')) {
            $movie = $movie->where('id', '>', $params->query('id'));
        }
        return $movie->take($limit)->get();
    }

    public function fetchDetails($title)
    {
        return Movie::where('title', $title)->get();
    }

    public function fetchUserCount($fromDate, $toDate, $page)
    {
        $limit = Config('constants.limit');
        $from = Carbon::createFromFormat('Y-m-d', $fromDate)->addDays(($page - 1) * $limit)
                    ->toDateString();
        $to = Carbon::createFromFormat('Y-m-d', $fromDate)->addDays($page * $limit - 1)
                    ->toDateString();
        if($to > $toDate) {
            $to = $toDate;
        }
        $result['data'] = DB::select(DB::raw("
            SELECT a.Date AS DATE, COUNT(createdAt) as Total_User
                FROM
                (
                SELECT '$to' - INTERVAL (a.a + (10 * b.a)) DAY AS DATE
                FROM
                (
                SELECT 0 AS a UNION ALL
                SELECT 1 UNION ALL
                SELECT 2 UNION ALL
                SELECT 3 UNION ALL
                SELECT 4 UNION ALL
                SELECT 5 UNION ALL
                SELECT 6 UNION ALL
                SELECT 7 UNION ALL
                SELECT 8 UNION ALL
                SELECT 9) AS a CROSS
                JOIN
                (
                SELECT 0 AS a
                ) AS b
                ) a
                LEFT JOIN users c ON a.Date=c.createdAt
                WHERE a.Date BETWEEN '$from' AND '$to'
                GROUP BY DATE
                ORDER BY a.Date"));
        $result['per_page'] = $limit;
        $result['total_page'] = ceil(Carbon::parse($fromDate)->diffInDays(Carbon::parse($toDate))/10);
        $result['next_page'] = ($page+1>$result['total_page']) ? null : $page+1;
        $result['prev_page'] = ($page-1==0) ? null : $page-1;
        $result['current_page'] = $page ? $page : Config('constants.numbers.one');
        return $result;
    }
}
