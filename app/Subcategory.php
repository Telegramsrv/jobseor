<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Subcategory
 *
 * @property int $subcategory_id
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property int $weight
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Category $category
 * @method static \Illuminate\Database\Query\Builder|\App\Subcategory whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subcategory whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subcategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subcategory whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subcategory whereSubcategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subcategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subcategory whereWeight($value)
 * @mixin \Eloquent
 */
class Subcategory extends Model
{
	protected $primaryKey = 'subcategory_id';

    public function category()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }
}
