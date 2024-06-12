<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Entry extends Model
{
    use HasFactory;

    protected $keyType = 'uuid';
    public $incrementing = false;
    protected $fillable = ['id', 'title', 'content'];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID for the `id` field when creating a new entry
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
