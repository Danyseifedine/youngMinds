@extends('platform::auth')
@section('title', __('Sign in to your account'))

@section('content')
    <div class="text-center mb-4">
        <h1 class="h4 text-body-emphasis mb-2" style="color: #FFCA4C;">Young Bot Minds</h1>
        <p class="text-muted">Admin Dashboard Login</p>
    </div>

    <form class="m-t-md" role="form" method="POST" data-controller="form"
        data-form-need-prevents-form-abandonment-value="false" data-action="form#submit"
        action="{{ route('platform.login.auth') }}">
        @csrf

        @includeWhen($isLockUser, 'platform::auth.lockme')
        @includeWhen(!$isLockUser, 'platform::auth.signin')
    </form>
@endsection