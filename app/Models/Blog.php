<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\ModelTraits;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Class Blog
 *
 * @property int $id
 * @property string $Title
 * @property string $description
 * @property Carbon $publication_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Blog extends Model
{
    use ModelTraits;
	protected $table = 'blog';

	protected $casts = [
		'publication_date' => 'datetime'
	];

	protected $fillable = [
		'title',
		'description',
		'publication_date',
        'user_id'
	];

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($model) {
            Cache::flush();
            $model->cacheRetrieveAll();
            $model->cacheRetrieveOne();
        });
        static::deleted(function ($model) {
            Cache::flush();
            $model->cacheRetrieveAll();
            $model->cacheRetrieveOne();
        });
    }


    public function get()
    {
        return !isset($this->created_at) ? $this->cacheRetrieveAll() : $this->cacheRetrieveOne();
    }

    public function getUserAttribute()
    {
        return Cache::remember('user', Carbon::now()->addMinutes(5), function () {
            return $this->user()->first(['id','name']);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
