<?php

namespace App\Http\Controllers;

use App\Model\Company;
use App\Model\Contacts;
use App\Model\Country;
use App\Model\Education;
use App\Model\EducationType;
use App\Model\MessageNotification;
use App\Model\Payment;
use App\Model\User;
use App\Model\UserWatchedSummary;
use App\Model\UserWatchedVacancy;
use Illuminate\Http\Request;
//use Intervention\Image\ImageManager;
use Image;

class UserController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request, Country $country, EducationType $education)
	{
		$this->data['user'] = $request->user();

		if ($request->user()->role_id == 2) {
			$this->data['company'] = $request->user()->company;
			$this->data['agency'] = ['0' => 'Прямой работодатель', '1' => 'Кадровое агенство'];

			return view('user.company.home', $this->data);
		}

		if ($request->user()->role_id == 3) {
			$this->data['applicant'] = $request->user()->applicant;
			$this->data['countries'] = $country->getForm();
			$this->data['educations'] = $education->getForm();

			return view('user.applicant.home', $this->data);
		}
		if ($request->user()->role_id == 1) {
			return redirect('/admin');
		}

		return redirect('/');
	}

	/**
	 * @param Request $request
	 */

	public function notepad(Request $request)
	{
		$this->data['user'] = $request->user();
		if ($request->user()->role_id == 2) {
			$this->data['vacancies'] = $request->user()->company->vacancies;

			return view('user.company.notepad', $this->data);
		}

		if ($request->user()->role_id == 3) {
			$this->data['summaries'] = $request->user()->applicant->summaries;

			return view('user.applicant.notepad', $this->data);
		}
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function edit(Request $request)
	{
		$this->data['user'] = $request->user();

		return view('user.edit', $this->data);
	}

	/**
	 * @param Request $request
	 */

	public function editPWD(Request $request)
	{
		if (\Hash::check($request->password, $request->user()->getAuthPassword())) {
			$request->user()->password = \Hash::make($request->new_password);
			$request->user()->save();

			return redirect(route('user.edit'));
		}
		else {
			die('Неверный пароль!');
		}
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */

	public function editNotification(Request $request)
	{
		if ($request->message_notification) {
			MessageNotification::firstOrCreate(['user_id' => $request->user()->user_id]);
		}
		else {
			MessageNotification::whereUserId($request->user()->user_id)->firstOrFail()->delete();
		}

		return redirect(route('user.edit'));
	}

	/**
	 * @param Request $request
	 */

	public function editInfo(Request $request)
	{
		if ($request->ajax()) {
			if ($request->user()->role_id == 3) {
				$request['user_id'] = $request->user()->user_id;

				if (strcmp($request->user()->name, $request->name)) {
					$request->user()->name = $request->name;
				}

				if (strcmp($request->user()->email, $request->email)) {
					$invalidEmail = User::whereEmail($request->email)->count();
					if (!$invalidEmail) {
						$request->user()->email = $request->email;
					}
					else {
						echo json_encode(['class' => 'danger', 'message' => 'Ошибка!Данный email уже используеться!']);
					}
				}

				if (strcmp($request->user()->contacts->phone, $request->phone)) {
					$request->user()->contacts->phone = $request->phone;
				}

				Country::whereCountryId($request->country_id)->firstOrFail();
				if ($request->user()->applicant->country_id != $request->country_id) {
					$request->user()->applicant->country_id = $request->country_id;
				}

				if ($request->user()->applicant->birthday != $request->birthday) {
					$request->user()->applicant->birthday = $request->birthday;
				}

				if (strcmp($request->user()->applicant->city, $request->city)) {
					$request->user()->applicant->city = $request->city;
				}

				$request->user()->save();
				$request->user()->applicant->save();
				$request->user()->contacts->save();
				echo json_encode(['class' => 'success', 'message' => 'Изменения успешно сохранены!']);
			}
			if ($request->user()->role_id == 2) {
				if (strcmp($request->user()->name, $request->name)) {
					$request->user()->name = $request->name;
				}

				if (strcmp($request->user()->email, $request->email)) {
					$invalidEmail = User::whereEmail($request->email)->count();
					if (!$invalidEmail) {
						$request->user()->email = $request->email;
					}
					else {
						echo json_encode(['class' => 'danger', 'message' => 'Ошибка!Данный email уже используеться!']);
					}
				}

				if (strcmp($request->user()->company->website, $request->website)) {
					$request->user()->company->website = $request->website;
				}
				if (strcmp($request->user()->company->description, $request->description)) {
					$request->user()->company->description = $request->description;
				}

				if ($request->user()->company->agency != $request->agency) {
					$request->user()->company->agency = $request->agency;
				}

				$request->user()->save();
				$request->user()->company->save();

				echo json_encode(['class' => 'success', 'message' => 'Изменения успешно сохранены!']);
			}
		}
	}

	/**
	 * @param         $id
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 *
	 */

	public function getUser($id, Request $request)
	{
		$user = User::whereUserId($id)->firstOrFail();
		if ($user->user_id == $request->user()->user_id || $user->role_id == 1) {
			return redirect(route('user.home'));
		}
		$this->data['user'] = $user;
		if ($user->role_id == 2) {
			$this->data['company'] = $user->company;

			return view('user.company.index', $this->data);
		}
		if ($user->role_id == 3) {
			$this->data['applicant'] = $user->applicant;

			return view('user.applicant.index', $this->data);
		}
	}

	/**
	 * @param         $id
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 */

	public function getUserNotepad($id, Request $request)
	{
		$user = User::whereUserId($id)->firstOrFail();
		if ($user->user_id == $request->user()->user_id || $user->role_id == 1) {
			return redirect(route('user.home'));
		}
		$this->data['user'] = $user;
		if ($user->role_id == 2) {
			$this->data['vacancies'] = $user->company->vacancies;

			return view('user.company.notepad', $this->data);
		}

		if ($user->role_id == 3) {
			$this->data['summaries'] = $user->applicant->summaries;

			return view('user.applicant.index_notepad', $this->data);
		}
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function viewers(Request $request)
	{
		$this->data['user'] = $request->user();
		if ($request->user()->role_id == 2) {
			$this->data['vacancies'] = $request->user()->company->vacancies;

			return view('vacancy.viewers', $this->data);
		}

		if ($request->user()->role_id == 3) {
			$this->data['summaries'] = $request->user()->applicant->summaries;

			return view('summary.viewers', $this->data);
		}
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function history(Request $request)
	{
		if ($request->user()->role_id == 2) {
			$this->data['history'] = UserWatchedSummary::whereUserId($request->user()->user_id)->get();

			return view('summary.history', $this->data);
		}

		if ($request->user()->role_id == 3) {
			$this->data['history'] = UserWatchedVacancy::whereUserId($request->user()->user_id)->get();

			return view('vacancy.history', $this->data);
		}
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function getBookMarks(Request $request)
	{
		$this->data['bookmarks'] = $request->user()->bookmarks()->orderBy('updated_at', 'desc')->get();

		return view('user.bookmarks', $this->data);
	}

	/**
	 * @param Request $request
	 */

	public function updateImage(Request $request)
	{
		if ($request->ajax()) {
//			$manager = new ImageManager(array('driver' => 'gd'));
//			$manager->make($request->file('image')->getRealPath())->resize(500, 500)->save(
//				base_path() . '/public/image/user/' . $request->file('image')->getClientOriginalName()
//			);
			$mime = $request->file('image')->getMimeType();

			if (in_array($mime, ['image/jpeg', 'image/png', 'image/gif'])) {


				Image::make($request->file('image')->getRealPath())->resize(500, 500)->save(
					base_path() . '/public/image/user/' . $request->file('image')->getClientOriginalName()
				);

				if (!strstr($request->user()->image, '/user/default.png')) {
					\File::delete(base_path() . '/public/' . $request->user()->image);
				}

				$request->user()->image = 'image/user/' . $request->file('image')->getClientOriginalName();
				$request->user()->save();

				echo json_encode(['class' => 'success', 'message' => 'Аватар успешно изменен!']);
			}
			else {
				echo json_encode(
					['class' => 'danger', 'message' => 'Ошибка!Неверный тип файла!(Доступные типы: jpeg,gif,png)']
				);
			}
		}
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function getPayment(Request $request)
	{
//		$exp_month = [];
//		for ($i = 1; $i < 13; $i++) {
//			$key = strval($i < 10 ? 0 : '') . strval($i);
//			$exp_month[$key] = $i;
//		}
//
//		$exp_year = [];
//		for ($i = 16; $i < 31; $i++) {
//			$value = strval(20) . strval($i);
//			$exp_year[$i] = $value;
//		}
//
//		$this->data['exp_month'] = $exp_month;
//		$this->data['exp_year'] = $exp_year;

		return view('user.liqpay');
	}

	/**
	 * @param Request $request
	 */

	public function postPayment(Request $request)
	{
		if ($request->ajax()) {
			$payment = Payment::create(
				[
					'user_id' => $request->user()->user_id,
					'balance' => $request->user()->balance,
					'amount'  => $request->amount,
					'status'  => 'created'
				]
			);

			$public_key = 'i76628239824';
			$private_key = '2SRGrmp89beMlsUwKOQeZNyYeRbC56c8La3fLDD3';

			$liqpay = new \LiqPay($public_key, $private_key);

			$html = $liqpay->cnb_form(
				array(
					'action'      => 'pay',
					'amount'      => $request->amount,
					'currency'    => \LiqPay::CURRENCY_USD,
					'description' => 'Пополнение счёта на сайте Jobseor на сумму ' . $request->amount . ' USD',
					'order_id'    => $payment->generateOrderId(),
					'version'     => '3',
					'server_url'  => route('payment.callback'),
					'result_url'  => route('user.home'),
					'sandbox'     => '1',//TODO remove dev
				)
			);
			echo $html;
		}
	}

	/**
	 * @param Request $request
	 * @param Payment $payment
	 */

	public function callbackLiqPay(Request $request, Payment $payment)
	{
		$payment = $payment->getOrderByOrdeId($request->data);
		$data = \GuzzleHttp\json_decode(base64_decode($request->data));
		$payment->response = base64_decode($request->data);
		$payment->status = $data->status;
		$payment->card = $data->sender_card_mask2;
		$payment->save();

		$user = $payment->user;

		if ($payment->status == 'success'){
			$user->balance += $payment->amount;
			$user->save();
		}
	}
}
