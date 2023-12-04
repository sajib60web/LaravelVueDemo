<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'members';

    function getMyTotalSavingAttribute()
    {
        return $this->total_saving()->sum('savings_amount');
    }

    function getMyTotalNumberOfDueAttribute()
    {
        $two_reg_date = $this->two_reg_date;
        $total_saving_no = $this->total_saving()->count();
        if ($total_saving_no > 0) {
            $saving_data =  $this->total_saving()->orderByDesc('id')->first();
            $day_num = Carbon::parse($saving_data->two_saving_date)->diffInDays(date('Y-m-d'));
            return ($day_num + 1) - 0;
        } else {
            $day_num = Carbon::parse($two_reg_date)->diffInDays(date('Y-m-d'));
            return ($day_num + 1) - 0;
        }
    }

    function getMyTotalDueAttribute()
    {
        $num_of_due = $this->my_total_number_of_due;
        $saving_num = $this->number_of_savings;
        $number_of_savings = ($saving_num * 10);
        return ($num_of_due * $number_of_savings) - 0;
    }

    function getMyTotalAdvanceAttribute()
    {

        return $this->total_saving()
            ->where('two_saving_date', '>', date('Y-m-d'))
            ->sum('savings_amount');
    }

    public function total_saving()
    {
        return $this->hasMany(SavingsPay::class, 'member_id', 'id');
    }
}
