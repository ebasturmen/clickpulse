<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageSelector extends Component
{
    public $currentLang;

    public function mount()
    {
        $this->currentLang = Session::get('lang', 'en');
    }

    public function changeLanguage($locale)
    {
        if (in_array($locale, ['en', 'tr'])) {
            // Save to session
            Session::put('lang', $locale);
            Session::save();
            
            // Update current language property
            $this->currentLang = $locale;
            
            // Dispatch event to reload page
            $this->dispatch('language-changed');
        }
    }

    public function render()
    {
        return view('livewire.language-selector');
    }
}

