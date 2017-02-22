<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Category
 *
 * @property \App\Category $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Category extends Section
{
	/**
	 * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
	 *
	 * @var bool
	 */
	protected $checkAccess = false;

	/**
	 * @var string
	 */
	protected $title = 'Категории';

	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay()
	{
		$display = AdminDisplay::table()
		                       ->setHtmlAttribute('class', 'table-primary');
		$display->setColumns(
			\AdminColumn::text('category_id', '#')->setWidth('30px'),
			\AdminColumn::text('name', 'Название')->setWidth('250px'),
			\AdminColumn::text('slug', 'Slug')->setWidth('250px'),
			\AdminColumnEditable::checkbox('special', 'Специализация')->setWidth('50px'),
			\AdminColumn::text('weight', 'Вес')->setWidth('30px'),
			\AdminColumn::image('image', 'Картинка')->setWidth('100px')
		)->paginate(20);

		return $display;
	}

	/**
	 * @param int $id
	 *
	 * @return FormInterface
	 */
	public function onEdit($id)
	{
		return AdminForm::panel()->addBody(
			[
				AdminFormElement::text('name', 'Название')->required(),
				AdminFormElement::text('slug', 'Slug')->required(),
				AdminFormElement::number('weight', 'Вес')->required(),
				AdminFormElement::checkbox('special', 'Специализация'),
				AdminFormElement::image('image', 'Картинка')->setUploadPath(
					function (\Illuminate\Http\UploadedFile $file) {
						return 'image/category';
					}
				)
				                ->setUploadSettings(
					                [
						                'resize' => [
							                120,
							                120,
							                function ($constraint) {
								                $constraint->upsize();
								                $constraint->aspectRatio();
							                }
						                ]
					                ]
				                )
			]
		);
	}

	/**
	 * @return FormInterface
	 */
	public function onCreate()
	{
		return $this->onEdit(null);
	}
}
