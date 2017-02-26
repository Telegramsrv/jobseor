<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Payment
 *
 * @property int $payment_id
 * @property int $user_id
 * @property string $card
 * @property int $balance
 * @property int $summ
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
 */
class Payment extends Model
{
    protected $primaryKey = 'payment_id';
}
