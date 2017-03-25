<?php

namespace App\Http\Sections;

use App\Model\Summary;
use App\Model\VipSummarySettings;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class VipSummary
 *
 * @property \App\Model\VipSummary $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class VipSummary extends Section
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
    protected $title = 'VIP Резюме';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
	    $display = \AdminDisplay::datatables()->with('summary')->with('settings')
	                           ->setHtmlAttribute('class', 'table-primary');

	    $display->setColumnFilters(
		    [
			    null,
			    \AdminColumnFilter::text()->setPlaceholder('Резюме №'),
			    \AdminColumnFilter::select()->setPlaceholder('Название резюме')->setModel(new Summary())->setDisplay('title'),
			    \AdminColumnFilter::select()->setPlaceholder('Название VIP тарифа')->setModel(new VipSummarySettings())->setDisplay('name'),
			    \AdminColumnFilter::range()->setFrom(
				    \AdminColumnFilter::text()->setPlaceholder('Срок с')
			    )->setTo(
				    \AdminColumnFilter::text()->setPlaceholder('Срок по')
			    ),
			    \AdminColumnFilter::date()->setPlaceholder('Дата с')->setFormat('Y-m-d')
		    ]
	    );

	    $display->setColumns(
		    \AdminColumn::text('id', '#')->setWidth('10px'),
		    \AdminColumn::text('summary_id', 'Резюме №')->setWidth('10px'),
		    \AdminColumn::text('summary.title', 'Название резюме')->setWidth('100px'),
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
			    \AdminFormElement::select('summary_id', 'Резюме', Summary::class)->setDisplay('title')->required(),
			    \AdminFormElement::select('settings_id', 'VIP Тариф', VipSummarySettings::class)->setDisplay('name')->required(),
		        \AdminFormElement::datetime('created_at', 'Дата с')->required()
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
