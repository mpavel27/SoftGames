<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageSelector extends Component
{
    public $lang;

    public function mount(){

        $this->lang = App::currentLocale();
    }

    public function changeLang($lang){
        $this->lang = $lang;
        Session::put('locale',$lang);
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.language-selector');
    }
}
