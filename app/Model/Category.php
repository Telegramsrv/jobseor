<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Category
 *
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property int $weight
 * @property bool $special
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Subcategory[] $subcategories
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereSpecial($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereWeight($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
	protected $primaryKey = 'category_id';

    public function subcategories()
    {
    	return $this->hasMany('App\Model\Subcategory','category_id');
    }

    public function getSpecialistsCategory()
    {
    	return $this->where('special',1)->get();
    }

    public function getSimpleCategory()
    {
    	return $this->where('special',0)->get();
    }

    public function getSubcategoryByCategorySlug($slug)
    {
    	return $this->whereSlug($slug)->firstOrFail()->subcategories()->get();
    }

    public function getCategoryBySlug($slug)
    {
    	return $this->whereSlug($slug)->firstOrFail();
    }
}
