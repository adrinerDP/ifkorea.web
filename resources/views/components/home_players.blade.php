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
