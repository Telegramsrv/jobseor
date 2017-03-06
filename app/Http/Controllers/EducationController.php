<?php

namespace App\Http\Controllers;

use App\Model\Education;
use App\Model\EducationType;
use Illuminate\Http\Request;

class EducationController extends Controller
{
	public function newEducation(Request $request,EducationType $education)
	{
		if ($request->ajax()) {
			$this->data['educations'] = $education->getForm();
			echo view('user.applicant.neweducation', $this->data);
		}
	}

	public function addEducation(Request $request)
	{
		if ($request->ajax())
		{
			$education = new Education();
			$education->user_id = $request->user()->user_id;
			$education->name = $request->name;
			$education->year_start = $request->year_start;
			$education->year_end = $request->year_end;
			$education->specialize = $request->specialize;
			$education->education_type_id = $request->education_type_id;
			$education->save();
			echo json_encode([ 'class' => 'success', 'message' => 'Изменения успешно сохранены!']);
		}
	}

	public function editEducation(Request $request)
	{
		if ($request->ajax())
		{
			$education = Education::whereEducationId($request->education_id)->firstOrFail();

			if ($education->user_id != $request->user()->user_id){
				echo json_encode([ 'class' => 'danger', 'message' => 'Ошибка!Пожалуйста повторите попытку!']);
				return '0';
			}

			if (strcmp($education->name, $request->name)) {
				$education->name = $request->name;
			}

			if ($education->year_start != $request->year_start) {
				$education->year_start = $request->year_start;
			}

			if ($education->year_end != $request->year_end) {
				$education->year_end = $request->year_end;
			}

			if (strcmp($education->specialize, $request->specialize)) {
				$education->specialize = $request->specialize;
			}

			if ($education->education_type_id != $request->education_type_id) {
				$education->education_type_id = $request->education_type_id;
			}

			$education->save();
			echo json_encode([ 'class' => 'success', 'message' => 'Изменения успешно сохранены!']);
		}
	}

	public function removeEducation(Request $request)
	{
		if ($request->ajax())
		{
			$education = Education::whereEducationId($request->education_id)->firstOrFail();

			if ($education->user_id == $request->user()->user_id){
				echo json_encode([ 'class' => 'danger', 'message' => 'Ошибка!Пожалуйста повторите попытку!']);
			}
			$education->delete();
			echo json_encode([ 'class' => 'success', 'message' => 'Изменения успешно сохранены!']);
		}
	}
}
