<div class="d-flex justify-content-end mb-3">
    <div class="dropdown">
        <button type="button" class="btn btn-icon btn-topbar float-end" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 2px !important; width: 36px !important; height: 24px !important; min-width: 36px !important; max-width: 36px !important; max-height: 24px !important; min-height: 24px !important; aspect-ratio: 3/2 !important; flex-shrink: 0 !important; box-sizing: border-box !important; display: inline-flex !important; align-items: center !important; justify-content: center !important;">
            @php
                $currentLang = Session::get('lang', 'en');
            @endphp
            @if($currentLang == 'tr')
                <x-flag-language-tr class="rounded" style="height: 24px;" />
            @else
                <x-flag-language-en class="rounded" style="height: 24px;" />
            @endif
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <button wire:click="changeLanguage('en')" type="button" class="dropdown-item notify-item language py-2 w-100 text-start {{ Session::get('lang', 'en') == 'en' ? 'active' : '' }}" data-lang="en" title="English">
                <x-flag-language-en class="me-2 rounded" style="height: 24px;" />
                <span class="align-middle">English</span>
            </button>
            <button wire:click="changeLanguage('tr')" type="button" class="dropdown-item notify-item language py-2 w-100 text-start {{ Session::get('lang', 'en') == 'tr' ? 'active' : '' }}" data-lang="tr" title="Türkçe">
                <x-flag-language-tr class="me-2 rounded" style="height: 24px;" />
                <span class="align-middle">Türkçe</span>
            </button>
        </div>
    </div>
</div>

@script
<script>
    $wire.on('language-changed', () => {
        // Reload the page to apply language changes immediately
        window.location.reload();
    });
</script>
@endscript

