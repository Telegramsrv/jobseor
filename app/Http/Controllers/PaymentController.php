<?php

namespace App\Http\Controllers;

use App\Model\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function getPayment(Request $request)
	{
		$this->middleware('auth');
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
		$this->middleware('auth');
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
