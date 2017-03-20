<?php

namespace App\Http\Controllers;

use App\Model\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
	/**
	 * @param Request $request
	 */

	public function newExperience(Request $request)
	{
		if ($request->ajax()) {
			echo view('user.applicant.newexperience');
		}
	}

	/**
	 * @param Request $request
	 */

	public function addExperience(Request $request)
	{
		if ($request->ajax())
		{
			$request['user_id'] = $request->user()->user_id;
			Experience::create($request->toArray());
			echo json_encode([ 'class' => 'success', 'message' => 'Изменения успешно сохранены!']);
		}
	}

	/**
	 * @param Request $request
	 *
	 * @return string
	 */

    public function editExperience(Request $request)
    {
    	if ($request->ajax())
	    {
		    $experience = Experience::whereExperienceId($request->experience_id)->firstOrFail();

			if ($request->user()->user_id != $experience->user_id){
				echo json_encode([ 'class' => 'danger', 'message' => 'Ошибка!Пожалуйста повторите попытку!']);
				return '0';
			}

		    $request['user_id'] = $request->user()->user_id;
			$experience->update($request->toArray());

		    $experience->save();
		    echo json_encode([ 'class' => 'success', 'message' => 'Изменения успешно сохранены!']);
	    }
    }

	/**
	 * @param Request $request
	 */

	public function removeExperience(Request $request)
	{
		if ($request->ajax())
		{
			$experience = Experience::whereExperienceId($request->experience_id)->firstOrFail();

			if ($experience->user_id == $request->user()->user_id){
				echo json_encode([ 'class' => 'danger', 'message' => 'Ошибка!Пожалуйста повторите попытку!']);
			}
			$experience->delete();
			echo json_encode([ 'class' => 'success', 'message' => 'Изменения успешно сохранены!']);
		}
	}
}
