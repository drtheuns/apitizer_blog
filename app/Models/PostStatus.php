<?php

namespace App\Models;

class PostStatus
{
    public static function all()
    {
        return [
            'published',
            'draft',
            'scrapped',
            'another-status',
        ];
    }
}
