<?php

namespace App\Http\Sections;

use App\Region;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Country
 *
 * @property \App\Country $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Country extends Section
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
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
	    $display = AdminDisplay::datatables()->with('region')
	                           ->setHtmlAttribute('class', 'table-primary');
	    $display->setColumns(
		    \AdminColumn::text('country_id', '#')->setWidth('30px'),
		    \AdminColumn::text('name', 'Название')->setWidth('250px'),
		    \AdminColumn::text('slug', 'Slug')->setWidth('250px'),
		    \AdminColumn::text('region.name', 'Регион')->setWidth('250px'),
		    \AdminColumn::image('image', 'Картинка')->setWidth('100px')
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
			    AdminFormElement::text('name', 'Название')->required(),
			    AdminFormElement::text('slug', 'Slug')->required(),
			    AdminFormElement::select('region_id', 'Регион', Region::class)->setDisplay('name')->required(),
			    AdminFormElement::wysiwyg('body','Текст'),
			    AdminFormElement::image('image', 'Картинка')->setUploadPath(
				    function (\Illuminate\Http\UploadedFile $file) {
					    return 'image/country';
				    }
			    )
			                    ->setUploadSettings(
				                    [
					                    'resize' => [
						                    30,
						                    20,
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
