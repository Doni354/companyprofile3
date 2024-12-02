<?php namespace App\Libraries;

class Widget
{

    public function recentPost(array $params)
    {
        return view('widget/recent_post', $params);
    }
}