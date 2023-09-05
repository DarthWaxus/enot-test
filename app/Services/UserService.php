<?php

namespace App\Services;

use App\Exceptions\NoConfirmationException;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class UserService
{
    /**
     * @throws NoConfirmationException
     */
    public function update(User $user, array $data): User
    {
        if (!$this->hasConfirmation($user, Arr::get($data, 'confirmation_code'))) {
            throw new NoConfirmationException();
        }
        $user->update($data);
        return $user;
    }

    /**
     * @throws NoConfirmationException
     */
    public function hasConfirmation(User $user, string $code): bool
    {
        $confirmation = $user->confirmations()->where('expired_at', '>=', Carbon::now())->latest()->first();
        return ($confirmation && $confirmation->code === $code);
    }
}
