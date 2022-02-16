@component('mail::message')
# Package Purchase Successful

Your package purchase is successful.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks for choosing Dotori,<br>
{{ config('app.name') }}
@endcomponent
