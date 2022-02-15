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
                <div class="col-md-6 d-flex justify-content-start">
                    <button type="button" class="btn btn-second-color px-4" data-bs-toggle="modal" data-bs-target="#createCategory">{{__('create_category')}}</button>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-second-color px-4" data-bs-toggle="modal" data-bs-target="#createProduct">{{__('create_product')}}</button>
                </div>
            </div>
            <livewire:category-drag-and-drop/>
        </div>
    </div>
</div>

<div class="modal fade" id="createCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-second">
            <div class="modal-header">
                <h5 class="modal-title" id="createCategoryLabel">{{__('create_category')}}</h5>
            </div>
            <form action="/admin/products/createCategory" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" class="custom-input" name="category_name" placeholder="{{__('category_name')}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-second-color" data-bs-dismiss="modal">{{__('close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('create')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="createProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-second">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductLabel">{{__('create_product')}}</h5>
            </div>
            <form action="/admin/products/createProducts" method="POST" x-data="{ open: 1 }">
                @csrf
                <div class="modal-body">
                    <div x-show="open == 1">
                        <p class="text-second mb-2">* {{__('all_field_required')}}</p>
                        <input type="text" class="custom-input mb-3" name="product_name" placeholder="{{__('product_name')}}">
                        <textarea type="text" class="custom-input mb-3" name="product_desc" placeholder="{{__('product_desc')}}"></textarea>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="custom-input mb-3" name="product_price" placeholder="{{__('monthly_price')}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="custom-input mb-3" name="product_anual_price" placeholder="{{__('annual_price')}}">
                            </div>
                        </div>
                        <input type="text" class="custom-input mb-3" name="product_image" placeholder="Url Image ({{ @route('index') }}/minecraft.png)">
                    </div>
                    <div x-show="open == 2">
                        <select class="custom-select mb-3" name="product_category">
                            <option selected>{{__('select_category')}}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <livewire:create-product-game-type />
                    </div>
                    <div x-show="open == 3">
                        <label class="text-second" for="product_ram_limit">RAM Limit</label>
                        <input type="text" class="custom-input" name="product_ram_limit" id="product_ram_limit" placeholder="RAM Limit">
                        <p class="text-muted small mb-2">The maximum amount of memory allowed for this container. Setting this to <code>0</code> will allow unlimited memory in a container.</p>

                        <label class="text-second" for="product_swap">SWAP Limit (0 sau -1)</label>
                        <input type="text" class="custom-input" name="product_swap" id="product_swap" placeholder="SWAP Limit (0 sau -1)" value="0">
                        <p class="text-muted small mb-2">Setting this to <code>0</code> will disable swap space on this server. Setting to <code>-1</code> will allow unlimited swap.</p>

                        <label class="text-second" for="product_disk_limit">Disk Limit</label>
                        <input type="text" class="custom-input" name="product_disk_limit" id="product_disk_limit" placeholder="Disk Limită">
                        <p class="text-muted small mb-2">This server will not be allowed to boot if it is using more than this amount of space. If a server goes over this limit while running it will be safely stopped and locked until enough space is available. Set to <code>0</code> to allow unlimited disk usage.</p>

                        <label class="text-second" for="product_block_io">Block IO Weight</label>
                        <input type="text" class="custom-input" name="product_block_io" id="product_block_io" placeholder="Block IO Weight" value="500">
                        <p class="text-muted small mb-2"><strong>Advanced</strong>: The IO performance of this server relative to other <em>running</em> containers on the system. Value should be between <code>10</code> and <code>1000</code>. Please see <a href="https://docs.docker.com/engine/reference/run/#block-io-bandwidth-blkio-constraint" target="_blank">this documentation</a> for more information about it.</p>

                        <label class="text-second" for="product_cpu_limit">CPU Limit</label>
                        <input type="text" class="custom-input" name="product_cpu_limit" id="product_cpu_limit" placeholder="CPU Limit" value="100">
                        <p class="text-muted small mb-2">If you do not want to limit CPU usage, set the value to <code>0</code>. To determine a value, take the number of threads and multiply it by 100. For example, on a quad core system without hyperthreading <code>(4 * 100 = 400)</code> there is <code>400%</code> available. To limit a server to using half of a single thread, you would set the value to <code>50</code>. To allow a server to use up to two threads, set the value to <code>200</code>.</p>

                        <label class="text-second" for="product_database_limit">Data base limit</label>
                        <input type="text" class="custom-input" name="product_database_limit" id="product_database_limit" placeholder="Data base limit" value="0">
                        <p class="text-muted small mb-2">The total number of databases a user is allowed to create for this server.</p>

                        <label class="text-second" for="product_backup_limit">Backup Limit</label>
                        <input type="text" class="custom-input" name="product_backup_limit" id="product_backup_limit" placeholder="Backup Limit" value="0">
                        <p class="text-muted small mb-2">The total number of backups that can be created for this server.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-second-color" x-on:click="(open > 1) ? open-- : open = open" x-show="open > 1"><i class="fal fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-second-color" x-on:click="(open < 3) ? open++ : open = open" x-show="open < 3"><i class="fal fa-chevron-right"></i></button>
                    <button type="button" class="btn btn-second-color" data-bs-dismiss="modal">{{__('close')}}</button>
                    <button x-show="open == 3" type="submit" class="btn btn-primary">{{__('create')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
