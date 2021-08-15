<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    protected $table = 'todo_items';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

}