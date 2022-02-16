@component('mail::message')
# Package Repurchase Successful

Repurchasing of your package is successful.
Your earning cycle has resumed automatically.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks for choosing Dotori,<br>
{{ config('app.name') }}
@endcomponent
