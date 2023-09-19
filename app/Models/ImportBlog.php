<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\ModelTraits;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Class ImportBlog
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property Carbon $publication_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ImportBlog extends Model
{
    use HasFactory, ModelTraits;
	protected $table = 'import_blog';

	protected $casts = [
		'publication_date' => 'datetime'
	];

	protected $fillable = [
        'id',
		'title',
		'description',
		'publication_date'
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

    public function getUserAttribute(){
        return 'admin';
    }
}
