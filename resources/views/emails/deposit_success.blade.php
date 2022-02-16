@component('mail::message')
# Your Deposit Request has been confirmed!

Your Dotori account has been credited with the amount you 
deposited with the ratio of 1PTS to 1KRW.


{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks for choosing Dotori,<br>
{{ config('app.name') }}
@endcomponent
