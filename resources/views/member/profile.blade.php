@extends('layouts.app')

@section('title', auth()->user()->name . '님의 프로필')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-user"></i> 사용자 정보
                </div>
                <div class="card-body text-center">
                    <img src="{{ auth()->user()->avatar }}" class="mb-4" style="width:7rem;border-radius:100%">
                    <h3 class="font-weight-bold mb-2">
                        {{ auth()->user()->nickname }}
                        <small class="text-muted">({{ auth()->user()->name }})</small>
                    </h3>
                    <i class="fa fa-envelope-o"></i> {{ auth()->user()->email }}
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-id-badge"></i> 나의 뱃지
                </div>
                <div class="card-body">
                    @if(!is_null($details))
                        <span class="badge badge-success"><i class="fa fa-check"></i> Live 인증</span>
                        @if($details->ATCUserRatings !== 0)
                            <span class="badge badge-dark"><i class="fa fa-headphones"></i> IFATC</span>
                        @endif
                    @endif
                    @if(auth()->user()->admin)
                        <span class="badge badge-warning"><i class="fa fa-user-md"></i> 관리자</span>
                    @endif
                </div>
            </div>
            @if(!is_null($details))
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-gamepad"></i> 인게임 정보
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group border-0">
                            <li class="list-group-item">
                                <span class="font-weight-bold">Grade</span>
                                <span class="fa-pull-right">{{ $details->PilotStats->GradeName }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">비행 시간</span>
                                <span class="fa-pull-right">{{ gmdate('H시간 m분', \Carbon\Carbon::now()->subSeconds($details->PilotStats->TotalFlightTime)->diffInSeconds()) }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">비행 횟수</span>
                                <span class="fa-pull-right">{{ number_format($details->OnlineFlights) }}회</span>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">착륙 횟수</span>
                                <span class="fa-pull-right">{{ number_format($details->PilotStats->TotalLandings) }}회</span>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">XP</span>
                                <span class="fa-pull-right">{{ number_format($details->PilotStats->TotalXP) }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold">Violations</span>
                                <span class="fa-pull-right">{{ number_format($details->PilotStats->TotalViolations) }}회</span>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-plane-departure"></i> 최근 비행 기록
                </div>
                <div class="card-body text-center py-3">
                    <i class="fa fa-exclamation-triangle text-warning fa-3x mb-3"></i>
                    <h4 class="font-weight-bold m-0">서비스 준비 중입니다.</h4>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-plane-departure"></i> 나의 항로 아카이브
                </div>
                <div class="card-body text-center py-3">
                    <i class="fa fa-exclamation-triangle text-warning fa-3x mb-3"></i>
                    <h4 class="font-weight-bold m-0">서비스 준비 중입니다.</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
