<div>
    <div wire:sortable="updateCategoryOrder" wire:sortable-group="updateProductOrder()">
        @foreach ($this->groups as $category)
        <div class="service-list mt-4" wire:key="group-{{ $category->id }}" wire:sortable.item="{{ $category->id }}" style="cursor: move;  user-select: none;">
            <div class="service-header" wire:sortable.handle>
                <h6 class="m-0">{{ $category->name }}</h6>
            </div>
            <div class="service-body" wire:sortable-group.item-group="{{ $category->id }}">
                @if ($category->products->count() > 0)
                @foreach ($category->products()->ordered()->get() as $product)
                    <div class="service" wire:key="{{ $product['id'] }}" wire:sortable-group.item="{{ $product['id'] }}">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="me-3" src="/assets/images/minecraft-icon.png">
                                <div>
                                    <h5 class="m-0" wire:sortable-group.item-group="{{ $category->id }}">{{ $product->name }}</h5>
                                    <p class="m-0 text-second">{{__('monthly_price')}}: €{{ $product->price }} — {{__('annual_price')}}: €{{ $product->anual_price }}</p>
                                </div>
                            </div>
                            <div>
                                <a class="btn btn-main-color px-4" href="#">{{__('edit')}}</a>
                                <button class="btn btn-danger text-white ms-2- px-4" wire:click.prevent="removeProduct({{ $product->id }})">{{__('delete')}}</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="service">
                    <p class="text-second m-0">{{__('dont_have_any_products_in_this_category')}}</p>
                </div>
                @endif
            </div>
        </div>
    @endforeach
    </div>

</div>
