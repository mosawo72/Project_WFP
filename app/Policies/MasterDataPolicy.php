<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class MasterDataPolicy
{
    /**
     * Only admins can delete master data.
     */
    public function delete(User $user): Response
    {
        return ($user->role === 'admin')
            ? Response::allow()
            : Response::deny('Hanya admin yang diizinkan melakukan operasi ini.');
    }
}
