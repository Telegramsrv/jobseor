<?php

namespace App\Http\Controllers;

use App\Model\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function editExperience(Request $request)
    {
    	if ($request->ajax())
	    {
		    $experience = Experience::whereExperienceId($request->experience_id)->firstOrFail();

			if ($request->user()->user_id != $experience->user_id){
				echo json_encode([ 'class' => 'danger', 'message' => 'Ошибка!Пожалуйста повторите попытку!']);
				return '0';
			}

		    if (strcmp($experience->name, $request->name)) {
			    $experience->name = $request->name;
		    }

		    if ($experience->year_start != $request->year_start) {
			    $experience->year_start = $request->year_start;
		    }

		    if ($experience->year_end != $request->year_end) {
			    $experience->year_end = $request->year_end;
		    }

		    if (strcmp($experience->position, $request->position)) {
			    $experience->position = $request->position;
		    }

		    $experience->save();
		    echo json_encode([ 'class' => 'success', 'message' => 'Изменения успешно сохранены!']);
	    }
    }
}