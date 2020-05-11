<?php

namespace App\Services\InfiniteFlightKorea;

use App\Models\User;
use App\Models\Verify;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;

/**
 * Token Verification Service for Infinite Flight Korea
 *
 * @package App\Services\InfiniteFlightKorea
 * @author adrinerDP (me@adrinerdp.co)
 */
class Token {
    /**
     * @var int Token Persistent time in minutes.
     */
    private int $duration = 5;

    /**
     * Return the token of given user.
     * @param User|Authenticatable $user
     * @return Collection
     */
    public function find(User $user)
    {
        return $user->verifications()->get()->last();
    }

    /**
     * Check if the user has the token or create a new one.
     * @param User|Authenticatable $user
     * @return Collection
     */
    public function findOrCreate(User $user)
    {
        if ($this->hasValidToken($user)) {
            return $this->find($user);
        } else {
            return $this->issueToken($user, $this->duration);
        }
    }

    /**
     * Destroy the token
     * @param Verify|Collection $verify
     * @return void
     */
    public function expireToken(Verify $verify)
    {
        $verify->expired = true;
        $verify->save();
    }

    /**
     * Check is the user has a valid token.
     * @param User|Authenticatable $user
     * @return boolean
     */
    private function hasValidToken(User $user)
    {
        $verifications = $user->verifications()->get();

        if ($verifications->isEmpty()) return false;

        foreach ($verifications as $verification) {
            if ($verification->expires_at->diffInSeconds(null, false) > 0) {
                $this->expireToken($verification);
                continue;
            }
            if (!$verification->expired) return true;
        }

        return false;
    }

    /**
     * Issue a new token for the user.
     * @param User|Authenticatable $user
     * @param integer $duration
     * @return Collection
     */
    private function issueToken(User $user, int $duration)
    {
        return Verify::create([
            'user_id' => $user->id,
            'token' => strtoupper(\Str::random(8)),
            'expires_at' => Carbon::now()->addMinutes($duration)->toDateTime(),
        ]);
    }
}

