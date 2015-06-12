<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Laravelrus\LocalizedCarbon\LocalizedCarbon;

/**
 * App\Article
 *
 * @property-read \App\User $user 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags 
 * @property-read \App\Category $category 
 * @property-read mixed $tag_list 
 * @property-read mixed $body_html 
 * @property-write mixed $created_at 
 * @property-write mixed $slug 
 * @method static \Illuminate\Database\Query\Builder|\App\Article findBySlug($slug)
 */

class Article extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $appends = ['tag_list', 'body_html'];

    protected $fillable = ['title', 'body', 'slug', 'click', 'user_id', 'category_id', 'original', 'created_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }

    public function getBodyHtmlAttribute()
    {
        $Parsedown = new \Parsedown();

        return $Parsedown->text($this->body);
    }


    public function getCreatedAtAttribute($value)
    {
        return LocalizedCarbon::parse($value);
    }

    public function setCreatedAtAttribute($date)
    {
        if (is_string($date)) {
            $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
        } else {
            $this->attributes['created_at'] = $date;
        }
    }

    public function setSlugAttribute($data)
    {
        $this->attributes['slug'] = str_slug($data);
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->whereSlug($slug)->firstOrFail();
    }
}
