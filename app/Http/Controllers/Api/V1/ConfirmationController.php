<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\ConfirmationProviderServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Confirmation;
use App\Models\User;
use App\Services\Confirmation\ConfirmationService;

class ConfirmationController extends Controller
{
    public function create(
        User                                 $user,
        ConfirmationProviderServiceInterface $confirmationProviderService,
        ConfirmationService                  $confirmationService
    ): Confirmation
    {
        return $confirmationService->sendConfirmation($user, $confirmationProviderService);
    }
}
