<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class VipApplicantSetting
 *
 * @property \App\Model\VipApplicantSetting $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class VipApplicantSetting extends Section
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
    protected $title = 'Настройки для VIP соискателей';

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
		    \AdminColumn::text('id', '#')->setWidth('30px'),
		    \AdminColumn::text('name', 'Название')->setWidth('250px'),
		    \AdminColumn::text('cost', 'Стоимость')->setWidth('250px'),
		    \AdminColumn::text('time', 'Срок')->setWidth('50px')
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
	    return \AdminForm::panel()->addBody(
		    [
			    \AdminFormElement::text('name', 'Название')->required(),
			    \AdminFormElement::number('cost', 'Стоимость')->required(),
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
