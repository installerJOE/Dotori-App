@component('mail::message')
# Withdrawal Request Approved!

Your withdrawal request has been approved.
Requested amount has been sent to your bank account.
If there's any issue, reach us at info@dotori.com

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks for choosing Dotori,<br>
{{ config('app.name') }}
@endcomponent
