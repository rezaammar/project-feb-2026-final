<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "pasukan" => "Garuda",
            "slug" => "garuda",
            "body" => "Burung Garuda adalah lambang negara Republik Indonesia, makhluk mitologi setengah manusia setengah burung yang melambangkan kekuatan, kejayaan, dan dinamisme bangsa Indonesia, dengan perisai di dadanya berisi simbol-simbol Pancasila"
        ],
        [
            "pasukan" => "Banteng",
            "slug" => "banteng",
            "body" => "Banteng (Bos javanicus) adalah spesies sapi liar asli Asia Tenggara, termasuk Indonesia, yang merupakan mamalia herbivora berkerabat dekat dengan bison dan sapi domestik, dan dikenal dengan tanduk"
        ]
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $post = static::all();
        return $post->firstWhere('slug', $slug);
    }
}
