<?php

namespace App\Services;

use App\Models\ImportBlog;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ImportService
{
    /**
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function run()
    {
        $data = Http::get('https://candidate-test.sq1.io/api.php');
        try{
            $data->throwIfClientError();
            $data = $data->json('articles');
            $cache = Cache::get('import_blogall');

            $ids = Arr::pluck($data,'id');
            $posts = array_diff( $ids,$cache->modelKeys());
            $filtered = array_filter($data, function($arr) use($posts){
                return in_array($arr['id'],$posts);
            });

            foreach ($filtered as $key => $post)
            {
                $post['publication_date'] = (Carbon::make($post['publishedAt']))->toDateTimeString();
                unset($post['publishedAt']);
                unset($filtered[$key]);
                ImportBlog::create($post);
            }
        }
        catch (RequestException $e)
        {
            Log::error($e->getMessage());
        }

    }
}
