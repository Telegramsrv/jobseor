<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Category $category)
    {
		dd($category);
    }
}
