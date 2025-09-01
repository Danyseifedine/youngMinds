@push('head')
    <link href="/favicon.ico" id="favicon" rel="icon">
@endpush

<div class="h2 d-flex align-items-center">
    @auth
        <x-orchid-icon path="bs.house" class="d-inline d-xl-none" />
    @endauth

    <p style="font-size: 1.5rem; font-weight: 600; color: #ffffff;"
        class="my-0 {{ auth()->check() ? 'd-none d-xl-block' : '' }}">
        Young Bot Minds
    </p>
</div>
