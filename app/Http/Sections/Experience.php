<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Model\EducationType;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Experience
 *
 * @property \App\Model\Experience $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Experience extends Section
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
    protected $title = 'Стаж';

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
		    \AdminColumn::text('experience_id', '#')->setWidth('30px'),
		    \AdminColumn::text('user.name', 'ФИО')->setWidth('100px'),
		    \AdminColumn::text('name', 'Название компании')->setWidth('250px'),
		    \AdminColumn::text('position', 'Позиция')->setWidth('250px'),
		    \AdminColumn::text('year_start', 'С')->setWidth('50px'),
		    \AdminColumn::text('year_end', 'По')->setWidth('50px')
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
			    AdminFormElement::text('name', 'Название компании')->required(),
			    AdminFormElement::text('position', 'Позиция')->required(),
			    AdminFormElement::number('year_start', 'С')->required(),
			    AdminFormElement::number('year_end', 'По')->required(),
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
