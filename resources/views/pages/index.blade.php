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
                        <a href="#" class="btn btn-card-color w-100 rounded-0">{{__('view_more')}}</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="server-card mb-3">
                        <div class="m-4">
                            <h5 class="m-0">Minecraft</h5>
                            <p class="m-0">Servers</p>
                        </div>
                        <a href="#" class="btn btn-card-color w-100 rounded-0">{{__('view_more')}}</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="server-card mb-3">
                        <div class="m-4">
                            <h5 class="m-0">Multi Theft Auto</h5>
                            <p class="m-0">Servers</p>
                        </div>
                        <a href="#" class="btn btn-card-color w-100 rounded-0">{{__('view_more')}}</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="server-card mb-3">
                        <div class="m-4">
                            <h5 class="m-0">San Andreas MP</h5>
                            <p class="m-0">Servers</p>
                        </div>
                        <a href="#" class="btn btn-card-color w-100 rounded-0">{{__('view_more')}}</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="server-card mb-3">
                        <div class="m-4">
                            <h5 class="m-0">Counter-Strike 1.6</h5>
                            <p class="m-0">Servers</p>
                        </div>
                        <a href="#" class="btn btn-card-color w-100 rounded-0">{{__('view_more')}}</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="server-card mb-3">
                        <div class="m-4">
                            <h5 class="m-0">Counter-Strike 1.6</h5>
                            <p class="m-0">Servers</p>
                        </div>
                        <a href="#" class="btn btn-card-color w-100 rounded-0">{{__('view_more')}}</a>
                    </div>
                </div>
            </div>
            <h4 class="my-3">{{__('welcome_back')}}, {{ Auth::user()->first_name }}</h4>
            <div class="service-list mb-4">
                <div class="service-header">
                    <h6 class="m-0">{{__('game_servers')}}</h6>
                </div>
                <div class="service-body">
                    @if($userServers)
                    @foreach ($userServers as $server)
                        <div class="service">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="me-3" src="/assets/images/minecraft-icon.png">
                                    <div>
                                        <h5 class="m-0">{{ $server->attributes->name }}</h5>
                                        <p class="m-0 text-second">{{__('expires_at')}} {{ $server->attributes->exp_date }}</p>
                                    </div>
                                </div>
                                <a class="btn btn-main-color px-4" href="{{ route('server', $server->attributes->identifier) }}">{{__('manage')}}</a>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="service">
                            <p class="m-0 text-second">{{__('no_services')}}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="service-list">
                <div class="service-header">
                    <h6 class="m-0">Gazduire Web</h6>
                </div>
                <div class="service-body">
                    <div class="service">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="me-3" src="/assets/images/minecraft-icon.png">
                                <div>
                                    <h5 class="m-0">Minecraft Server</h5>
                                    <p class="m-0 text-second">{{__('expires_at')}} 2022-06-23</p>
                                </div>
                            </div>
                            <a class="btn btn-main-color px-4" href="#">{{__('manage')}}</a>
                        </div>
                    </div>
                    <div class="service">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="me-3" src="/assets/images/minecraft-icon.png">
                                <div>
                                    <h5 class="m-0">Minecraft Server</h5>
                                    <p class="m-0 text-second">{{__('expires_at')}} 2022-06-23</p>
                                </div>
                            </div>
                            <a class="btn btn-main-color px-4" href="#">{{__('manage')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
