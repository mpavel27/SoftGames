<div class="__sidebar" id="sidebar">
    <div class="p-4 text-center border-bottom" id="title" style="border-color: var(--border-color) !important;">
        <h3 class="m-0" style="font-size: 28px;">SOFT<b style="color: var(--main-color);">GAMES</b></h3>
    </div>
    <div class="p-4 text-center border-bottom d-none" id="title_collapsed" style="border-color: var(--border-color) !important;">
        <h3 class="m-0" style="font-size: 28px;">S<b style="color: var(--main-color);">G</b></h3>
    </div>
    <div class="p-4">
        <div class="sidebar-profile mb-4">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center" id="sidebar-profile">
                    <img src="https://www.gravatar.com/avatar/8518559e5d193497ef745e329b2c93d3?s=160" alt="kraier">
                    <div>
                        <h5 class="m-0">{{ Auth::user()->first_name }}</h5>
                        <p class="m-0 text-second">€210 {{__("balance")}}</p>
                    </div>
                </div>
                <a href="{{ route('logout') }}" class="fs-4"><i class="fal fa-sign-out-alt text-second"></i></a>
            </div>
        </div>
        <ul class="list-unstyled">
            <li><a href="{{ route('index') }}" class="btn sidebar-btn d-flex align-items-center @if(Request::path() == '/') sidebar-btn-primary @endif"><i class="far fa-home-lg-alt"></i><span class="sidebar-text">{{__("home")}}</span></a></li>
            <li><a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="fal fa-store"></i><span class="sidebar-text">{{__("shop")}}</span></a></li>
            <li><a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="fal fa-life-ring"></i><span class="sidebar-text">{{__("support")}}</span></a></li>
            <li><a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="fal fa-question-circle"></i><span class="sidebar-text">{{__("contact")}}</span></a></li>
        </ul>
        <p class="mt-4 mb-3 sidebar-small-text">{{__('admin_zone')}}</p>
        <ul class="list-unstyled">
            <li><a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="fal fa-users"></i><span class="sidebar-text">{{__('clients')}}</span></a></li>
            <li><a href="{{ route('admin.products') }}" class="btn sidebar-btn d-flex align-items-center @if(Request::path() == 'admin/products') sidebar-btn-primary @endif"><i class="fal fa-store"></i><span class="sidebar-text">{{__('manage_products')}}</span></a></li>
            <li><a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="fal fa-phone-square-alt"></i><span class="sidebar-text">{{__('manage_tickets')}}</span></a></li>
            <li><a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="fal fa-phone-square-alt"></i><span class="sidebar-text">{{__('awaiting_tickets')}}</span></a></li>
            <li><a href="#" class="btn sidebar-btn d-flex align-items-center"><i class="fal fa-shopping-cart"></i><span class="sidebar-text">{{__('pending_orders')}}</span></a></li>
        </ul>
    </div>
</div>
