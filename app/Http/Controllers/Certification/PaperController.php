<?php

namespace App\Http\Controllers\Certification;

use App\Http\Controllers\Controller;
use App\Services\InfiniteFlight\Live;
use Carbon\Carbon;

class PaperController extends Controller {
    private Live $live;

    public function __construct(Live $live)
    {
        $this->live = $live;
        $this->middleware('certificated');
    }

    public function issueActivityCertification()
    {
        $details = $this->live->getUserDetails(\Auth::user()->if_uuid);
        $details = $details[0];
        $data = sprintf(
            file_get_contents(resource_path('views/certification/activity.html')),
            $details->PilotStats->GradeName,
            gmdate('H시간 m분', Carbon::now()->subSeconds($details->PilotStats->TotalFlightTime)->diffInSeconds()),
            number_format($details->OnlineFlights),
            number_format($details->LandingCount),
            number_format($details->PilotStats->TotalXP),
            number_format($details->PilotStats->TotalViolations),
        );
        return view('certification.paper', [
            'title' => '활동',
            'data' => $data,
        ]);
    }

    public function issueGradeCertification()
    {
        $details = $this->live->getUserDetails(\Auth::user()->if_uuid);
        $data = $details[0]->PilotStats->GradeName;
        return view('certification.paper', [
            'title' => 'Grade',
            'data' => sprintf('<h3 class="font-weight-bold">%s</h3>', $data),
        ]);
    }

    public function issueIFATCCertification()
    {
        $details = $this->live->getUserDetails(\Auth::user()->if_uuid);
        if ($details[0]->ATCUserRatings === -1) {
            $data = '<h3 class="text-success font-weight-bold"><i class="fa fa-check-circle-o"></i> IFATC 입니다.</h3>';
        } else {
            $data = '<h3 class="text-danger font-weight-bold">IFATC가 아닙니다.</h3>';
        }
        return view('certification.paper', [
            'title' => 'IFATC',
            'data' => $data,
        ]);
    }
}
