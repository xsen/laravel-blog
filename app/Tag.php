<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tag
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $articles 
 * @property-write mixed $slug 
 * @method static \Illuminate\Database\Query\Builder|\App\Tag findBySlug($slug)
 */
class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    public function setSlugAttribute($data)
    {
        if (str_slug($data) != '') {
            $this->attributes['slug'] = str_slug($data);
        } else {
            $this->attributes['slug'] = $data;
        }
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->whereSlug($slug)->firstOrFail();
    }
}
