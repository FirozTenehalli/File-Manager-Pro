<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Files extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files';

    protected $hidden = ['added_on'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $fillable = ['*'];
    
    public static function store($user_id, $location, $name, $category)
    {
        $self = new self();
        $self->user_id = $user_id;
        $self->location = $location;
        $self->name = $name;
        $self->category = $category;
        $self->created_at = date('Y-m-d H:i:s');
        $self->save();
        return $self;
    }
}
