<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Model\Category;
use App\Model\Currency;
use App\Model\Employment;
use App\Model\Profession;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Summary
 *
 * @property \App\Model\Summary $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Summary extends Section
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
    protected $title = 'Резюме';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
	    $display = AdminDisplay::datatables()->with('user')->with('category')->with('profession')
	                           ->setHtmlAttribute('class', 'table-primary');
	    $display->setColumns(
		    \AdminColumn::text('summary_id', '#')->setWidth('10px'),
		    \AdminColumn::text('user.name', 'ФИО')->setWidth('100px'),
		    \AdminColumn::text('user.email', 'Email')->setWidth('100px'),
		    \AdminColumn::text('title', 'Название')->setWidth('150px'),
		    \AdminColumn::text('category.name', 'Категория')->setWidth('100px'),
		    \AdminColumn::text('profession.name', 'Професия')->setWidth('100px')
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
			    AdminFormElement::text('user.name', 'ФИО')->setReadOnly(true),
			    AdminFormElement::text('user.email', 'Email')->setReadOnly(true),
			    AdminFormElement::text('title', 'Название')->required(),
			    AdminFormElement::number('salary', 'Зарплата от')->required(),
			    AdminFormElement::select('currency_id', 'Валюта', Currency::class)->setDisplay('name')->required(),
			    AdminFormElement::select('category_id', 'Категория', Category::class)->setDisplay('name')->required(),
			    AdminFormElement::select('profession_id', 'Професия', Profession::class)->setDisplay('name')->required(),
			    AdminFormElement::select('employment_id', 'Зайнятость', Employment::class)->setDisplay('name')->required(),
			    AdminFormElement::wysiwyg('information','Профейсиональные навыки'),
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
