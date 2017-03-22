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
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Profession whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Profession whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Profession whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Profession whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Profession whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Profession whereSubcategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Profession whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Profession whereWeight($value)
 * @mixin \Eloquent
 * @property int $profession_id
 * @property bool $free
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Profession whereFree($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Profession whereProfessionId($value)
 */
class Profession extends Model
{
	protected $primaryKey = 'profession_id';

    public function category()
    {
    	return $this->belongsTo('App\Model\Category', 'category_id');
    }

	public function getForm($category_id)
	{
		$buff = [];
		foreach ($this->whereCategoryId($category_id)->get() as $profession)
		{
			$buff[$profession->profession_id] = $profession->name;
		}
		return $buff;
	}

	public function getFormAll()
	{
		$buff = [];
		foreach ($this->get() as $profession)
		{
			$buff[$profession->profession_id] = $profession->name;
		}
		return $buff;
	}
}
