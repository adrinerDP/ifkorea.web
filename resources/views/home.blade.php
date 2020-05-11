@extends('layouts.app')

@section('content')
<div class="container">
    <img class="w-100 mb-3" src="{{ asset('images/hero.png') }}">
    <h4 class="text-center font-weight-bold my-4">
        유용한 링크
    </h4>
    <section id="intro" class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-bullhorn"></i> 공지사항
                </div>
                <a href="https://cafe.naver.com/xp9m/menu/1" target="_blank" class="card-body text-right">
                    <i class="fa fa-arrow-right"></i> 이동하기
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-book"></i> 규칙
                </div>
                <a href="https://cafe.naver.com/xp9m/menu/164" target="_blank" class="card-body text-right">
                    <i class="fa fa-arrow-right"></i> 이동하기
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-calendar"></i> 이벤트 일정
                </div>
                <a href="https://cafe.naver.com/xp9m/menu/140" target="_blank" class="card-body text-right">
                    <i class="fa fa-arrow-right"></i> 이동하기
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-question-circle"></i> 질문과 답변
                </div>
                <a href="https://cafe.naver.com/xp9m/menu/74" target="_blank" class="card-body text-right">
                    <i class="fa fa-arrow-right"></i> 이동하기
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-ticket"></i> 팁&강좌
                </div>
                <a href="https://cafe.naver.com/xp9m/menu/40" target="_blank" class="card-body text-right">
                    <i class="fa fa-arrow-right"></i> 이동하기
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-list-alt"></i> 항로 아카이브
                </div>
                <a href="https://cafe.naver.com/xp9m/22728" target="_blank" class="card-body text-right">
                    <i class="fa fa-arrow-right"></i> 이동하기
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-comment-alt"></i> IFK 카카오 채널
                </div>
                <a href="https://pf.kakao.com/_nDxdwl" target="_blank" class="card-body text-right">
                    <i class="fa fa-arrow-right"></i> 이동하기
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-video"></i> Youtube
                </div>
                <a href="https://www.youtube.com/channel/UC304468BfXaIAubmOIL8JpA" target="_blank" class="card-body text-right">
                    <i class="fa fa-arrow-right"></i> 이동하기
                </a>
            </div>
        </div>
    </section>
    <section id="server_info">
        <h4 class="text-center font-weight-bold my-4">
            인게임 정보
        </h4>
        <div class="row">
            @foreach($sessions as $session)
                <div class="col-md-4">
                    <div class="card mb-3 bg-success">
                        <div class="card-body">
                            <h5 class="float-left font-weight-bold m-0">
                                <i class="fa fa-check-circle text-success"></i> {{ $session->Name }}
                            </h5>
                            <p class="float-right m-0">
                                {{ $session->UserCount }} / {{ $session->MaxUsers }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section id="FIR_info">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-plane-departure"></i> IFK 비행 정보
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-striped m-0" style="min-width: 960px">
                        <thead class="thead-light">
                        <tr>
                            <th width="20%">콜사인</th>
                            <th width="20%">파일럿</th>
                            <th width="15%">SPD</th>
                            <th width="15%">HDG</th>
                            <th width="15%">ALT</th>
                            <th width="15%">VS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($flights as $flight)
                            <tr>
                                <td><span class="font-weight-bold">{{ $flight->CallSign }}</span></td>
                                <td><span class="font-weight-bold">{{ $flight->DisplayName }}</span></td>
                                <td>{{ (int) $flight->Speed }}kt</td>
                                <td>{{ (int) $flight->Heading }}&deg;</td>
                                <td>{{ (int) $flight->Altitude }}ft</td>
                                <td>{{ (int) $flight->VerticalSpeed }}ft/m</td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="6" class="py-3">
                                    <i class="fa fa-exclamation-triangle fa-3x d-block mb-2"></i>
                                    <h3 class="font-weight-bold m-0">비행중인 항공기가 없습니다.</h3>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center text-muted">
                    <i class="fa fa-angle-left"></i> 목록이 보이지 않을 경우 스크롤 해보세요! <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-user-md"></i> RKRR FIR 관제사 정보
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-striped m-0">
                        <thead class="thead-light">
                        <tr>
                            <th width="20%">공항</th>
                            <th width="20%">관제석</th>
                            <th width="60%">관제사</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($atcs as $atc)
                            <tr>
                                <td><span class="font-weight-bold">{{ $atc->Name }}</span></td>
                                <td><span class="font-weight-bold">{{ \App\Services\InfiniteFlight\Wrapper::getFrequencyType($atc->Type) }}</span></td>
                                <td>{{ $atc->UserName }}</td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="6" class="py-3">
                                    <i class="fa fa-exclamation-triangle fa-3x d-block mb-2"></i>
                                    <h3 class="font-weight-bold m-0">열려있는 관제석이 없습니다.</h3>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
