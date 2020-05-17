@extends('adminlte::page')

@section('title', '관리자 대시보드')

@section('content_header')
    <h1 class="font-weight-bold">
        <i class="fa fa-home"></i> 관리자 페이지 홈
    </h1>
@endsection

@section('content')
    <section class="row" id="information">
        <div class="col-md-3">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ number_format(App\Models\User::count()) }}</h3>
                    <p>전체 회원 수</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>0</h3>
                    <p>누적 운항 횟수</p>
                </div>
                <div class="icon">
                    <i class="fas fa-plane-departure"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ number_format(\App\Models\Airport::count()) }}</h3>
                    <p>DB 보유 공항 목록</p>
                </div>
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ number_format(\App\Models\Airport::count()) }}</h3>
                    <p>항로 아카이브 등록 수</p>
                </div>
                <div class="icon">
                    <i class="fas fa-list-alt"></i>
                </div>
            </div>
        </div>
    </section>

    <section class="row" id="live_status">
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h4>Training Server</h4>
                    <p>온라인</p>
                    <p>00 / 00</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h4>Casual Server</h4>
                    <p>온라인</p>
                    <p>00 / 00</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h4>Expert Server</h4>
                    <p>온라인</p>
                    <p>00 / 00</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check"></i>
                </div>
            </div>
        </div>
    </section>

    <section id="aquila">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-list fa-fw"></i> AQUILA Scheduled Task Queues
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-borderless m-0">
                        <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>작업 명</th>
                            <th>설명</th>
                            <th>상태</th>
                            <th>예정 작업 일시</th>
                            <th>예약자</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>checkFlights</td>
                            <td>Check online members flights.</td>
                            <td><i class="fa fa-circle text-warning"></i> Pending</td>
                            <td>2020-05-17 23:00</td>
                            <td><i class="fa fa-terminal"></i> SYSTEM</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>checkFlights</td>
                            <td>Check online members flights.</td>
                            <td><i class="fa fa-circle text-warning"></i> Pending</td>
                            <td>2020-05-17 23:05</td>
                            <td><i class="fa fa-terminal"></i> SYSTEM</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>checkFlights</td>
                            <td>Check online members flights.</td>
                            <td><i class="fa fa-circle text-warning"></i> Pending</td>
                            <td>2020-05-17 23:10</td>
                            <td><i class="fa fa-terminal"></i> SYSTEM</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fa fa-plane-departure fa-fw"></i> AQUILA Flights Tracking
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-borderless m-0">
                        <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>콜사인</th>
                            <th>파일럿</th>
                            <th>인식 노선</th>
                            <th>DEP BLOCK TIME</th>
                            <th>ARR BLOCK TIME</th>
                            <th>고도</th>
                            <th>속도</th>
                            <th>VS</th>
                            <th>상태</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>IFK1001</td>
                            <td><i class="fa fa-user fa-fw"></i> 이준수</td>
                            <td>RKSI <i class="fa fa-angle-right"></i> RKPC</td>
                            <td><i class="fa fa-check text-success"></i> 20200517 2300+9</td>
                            <td><i class="fa fa-circle text-warning"></i> Pending</td>
                            <td>24000ft</td>
                            <td>432kt</td>
                            <td>-12ft/m</td>
                            <td><i class="fa fa-plane"></i> CRUISING</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>IFK1001</td>
                            <td><i class="fa fa-user fa-fw"></i> 이준수</td>
                            <td>RKSI <i class="fa fa-angle-right"></i> RKPC</td>
                            <td><i class="fa fa-check text-success"></i> 20200517 2310+9</td>
                            <td><i class="fa fa-circle text-warning"></i> Pending</td>
                            <td>16450ft</td>
                            <td>332kt</td>
                            <td>-800ft/m</td>
                            <td><i class="fa fa-plane-arrival"></i> DESCENDING</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>IFK1001</td>
                            <td><i class="fa fa-user fa-fw"></i> 이준수</td>
                            <td>RKSI <i class="fa fa-angle-right"></i> RKPC</td>
                            <td><i class="fa fa-check text-success"></i> 20200517 2321+9</td>
                            <td><i class="fa fa-circle text-warning"></i> Pending</td>
                            <td>1320ft</td>
                            <td>164kt</td>
                            <td>+2030ft/m</td>
                            <td><i class="fa fa-plane-departure"></i> CLIMBING</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        h1, h2, h3, h4, h5, h6 {
            margin: 0;
            font-weight: bold;
        }
        p {
            margin: 0;
        }
        .card-header {
            font-weight: bold;
        }
    </style>
@endsection
