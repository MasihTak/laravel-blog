<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post
{
    public static function all() {
        $files = File::files(resource_path("posts/"));

        return array_map(fn ($file) => $file->getContents(), $files);
    }

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
