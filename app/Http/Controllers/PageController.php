<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Category $category)
    {
		$this->data['simplecategory'] = $category->getSimpleCategory();
		$this->data['specialistscategory'] = $category->getSpecialistsCategory();
		return view('home',$this->data);
    }

    public function getCategory($slug,Category $category)
    {
        $this->data['professions'] = $category->getProfessionByCategorySlug($slug);
        $this->data['category'] = $category->getCategoryBySlug($slug);
        return view('category',$this->data);
    }
}
