@props(['title' => ''])

<div {{ $attributes->merge(['class' => 'auth-card']) }}>
    @if(isset($logo))
        <div class="mb-4">
            {{ $logo }}
        </div>
    @endif

    @if($title)
        <div class="auth-header">
            <h2 class="text-xl font-semibold">{{ $title }}</h2>
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>
</div>