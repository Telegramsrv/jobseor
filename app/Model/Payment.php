<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Payment
 *
 * @property int            $user_id
 * @property string         $card
 * @property int            $balance
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereBalance($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereCard($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment wherePaymentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereSumm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereUserId($value)
 * @mixin \Eloquent
 * @property int            $id
 * @property int            $amount
 * @property string         $status
 * @property string         $response
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereResponse($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereStatus($value)
 */
class Payment extends Model
{
	protected $fillable = ['user_id', 'card', 'amount', 'status', 'response', 'balance'];

	public function generateOrderId()
	{
		$data = \GuzzleHttp\json_encode(
			[
				'id'      => $this->id,
				'user_id' => $this->user_id,
				'amount'  => $this->amount,
				'date'    => $this->created_at
			]
		);
		return base64_encode($data);
	}
}
