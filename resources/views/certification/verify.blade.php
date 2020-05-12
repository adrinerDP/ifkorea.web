@extends('layouts.app')

@section('title', 'Live 인증')

@section('resources')
<script>
    let running = false;
    function checkToken() {
        if (running) return;
        running = true;
        $.ajax({
            url: "{{ route('cert.check') }}",
            method: 'GET',
            success: function (data) {
                running = false;
                if (data.code === 200) return window.location.href = "{{ route('cert.home') }}";
                if (data.code === 404) return alert('콜사인을 검색할 수 없습니다!');
                if (data.code === 400) return alert('인증번호가 정상 발급되지 않았습니다!');
            }
        })
    }
</script>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-check-circle-o"></i> Live 인증
            </div>
            <div class="card-body">
                <h4 class="font-weight-bold text-center my-3">{{ auth()->user()->nickname }}님의 Live 인증 절차</h4>
                <div class="card card-body mb-3">
                    <h4 class="font-weight-bold mb-2"><small>Step</small>1.</h4>
                    <h5 class="m-0 text-center">
                        <span class="badge badge-success">Casual Server</span> 에 접속하세요.
                    </h5>
                </div>
                <div class="card card-body mb-3">
                    <h4 class="font-weight-bold mb-2"><small>Step</small>2.</h4>
                    <h5 class="m-0 text-center">
                        <span class="font-weight-bold">콜사인</span>을 <span class="badge badge-danger">{{ $verify->token }}</span> 으로 변경하세요.
                    </h5>
                </div>
                <div class="card card-body mb-3">
                    <h4 class="font-weight-bold mb-2"><small>Step</small>3.</h4>
                    <h5 class="m-0 text-center">
                        <span class="badge badge-success">{{ $verify->expires_at->format('H시 i분 s초') }}</span> 까지 아래 버튼을 누르세요.
                    </h5>
                </div>
                <a href="javascript:checkToken();" class="btn btn-success btn-block btn-lg">
                    <i class="fa fa-check"></i> 인증 확인하기
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
