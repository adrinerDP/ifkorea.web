@extends('layouts.app')

@section('resources')
    <script>
        let running = false;
        function loadData() {
            if (running) return;
            running = true;
            $('.fa-refresh').addClass('fa-spin');
            $.ajax({
                url: "{{ route('home.data') }}",
                method: 'POST',
                success: function (data) {
                    running = false;
                    $('.fa-refresh').removeClass('fa-spin');
                    $('#server_info').html(data.servers);
                    $('#FIR_info').html(data.players);
                }
            })
        }
        $(() => {
            loadData();
        });
    </script>
@endsection

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
    <h4 class="text-center font-weight-bold my-4">
        인게임 정보 <a href="javascript:loadData();" class="badge badge-dark"><i class="fa fa-refresh"></i></a>
    </h4>
    <section id="server_info">
        <div class="card card-body mb-3 text-center">
            <h4 class="font-weight-bold text-muted m-0">
                <i class="fa fa-circle-notch fa-spin"></i>
                서버 정보를 가져오는 중입니다.
            </h4>
        </div>
        <div class="card card-body mb-3 text-center">
            <h4 class="font-weight-bold text-muted m-0">
                <i class="fa fa-circle-notch fa-spin"></i>
                파일럿 정보를 가져오는 중입니다.
            </h4>
        </div>
    </section>
    <section id="FIR_info">
        <div class="card card-body mb-3 text-center">
            <h4 class="font-weight-bold text-muted m-0">
                <i class="fa fa-circle-notch fa-spin"></i>
                관제석 정보를 가져오는 중입니다.
            </h4>
        </div>
    </section>
</div>
@endsection
