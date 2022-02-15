@extends('layouts.page')
@section('main-container')
<div class="d-flex">
    @include('layouts.sidebar')
    <div class="content">
        <header class="border-bottom header px-5" style="border-color: var(--border-color) !important;">
            <div class="d-flex">
                <a id="collapse_sidebar" class="btn btn-main-color square-btn me-2"><i class="fal fa-angle-double-left"></i></a>
                <a href="#" class="btn btn-main-color square-btn"><i class="fal fa-bell"></i></a>
            </div>
        </header>
        <div class="p-5">
            <div class="row">
                <div class="col-md-2">
                    <div class="server-card mb-3">
                        <div class="m-4">
                            <h5 class="m-0">Counter-Strike 1.6</h5>
                            <p class="m-0">Servers</p>
                        </div>
                        <a href="#" class="btn btn-card-color w-100 rounded-0">Vezi mai multe</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="server-card mb-3">
                        <div class="m-4">
                            <h5 class="m-0">Minecraft</h5>
                            <p class="m-0">Servers</p>
                        </div>
                        <a href="#" class="btn btn-card-color w-100 rounded-0">Vezi mai multe</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="server-card mb-3">
                        <div class="m-4">
                            <h5 class="m-0">Multi Theft Auto</h5>
                            <p class="m-0">Servers</p>
                        </div>
                        <a href="#" class="btn btn-card-color w-100 rounded-0">Vezi mai multe</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="server-card mb-3">
                        <div class="m-4">
                            <h5 class="m-0">San Andreas MP</h5>
                            <p class="m-0">Servers</p>
                        </div>
                        <a href="#" class="btn btn-card-color w-100 rounded-0">Vezi mai multe</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="server-card mb-3">
                        <div class="m-4">
                            <h5 class="m-0">Counter-Strike 1.6</h5>
                            <p class="m-0">Servers</p>
                        </div>
                        <a href="#" class="btn btn-card-color w-100 rounded-0">Vezi mai multe</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="server-card mb-3">
                        <div class="m-4">
                            <h5 class="m-0">Counter-Strike 1.6</h5>
                            <p class="m-0">Servers</p>
                        </div>
                        <a href="#" class="btn btn-card-color w-100 rounded-0">Vezi mai multe</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4 mt-3">
                    <div class="service-status">
                        <i class="fal fa-server"></i>
                        <h5 class="m-0">{{ $data['server']->attributes->name }}</h5>
                        <p class="text-second m-0">{{$data['node']->attributes->ip}}:{{$data['node']->attributes->port}}</p>
                    </div>
                    @if ($data['server']->attributes->suspended)
                        <div class="service-suspended">
                            Suspendat
                        </div>
                    @elseif ($data['server']->attributes->is_installing)
                        <div class="service-installing">
                            Suspendat
                        </div>
                    @elseif ($data['server']->attributes->is_transferring)
                        <div class="service-transferring">
                            Suspendat
                        </div>
                    @else
                        <div class="service-active">
                            Activ
                        </div>
                    @endif

                </div>
                <div class="service-list col-md-8 mb-4 mt-3">
                    <div class="service-header">
                        <h6 class="m-0">{{ $data['server']->attributes->name }}</h6>
                    </div>
                    <div class="service-body">
                        <div class="service">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-second">Numele serverului:</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $data['server']->attributes->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-second">IP-ul serverului(IP:PORT):</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{$data['node']->attributes->ip}}:{{$data['node']->attributes->port}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-second">Următoarea scandență:</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>{{ $data['server']->attributes->exp_date }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-second">Data înregistrării:</p>
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $regDate = $data['server']->attributes->created_at;
                                            $newRegDate = substr($regDate, 0, strpos($regDate, 'T'));
                                        @endphp
                                        <p>{{ $newRegDate }}</p>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-main-color px-4" href="{{ $data['sftp_link'] }}">LUNCH SFTP</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
