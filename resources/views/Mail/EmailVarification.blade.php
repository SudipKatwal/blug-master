@component('mail::message')
    # Hello,

    One more step to finish up registration. Enter the code below on the email verification page:

    # {{$user->verification_token}}


    # Login Information
    Email : {{$user->email}}
    Password  : {{$password}}

    This code will expire twenty four hours after this email was sent.
    Thanks,

    {{ config('app.name') }}

    @component('mail::subcopy')
        ** Don't recognize this activity ? **<br>
        BlugMaster requires verification whenever an email address is selected as new Virtual Travel Agent account. Your account cannot be used until you verify it.
        If you didn't sent verification code. Ignore this mail someone may had made a mistake typing their own email address.<br><br>

    @endcomponent
@endcomponent
