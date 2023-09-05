<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property Carbon expired_at
 * @property string code
 * @property int user_id
 * @property int confirmation_type_id
 */
class Confirmation extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'user_id', 'confirmation_type_id', 'expired_at'];
    protected $dates = ['expired_at'];

    protected $hidden = ['code'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function confirmationType(): HasOne
    {
        return $this->hasOne(ConfirmationType::class);
    }
}
