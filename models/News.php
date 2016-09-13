<?php

namespace App\Models;

class News
extends AModel
{
    static protected $table = 'news';
    static protected $columns = ['title', 'text'];
    
}
