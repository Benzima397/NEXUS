@props(['name', 'version' => null, 'active' => false])

<span class="inline-flex items-center gap-1.5 rounded-lg border {{ $active ? 'border-nexus-primary/20 bg-nexus-primary/5 text-nexus-primary' : 'border-nexus-border bg-nexus-bg-card text-nexus-muted' }} px-2.5 py-1 text-xs font-medium transition-colors duration-200 hover:border-nexus-border-hover">
    <span>{{ $name }}</span>
    @if($version)
        <span class="text-nexus-dim">{{ $version }}</span>
    @endif
</span>
