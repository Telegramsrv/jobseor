<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Payment
 *
 * @property int $payment_id
 * @property int $user_id
 * @property string $card
 * @property int $balance
 * @property int $summ
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereBalance($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereCard($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment wherePaymentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereSumm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereUserId($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    protected $primaryKey = 'payment_id';
}
