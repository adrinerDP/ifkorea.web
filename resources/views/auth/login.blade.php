@extends('layouts.app')

@section('title', '로그인')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-sign-in-alt"></i> 로그인
                </div>
                <div class="card-body text-center p-4">
                    <h5 class="mb-4">
                        간단한 <span class="font-weight-bold">네이버 아이디로 로그인 후</span>, <br>
                        다양한 기능을 이용할 수 있습니다!
                    </h5>

                    <ul class="promotions list-unstyled font-weight-bold text-success mb-4">
                        <li class="my-2"><i class="fa fa-check"></i> 가상항공사 기능 이용</li>
                        <li class="my-2"><i class="fa fa-check"></i> 편리한 인증센터 이용</li>
                        <li class="my-2"><i class="fa fa-check"></i> 다양한 항로정보 조회</li>
                    </ul>

                    <a href="{{ route('auth.naver.redirect') }}">
                        <img src="{{ asset('images/login_with_naver.png') }}" alt="네이버아이디로로그인 버튼" style="max-width: 200px">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
