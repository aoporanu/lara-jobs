<?php /** @noinspection PhpUndefinedClassInspection */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Job
 *
 * @method static paginate(int $int)
 * @method static find($id)
 * @method static findOrFail($get)
 * @method static where()
 * @method void delete()
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $category_id
 * @property-read \App\Category|null $category
 * @property-read \App\Company $company
 * @property-read \App\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Job extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * [city description]
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo A job belongs to a city
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * [findById description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public static function findById($id)
    {
        return self::where('id', $id)->first();
    }

    /**
     * [close description]
     * @param  [type] $job [description]
     * @return [type]      [description]
     */
    public function close($job)
    {
        self::where('id', $job->id)->update(['closed' => 1]);
    }
}
