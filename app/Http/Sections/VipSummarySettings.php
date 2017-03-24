<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class VipSummarySettings
 *
 * @property \App\Model\VipSummarySettings $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class VipSummarySettings extends Section
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
    protected $title = 'Настройки для VIP резюме';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
	    $display = \AdminDisplay::table()
	                           ->setHtmlAttribute('class', 'table-primary');
	    $display->setColumns(
		    \AdminColumn::text('id', '#')->setWidth('10px'),
		    \AdminColumn::text('name', 'Название типа')->setWidth('250px'),
		    \AdminColumn::text('cost', 'Цена')->setWidth('50px'),
		    \AdminColumn::text('time', 'Срок')->setWidth('150px')
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
			    \AdminFormElement::text('name', 'Название типа')->required(),
			    \AdminFormElement::number('cost', 'Цена')->required(),
			    \AdminFormElement::number('time', 'Срок')->required()
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
