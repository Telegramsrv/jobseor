<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Company
 *
 * @property \App\Model\Company $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Company extends Section
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
    protected $title = 'Компании';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
	    $display = AdminDisplay::datatables()->with('user')
	                           ->setHtmlAttribute('class', 'table-primary');
	    $display->setColumns(
		    \AdminColumn::text('company_id', '#')->setWidth('10px'),
		    \AdminColumn::text('name', 'Название')->setWidth('150px'),
		    \AdminColumn::text('website', 'Сайт')->setWidth('250px'),
		    \AdminColumn::text('user.name', 'Имя Пользователя')->setWidth('100px'),
		    \AdminColumn::text('user.email', 'Email')->setWidth('100px'),
		    \AdminColumn::text('user.balance', 'Баланс')->setWidth('50px'),
		    \AdminColumnEditable::checkbox('agency', 'Агенство')->setWidth('50px')
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
			    AdminFormElement::text('name', 'Название компании')->required(),
			    AdminFormElement::text('website', 'Сайт'),
			    AdminFormElement::checkbox('agency', 'Агенство'),
			    AdminFormElement::text('user.name', 'ФИО Пользователя')->setReadOnly(true)
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
