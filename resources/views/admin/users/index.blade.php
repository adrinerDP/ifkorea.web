@extends('adminlte::page')

@section('title', '사용자 목록')

@section('content_header')
    <h1 class="font-weight-bold">
        <i class="fa fa-users"></i> 전체 사용자 목록
    </h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            전체 사용자 목록
        </div>
        <div class="card-body p-2">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-borderless">
                    <thead class="thead-dark">
                    <tr>
                        <th width="5%">#</th>
                        <th width="5%">이름</th>
                        <th width="10%">닉네임</th>
                        <th width="15%">이메일</th>
                        <th width="5%">소셜</th>
                        <th width="10%">Live 인증</th>
                        <th width="25%">IF UUID</th>
                        <th width="15%">가입 일시</th>
                        <th width="10%">작업</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->nickname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ strtoupper($user->sns_type) }}</td>
                            <td>
                                @if(!is_null($user->certificated_at))
                                    <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="left"
                                       title="{{ $user->certificated_at->format('Y-m-d에 인증됨!') }}"></i>
                                @else
                                    <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="left"
                                       title="인증 안됨!"></i>
                                @endif
                            </td>
                            <td>{{ $user->if_uuid ?? '-' }}</td>
                            <td>{{ $user->created_at->format('Y/m/d H:i') }}</td>
                            <td>
                                <a href="#" class="badge badge-success" data-toggle="tooltip" data-placement="left"
                                   data-user-id="{{ $user->id }}" title="권한 변경">
                                    <i class="fa fa-fw fa-user-md"></i>
                                </a>
                                <a href="#" class="badge badge-info" data-toggle="tooltip" data-placement="left"
                                   data-user-id="{{ $user->id }}" title="정보 수정">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </a>
                                <a href="#" class="badge badge-danger" data-toggle="tooltip" data-placement="left"
                                   data-user-id="{{ $user->id }}" title="이용 정지">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('load_js')
    <script>
        $(document).ready(function () {
            $('table').DataTable();
        });
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
