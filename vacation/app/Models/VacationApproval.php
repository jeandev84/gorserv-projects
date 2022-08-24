<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 *
*/
class VacationApproval extends Model
{

    use HasFactory;

    // const PerPage = 10;
    const RESULTS = ['approve', 'decline'];

    protected $fillable = [
        'user_id',
        'vacation_id',
        'result_approval',
        'agreed_by_id'
    ];



    /**
     * @return BelongsTo
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    /**
     * @return HasMany
    */
    public function vacations(): HasMany
    {
         // указываю название первичного ключа (foreignKey) на всякое случае :)
         return $this->hasMany(Vacation::class, 'vacation_id');
    }


    /**
     * @return BelongsTo
    */
    public function agreedBy(): BelongsTo
    {
         return $this->belongsTo(User::class);
    }
}
