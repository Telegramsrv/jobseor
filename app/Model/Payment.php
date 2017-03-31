<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Model\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property string $card
 * @property int $balance
 * @property int $amount
 * @property string $status
 * @property string $response
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereBalance($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereCard($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereResponse($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Payment whereUserId($value)
 * @mixin \Eloquent
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

	public function getOrderByOrdeId($orderId)
	{
		$data = base64_decode($orderId);

		return $this
			->whereId($data->id)
			->whereUserId($data->user_id)
//			->whereDate($data->date)
			->firstOrFail();
	}

	public function user()
	{
		return $this->belongsTo('App\Model\User', 'user_id');
	}
}
