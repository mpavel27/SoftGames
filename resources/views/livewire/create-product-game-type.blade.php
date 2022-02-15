<div>
    <select class="custom-select mb-3" name="product_nest" wire:change='changeNest($event.target.value)'>
        <option value="-1" selected>{{__('select_game')}}</option>
        @foreach ($nests->data as $nest)
            <option value="{{ $nest->attributes->id }}">{{ $nest->attributes->name }}</option>
        @endforeach
    </select>
    @if ($nestsSelected)
        <select class="custom-select mb-3" name="product_eggs" wire:change='changeEgg($event.target.value)'>
            <option value="-1" selected>{{__('select_type')}}</option>
            @foreach ($eggs as $egg)
                @if (is_object($egg))
                    <option value="{{ json_encode($egg) }}">{{ $egg->attributes->name }}</option>
                @else
                    <option value="{{ json_encode($egg) }}">{{ $egg['attributes']['name'] }}</option>
                @endif
            @endforeach
        </select>
    @endif
    @if ($eggsSelected)
        @foreach (json_decode($eggsVariables)->attributes->relationships->variables->data as $key=>$value)
        <input type="text" class="custom-input mb-3" name="{{ $value->attributes->env_variable }}" placeholder="{{ $value->attributes->env_variable }}" value="{{ $value->attributes->default_value }}">
        @endforeach
    @endif
    <select class="custom-select mb-3" name="product_location" wire:change='changeAllocation($event.target.value)'>
        <option value="-1" selected>{{__('select_location')}}</option>
        @foreach ($locations->data as $location)
            <option value="{{ $location->attributes->id }}">{{ $location->attributes->name }}</option>
        @endforeach
    </select>
    @if ($allocationSelected)
        <input type="text" class="custom-input mb-3" name="product_port" placeholder="Default Port ex. 25565">
    @endif
</div>
