@component('mail::message')
# Your PIN was Changed Recently!

Your PIN has been changed successfully. Please ensure
your keep it secret and safe.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks for choosing Dotori,<br>
{{ config('app.name') }}
@endcomponent
