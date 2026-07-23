@props(['title', 'description' => null, 'center' => false, 'eyebrow' => null])

<div class="{{ $center ? 'text-center' : '' }} mb-12">
    @if($eyebrow)
        <span class="mb-3 inline-block text-xs font-semibold uppercase tracking-widest text-nexus-primary">{{ $eyebrow }}</span>
    @endif
    <h2 class="text-2xl font-bold tracking-tight text-nexus-white sm:text-3xl">
        {{ $title }}
    </h2>
    @if($description)
        <p class="mt-3 text-nexus-muted">{{ $description }}</p>
    @endif
</div>
