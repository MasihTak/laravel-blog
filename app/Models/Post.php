<?php

namespace App\Models;

class Post
{
    public static function find($slug)
    {
        $path = resource_path("posts/{$slug}.html");

        // Check if the file exists
        if (!file_exists($path)) {
            abort(404);
        }

        return cache()->remember("posts.{$slug}", 1200, fn() =>
            file_get_contents($path)
        );
    }
}
