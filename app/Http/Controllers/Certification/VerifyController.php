<?php

namespace App\Http\Controllers\Certification;

use App\Http\Controllers\Controller;
use App\Services\InfiniteFlight\Live;
use App\Services\InfiniteFlightKorea\Token;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;

class VerifyController extends Controller {
    private Live $live;

    /**
     * VerifyController constructor.
     * @param Live $live
     */
    public function __construct(Live $live)
    {
        $this->middleware('logged.in');
        $this->live = $live;
    }

    /**
     * Make verification with token
     * @param Token $token
     * @return Renderable
     */
    public function makeVerify(Token $token)
    {
        return view('certification.verify', [
            'verify' => $token->findOrCreate(\Auth::user())
        ]);
    }

    /**
     * Check if the user has a valid callsign with the token.
     * @param Token $token
     * @return JsonResponse
     */
    public function checkToken(Token $token)
    {
        $searchedToken = $token->find(\Auth::user());
        if (is_null($searchedToken)) return response()->json(['code' => 400]);

        $flight = $this->live->getFlightWithCallSign(
            $this->live->getSessionWithName('Casual Server'),
            $searchedToken->token
        );
        if (is_null($flight)) return response()->json(['code' => 404]);

        $token->expireToken($searchedToken);

        $searchedToken->user->if_uuid = $flight->UserID;
        $searchedToken->user->certificated_at = Carbon::now();
        $searchedToken->save();

        return response()->json(['code' => 200]);
    }
}
