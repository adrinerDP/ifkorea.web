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
