<?php

namespace App\Http\Sections;

use App\Model\Vacancy;
use App\Model\VipVacancySettings;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class VipVacancy
 *
 * @property \App\Model\VipVacancy $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class VipVacancy extends Section
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
    protected $title = 'VIP Вакансии';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
	    $display = \AdminDisplay::datatables()->with('vacancy')->with('settings')
	                            ->setHtmlAttribute('class', 'table-primary');
	    $display->setColumns(
		    \AdminColumn::text('id', '#')->setWidth('10px'),
		    \AdminColumn::text('vacancy_id', 'Вакансия #')->setWidth('10px'),
		    \AdminColumn::text('vacancy.title', 'Название резюме')->setWidth('100px'),
		    \AdminColumn::text('settings.name', 'Название VIP тарифа')->setWidth('100px'),
		    \AdminColumn::text('settings.time', 'Срок работы')->setWidth('10px'),
		    \AdminColumn::text('created_at', 'Дата с')->setWidth('50px')
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
	    return \AdminForm::panel()->addBody(
		    [
			    \AdminFormElement::select('vacancy_id', 'Вакансия', Vacancy::class)->setDisplay('title')->required(),
			    \AdminFormElement::select('settings_id', 'VIP Тариф', VipVacancySettings::class)->setDisplay('name')->required(),
			    \AdminFormElement::date('created_at', 'Дата с')->required()
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
