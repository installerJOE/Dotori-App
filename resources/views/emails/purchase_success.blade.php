@component('mail::message')
# Package Purchase Successful

Your package purchase is has been activated successfully.
Your earning cycle starts counting now. 

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks for choosing Dotori,<br>
{{ config('app.name') }}
@endcomponent
