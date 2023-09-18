<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ImportBlog
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
class ImportBlog extends Model
{
	protected $table = 'import_blog';

	protected $casts = [
		'publication_date' => 'datetime'
	];

	protected $fillable = [
		'Title',
		'description',
		'publication_date'
	];
}
