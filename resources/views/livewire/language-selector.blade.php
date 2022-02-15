<div>
    <div x-cloak x-data="{toggle:false,lang:'{{$lang}}'}">
        <div class="navigationLang" :class="toggle ? 'active' : ''"  @click="toggle = !toggle">
            <span @click = "toggle ? $wire.changeLang('en') : ''" x-show="(lang == 'en' || toggle)"><img src="{{asset('flags/1x1/us.svg')}}"></span>
            <span @click = "toggle ? $wire.changeLang('ro') : ''" x-show="(lang == 'ro' || toggle)"><img src="{{asset('flags/1x1/ro.svg')}}"></span>
        </div>
    </div>
</div>
