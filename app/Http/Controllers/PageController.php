<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
	/**
	 * @param Category $category
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function index(Category $category)
	{
		$this->data['simplecategory'] = $category->getSimpleCategory();
		$this->data['specialistscategory'] = $category->getSpecialistsCategory();

		return view('home', $this->data);
	}

	/**
	 * @param          $slug
	 * @param Category $category
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function getCategory($slug, Category $category)
	{
		$this->data['professions'] = $category->getProfessionByCategorySlug($slug);
		$this->data['category'] = $category->getCategoryBySlug($slug);

		return view('category', $this->data);
	}

	public function confirmEmail($token)
	{
		$data = \GuzzleHttp\json_decode(base64_decode($token));

		$user = User::whereName($data->name)
		            ->whereEmail($data->email)
		            ->whereConfirm(0)
		            ->firstOrFail();

		$user->confirm = 1;
		$user->save();

		return redirect(route('user.home'));
	}
}
