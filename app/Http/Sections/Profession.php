<?php

namespace App\Http\Sections;

use App\Model\Category;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Subcategory
 *
 * @property \App\Model\Profession $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Profession extends Section
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
	protected $title;

	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay()
	{
		$display = AdminDisplay::datatables()->with('category')
		                       ->setHtmlAttribute('class', 'table-primary');
		$display->setColumns(
			\AdminColumn::text('profession_id', '#')->setWidth('30px'),
			\AdminColumn::text('name', 'Название')->setWidth('250px'),
			\AdminColumn::text('slug', 'Slug')->setWidth('250px'),
			\AdminColumn::text('category.name', 'Категория')->setWidth('250px'),
			\AdminColumn::text('weight', 'Вес')->setWidth('30px'),
			\AdminColumn::image('image', 'Картинка')->setWidth('100px')
		);

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
				AdminFormElement::select('category_id', 'Категория', Category::class)->setDisplay('name')->required(),
				AdminFormElement::image('image', 'Картинка')->setUploadPath(
					function (\Illuminate\Http\UploadedFile $file) {
						return 'image/profession';
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
