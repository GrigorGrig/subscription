<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    const google_api_key = 'AIzaSyBTiZYsj2r6DmvG2HupqO30ANpax0Z46dw';
    const youtube_api_key = '';
    const news_am_api_key = '';

    /**
     * @param $url
     * @return array
     */
    public static function google($url)
    {
        $response = Http::get($url . '?key=' . self::google_api_key);
        $googleData = [];
        foreach ($response['items'] as $post) {
            $googleData[] = [
                'title' => $post['author']['displayName'],
                'text' => $post['content'],
                'img' => $post['author']['image']['url'],
            ];
        }
        return $googleData;
    }

    /**
     * @param $url
     */
    public static function youtube($url)
    {
        return null;
    }

    /**
     * @param $url
     */
    public static function news($url)
    {
        return null;
    }
}
