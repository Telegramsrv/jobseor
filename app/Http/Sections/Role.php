<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Role
 *
 * @property \App\Role $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Role extends Section
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
    protected $title = 'Роли';

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
		    \AdminColumn::text('role_id', '#')->setWidth('10px'),
		    \AdminColumn::text('name', 'Имя роли')->setWidth('250px')
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
			    AdminFormElement::text('name', 'Имя роли')->required()
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
