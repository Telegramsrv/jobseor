<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Role;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class User
 *
 * @property \App\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class User extends Section
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
	protected $title = 'Пользователи';

	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay()
	{
		$display = AdminDisplay::datatables()->with('role')
		                       ->setHtmlAttribute('class', 'table-primary');
		$display->setColumns(
			\AdminColumn::text('user_id', '#')->setWidth('10px'),
			\AdminColumn::text('name', 'ФИО')->setWidth('150px'),
			\AdminColumn::text('email', 'email')->setWidth('250px'),
			\AdminColumn::text('role.name', 'Роль')->setWidth('100px'),
			\AdminColumn::image('image', 'Изображение')->setWidth('250px'),
			\AdminColumn::text('balance', 'Баланс')->setWidth('100px')
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
				AdminFormElement::text('name', 'ФИО')->required(),
				AdminFormElement::text('email', 'Email')->required(),
				AdminFormElement::password('password', 'Пароль')->hasWithBcrypt()->required(),
				AdminFormElement::select('role_id', 'Роль', Role::class)->setDisplay('name'),
				AdminFormElement::number('balance', 'Баланс')->setMin(0),
				AdminFormElement::image('image', 'Картинка')->setUploadPath(
					function (\Illuminate\Http\UploadedFile $file) {
						return 'image/users';
					}
				)
				                ->setUploadSettings(
					                [
						                'resize' => [
							                500,
							                500,
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
