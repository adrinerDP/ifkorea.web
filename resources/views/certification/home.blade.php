@extends('layouts.app')

@section('title', '인증센터 홈')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-check-circle-o"></i> 인증센터 홈
                </div>
                <div class="card-body">
                    @if(!is_null(auth()->user()->certificated_at))
                        <div class="text-muted mb-2">
                            <h5 class="mb-1 font-weight-bold text-primary">IFK 인증센터에 오신 것을 환영합니다!</h5>
                            만약 계정이 변경된 경우, Live 재인증을 진행 해 주세요. <br>
                            문의사항은 IFK 카카오 채널로 남겨주시기 바랍니다.
                        </div>
                        <hr class="pt-3 pb-1 m-0">
                        <a href="{{ route('cert.paper.activity') }}" class="btn btn-outline-dark btn-block  mb-3">
                            인게임 활동 인증서 발급
                        </a>
                        <a href="{{ route('cert.paper.grade') }}" class="btn btn-outline-dark btn-block mb-3">
                            Grade 인증서 발급
                        </a>
                        <a href="{{ route('cert.paper.ifatc') }}" class="btn btn-outline-dark btn-block mb-3">
                            IFATC 인증서 발급
                        </a>
                        <hr>
                        <a href="{{ route('cert.verify') }}" class="btn btn-danger btn-block btn-sm">
                            <i class="fa fa-refresh"></i> Live 재인증
                        </a>
                    @else
                        <div class="text-center">
                            <h4 class="font-weight-bold my-2">
                                <i class="fa fa-exclamation-triangle"></i> Live 인증이 필요합니다
                            </h4>
                            <p class="m-0 text-black-50">지금 바로 인증 후, 풍성한 기능을 누려보세요!</p>
                            <hr>
                            <a href="{{ route('cert.verify') }}" class="btn btn-success btn-block">
                                <i class="fa fa-arrow-right"></i> Live 인증하러 가기
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
