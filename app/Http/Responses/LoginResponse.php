<?php

namespace App\Http\Responses;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request): Response
    {
        /** @var Request $request */
        $user = $request->user();

        if ($user?->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('dashboard');
    }
}
