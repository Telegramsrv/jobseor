<?php

namespace App\Widgets;
use SleepingOwl\Admin\Widgets\Widget;

class NavigationUserBlock extends Widget
{
	/**
	 * Если метод вернет false, блок не будет помещен в шаблон
	 * Данный метод не обязателен
	 *
	 * @return boolean
	 */
	public function active()
	{
		return true;
	}
	/**
	 * При помещении в один блок нескольких виджетов они будут выведены в порядке их позиции
	 * Данный метод не обязателен
	 *
	 * @return integer
	 */
	public function position()
	{
		return 0;
	}
	/*
	 * HTML который необходимо поместить
	 *
	 * @return string
	 */
	public function toHtml()
	{
		return view('widgets.navbar')->render();
	}
	/**
	 * Путь до шаблона, в который добавляем
	 *
	 * @return string|array
	 */
	public function template()
	{
		return \AdminTemplate::getViewPath('_partials.header');
	}
	/**
	 * Блок в шаблоне, куда помещаем
	 *
	 * @return string
	 */
	public function block()
	{
		return 'navbar.right';
	}
}