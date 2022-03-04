<div class="flex justify-center pt-8 sm:justify-start sm:pt-0" style="
position: fixed;
top: 10px;
right: 35px;
z-index: 300;
">
    {{-- @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span class="ml-2 mr-2 text-gray-700">{{ $locale_name }}</span>
        @else
            <a class="ml-1 underline ml-2 mr-2" href="language/{{ $available_locale }}">
                <span>{{ $locale_name }}</span>
            </a>
        @endif
    @endforeach --}}
    <select class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="location = this.value;">
        @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <option selected>{{ __($locale_name) }}</option>
        @else
            <option value="{{route('language.switch', ['locale' => $available_locale])}}">
                <span>{{ __($locale_name) }}</span>
        </option>
        @endif
        @endforeach
    </select>
</div>