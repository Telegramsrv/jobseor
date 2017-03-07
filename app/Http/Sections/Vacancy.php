<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Model\Category;
use App\Model\Country;
use App\Model\Currency;
use App\Model\EducationType;
use App\Model\Employment;
use App\Model\ExperienceType;
use App\Model\Profession;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Vacancy
 *
 * @property \App\Model\Vacancy $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Vacancy extends Section
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
    protected $title = 'Вакансии';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
	    $display = AdminDisplay::datatables()->with('user')->with('category')->with('country')
	                           ->setHtmlAttribute('class', 'table-primary');
	    $display->setColumns(
		    \AdminColumn::text('Vacancy_id', '#')->setWidth('10px'),
		    \AdminColumn::text('user.name', 'ФИО')->setWidth('100px'),
		    \AdminColumn::text('user.email', 'Email')->setWidth('100px'),
		    \AdminColumn::text('title', 'Название')->setWidth('250px'),
		    \AdminColumn::text('category.name', 'Категория')->setWidth('100px'),
		    \AdminColumn::text('profession.name', 'Подкатегория')->setWidth('100px'),
		    \AdminColumn::text('country.name', 'Страна')->setWidth('100px'),
		    \AdminColumn::text('city', 'Город')->setWidth('100px')
//		    \AdminColumn::text('city', '')->setWidth('5px')//TODO VIP
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
		    array(
			    AdminFormElement::text('user.name', 'ФИО')->setReadOnly(true),
			    AdminFormElement::text('user.email', 'Email')->setReadOnly(true),
			    AdminFormElement::text('title', 'Название')->required(),
			    AdminFormElement::select('category_id', 'Категория', Category::class)->setDisplay('name')->required(),
			    AdminFormElement::select('profession_id', 'Подкатегория', Profession::class)->setDisplay('name')->required(),
			    AdminFormElement::select('country_id', 'Страна', Country::class)->setDisplay('name')->required(),
			    AdminFormElement::text('city', 'Город')->required(),
			    AdminFormElement::select('education_type_id', 'Образование', EducationType::class)->setDisplay('name')->required(),
			    AdminFormElement::select('employment_id', 'Зайнятость', Employment::class)->setDisplay('name')->required(),
			    AdminFormElement::number('salary', 'Зарплата от')->required(),
			    AdminFormElement::select('currency_id', 'Валюта', Currency::class)->setDisplay('name')->required(),
			    AdminFormElement::select('experience_type_id', 'Стаж', ExperienceType::class)->setDisplay('name')->required(),
			    AdminFormElement::number('age_min', 'Возраст от'),
			    AdminFormElement::number('age_max', 'Возраст до'),
			    AdminFormElement::wysiwyg('description','Описание'),
		    )
	    );
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}
