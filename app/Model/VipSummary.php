<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\VipSummary
 *
 * @property int $id
 * @property int $summary_id
 * @property int $settings_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Model\VipSummarySettings $settings
 * @property-read \App\Model\Summary $summary
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipSummary whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipSummary whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipSummary whereSettingsId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipSummary whereSummaryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipSummary whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $end_date
 * @method static \Illuminate\Database\Query\Builder|\App\Model\VipSummary whereEndDate($value)
 */
class VipSummary extends Model
{
	protected $fillable = [ 'summary_id', 'settings_id', 'end_date'];

    public function summary()
    {
    	return $this->belongsTo('App\Model\Summary', 'summary_id');
    }

    public function settings()
    {
    	return $this->belongsTo('App\Model\VipSummarySettings', 'settings_id');
    }

	public function timeleft()
	{
		$date1 = new \DateTime(date('Y-m-d H:i:s'));
		$date2 = new \DateTime($this->end_date);
		return $date2->diff($date1);
	}

	public function timeleftToString()
	{
		if ($this->timeleft()->invert)
			return $this->timeleft()->format('%d дней %h:%i:%s');
		else return '-';
	}
}
