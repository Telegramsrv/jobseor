<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property int $weight
 * @property bool $special
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subcategory[] $subcategories
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereSpecial($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereWeight($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
	protected $primaryKey = 'category_id';

    public function subcategories()
    {
    	return $this->hasMany('App\Subcategory');
    }

    public function getSpecialistsCategory()
    {
    	return $this->where('special',1)->get();
    }

    public function getSimpleCategory()
    {
    	return $this->where('special',0)->get();
    }
}
