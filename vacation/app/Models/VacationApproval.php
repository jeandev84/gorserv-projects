<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 *
*/
class VacationApproval extends Model
{

    use HasFactory;


    protected $fillable = [
        'user_id',
        'vacation_id',
        'result_approval',
        'member_id'
    ];


    /**
     * @return HasMany
    */
    public function vacations(): HasMany
    {
         // указываю название первичного ключа (foreignKey) на всякое случае :)
         return $this->hasMany(Vacation::class, 'vacation_id');
    }
}
