@extends('layouts.app')

@section('title', $title.' 인증서 발급')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-check-circle-o"></i> IF KOREA {{ $title }} 인증서
                </div>
                <div class="card-body text-center">
                    <div class="pt-3 pb-1">
                        <h2 class="font-weight-bold">인증서</h2>
                    </div>
                    <div class="py-1">
                        <small class="d-block">
                            <span class="font-weight-bold">{{ \Carbon\Carbon::now()->format('Y년 m월 d일 H시 i분') }}</span>에 발급된,
                        </small>
                        <span class="font-weight-bold">{{ auth()->user()->nickname }}</span>님의 {{ $title }} 인증서 입니다.
                    </div>
                    <hr>
                    {!! $data !!}
                    <hr>
                    <h6 class="mb-2">
                        {{ \Carbon\Carbon::now()->format('Y년 m월 d일') }}
                    </h6>
                    <h5 class="font-weight-bold">
                        <img src="{{ asset('images/ifk_logo.png') }}" style="width:2rem;height:auto;margin-top:-6px;">
                        인피니트 플라이트 한국 커뮤니티
                    </h5>
                    <hr>
                    <a href="{{ route('cert.home') }}" class="btn btn-primary"><i class="fa fa-home"></i> 인증센터 홈</a>
                </div>
            </div>
        </div>
    </div>
@endsection
