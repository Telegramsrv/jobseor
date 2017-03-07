<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Subcategory
 *
 * @property int $subcategory_id
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property int $weight
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Model\Category $category
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Subcategory whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Subcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Subcategory whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Subcategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Subcategory whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Subcategory whereSubcategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Subcategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Subcategory whereWeight($value)
 * @mixin \Eloquent
 */
class Profession extends Model
{
	protected $primaryKey = 'profession_id';

    public function category()
    {
    	return $this->belongsTo('App\Model\Category', 'category_id');
    }
}
