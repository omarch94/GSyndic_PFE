@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Dashboard</h4>
    </div>
@stop

@section('content')
    @include('components.messages_alert')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="statistic bg-primary p-4 d-flex align-items-center rounded" >
                    <div class="icon col-4">
                        <span style="font-size:60px">
                            <i class="fas fa-users"></i>
                        </span>
                    </div>
                    <div class="col-8 pl-3 ">
                        <div class="value" style="font-size:65px; line-height:65px ; "><b>{{\App\Models\User::all()->count()}}</b></div>
                        <div class="label" style="font-size:24px">Utilisateurs</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="statistic bg-success p-4 d-flex align-items-center rounded">
                    <div class="icon col-4">
                        <span style="font-size:60px">
                            <i class="fas fa-user-tag"></i>
                        </span>
                    </div>
                    <div class="col-8 pl-3">
                        <div class="value" style="font-size:65px; line-height:65px"><b>{{\Spatie\Permission\Models\Role::all()->count()}}</b></div>
                        <div class="label" style="font-size:24px">Rôles</div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="statistic bg-warning p-4 d-flex align-items-center rounded">
                    <div class="icon col-4">
                    <span style="font-size:60px">
                        <i class="fas fa-building"></i>
                    </span>
                    </div>
                    <div class="col-8 pl-3">
                        <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Immeuble::all()->count()}}</b></div>
                        <div class="label" style="font-size:24px">Immeubles</div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="statistic bg-secondary p-4 d-flex align-items-center rounded">
                        <div class="icon col-4">
                        <span style="font-size:60px">
                            <i class="fas fa-home"></i>
                        </span>
                        </div>
                        <div class="col-8 pl-3">
                            <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Copropriete::all()->count()}}</b></div>
                            <div class="label" style="font-size:24px">Copropriétés</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="statistic bg-danger p-4 d-flex align-items-center rounded">
                        <div class="icon col-4">
                        <span style="font-size:60px">
                            <i class="fas fa-exclamation-circle"></i>
                        </span>
                        </div>
                        <div class="col-8 pl-3">
                            <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Reclamation::all()->count()}}</b></div>
                            <div class="label" style="font-size:24px">Réclamations</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="statistic bg-info p-4 d-flex align-items-center rounded">
                        <div class="icon col-4">
                        <span style="font-size:60px">
                            <i class="fas fa-calendar"></i>
                        </span>
                        </div>
                        <div class="col-8 pl-3">
                            <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Reunion::all()->count()}}</b></div>
                            <div class="label" style="font-size:24px">Réunions</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="statistic bg-primary p-4 d-flex align-items-center rounded">
                        <div class="icon col-4">
                        <span style="font-size:60px">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </span>
                        </div>
                        <div class="col-8 pl-3">
                            <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Facture::all()->count()}}</b></div>
                            <div class="label" style="font-size:24px">Factures</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="statistic bg-success p-4 d-flex align-items-center rounded">
                        <div class="icon col-4">
                        <span style="font-size:60px">
                            <i class="fas fa-money-bill-wave"></i>
                        </span>
                        </div>
                        <div class="col-8 pl-3">
                            <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Paiment::all()->count()}}</b></div>
                            <div class="label" style="font-size:24px">Paiements</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="statistic bg-info p-4 d-flex align-items-center rounded">
                        <div class="icon col-4">
                        <span style="font-size:60px">
                            <i class="fas fa-chart-line"></i>
                        </span>
                        </div>
                        <div class="col-8 pl-3">
                            <div class="value" style="font-size:65px; line-height:65px"><b>{{\App\Models\Charge::all()->count()}}</b></div>
                            <div class="label" style="font-size:24px">Charges</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">

            </div>
        </div>
    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!');
$('.value').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    </script>
    
@stop
