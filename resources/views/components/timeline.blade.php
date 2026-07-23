@props(['items' => []])

<div class="relative pl-8">
    @foreach($items as $item)
        <div class="relative pb-10 last:pb-0 timeline-dot timeline-line">
            <div class="glass rounded-2xl p-6 transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-base font-semibold text-nexus-white">{{ $item['title'] }}</h3>
                        <p class="text-sm text-nexus-muted">{{ $item['company'] }}</p>
                    </div>
                    <span class="mt-1 text-xs font-semibold text-nexus-primary sm:mt-0">{{ $item['period'] }}</span>
                </div>
                <p class="mt-3 text-sm text-nexus-muted">{{ $item['description'] }}</p>
                @if(isset($item['highlights']))
                    <ul class="mt-4 space-y-2">
                        @foreach($item['highlights'] as $highlight)
                            <li class="flex items-start gap-2 text-sm text-nexus-muted">
                                <svg class="mt-0.5 h-4 w-4 shrink-0 text-nexus-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                </svg>
                                {{ $highlight }}
                            </li>
                        @endforeach
                    </ul>
                @endif
                @if(isset($item['details']))
                    <p class="mt-3 text-sm text-nexus-muted">{{ $item['details'] }}</p>
                @endif
            </div>
        </div>
    @endforeach
</div>
