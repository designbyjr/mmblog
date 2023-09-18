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
		'Title',
		'description',
		'publication_date'
	];

    public function get()
    {
        if(!isset($this->created_at)) {
            return Cache::remember($this->cacheKey() . 'all', Carbon::now()->addMinutes(5), function () {
                return $this->all();
            });
        }
        return Cache::remember($this->cacheKey() . $this->getKey(), Carbon::now()->addMinutes(5), function () {
            return $this;
        });
    }
}
