@component('mail::message')
# Your Password was changed Recently!

Password change is successful. 

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks for choosing Dotori,<br>
{{ config('app.name') }}
@endcomponent
