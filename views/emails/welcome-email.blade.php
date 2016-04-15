@extends ('emails.base-email')

@section('body')
<p>
    Welcome to Acme.
</p>
<p>
    Please click <a href="{!! getenv('HOST') !!}/verify-account?token={!! $token !!}">here</a> to activate your account.
</p>
@stop
