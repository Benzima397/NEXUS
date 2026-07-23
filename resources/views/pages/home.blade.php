<x-layout.app>
    {{-- The Mission — Hero --}}
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-grid opacity-40"></div>
        <div class="absolute left-1/2 top-0 h-[500px] w-[800px] -translate-x-1/2 -translate-y-1/3 bg-radial opacity-30"></div>

        <div class="relative mx-auto max-w-6xl px-6 pb-16 pt-20 sm:pb-20 sm:pt-28 lg:pt-32">
            <div class="grid gap-10 lg:grid-cols-2 lg:gap-12">
                <div class="flex flex-col justify-center">
                    <div class="mb-5 inline-flex w-fit items-center gap-2 rounded-full border border-nexus-border bg-nexus-glass px-3 py-1.5">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full rounded-full bg-nexus-success opacity-75" style="animation: pulse-glow 2s infinite"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-nexus-success"></span>
                        </span>
                        <span class="text-xs font-medium text-nexus-muted">{{ config('nexus.name') }} — {{ config('nexus.tagline') }}</span>
                    </div>

                    <h1 class="text-3xl font-bold leading-[1.1] tracking-tight sm:text-4xl lg:text-5xl xl:text-6xl">
                        <span class="text-nexus-white">{{ config('nexus.mission.headline') }}</span>
                        <br>
                        <span class="text-gradient-primary">{{ config('nexus.mission.headline_accent') }}</span>
                    </h1>

                    <p class="mt-5 max-w-lg text-base leading-relaxed text-nexus-muted sm:text-lg">
                        {{ config('nexus.mission.statement') }}
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:gap-4">
                        @foreach(config('nexus.mission.buttons') as $button)
                            @if($button['style'] === 'primary')
                                <a href="{{ route($button['route']) }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-nexus-primary px-6 py-3 text-sm font-semibold text-white transition-all duration-300 hover:bg-nexus-primary-hover hover:shadow-lg hover:shadow-nexus-primary/20 sm:w-auto">
                                    {{ $button['label'] }}
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route($button['route']) }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-nexus-border bg-nexus-glass px-6 py-3 text-sm font-semibold text-nexus-white transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04] sm:w-auto">
                                    {{ $button['label'] }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="hidden sm:block lg:block">
                    <x-terminal :lines="config('nexus.terminal')" />
                </div>
            </div>
        </div>
    </section>

    {{-- Lab Dashboard — Active Projects --}}
    <section class="relative border-t border-nexus-border py-20">
        <div class="mx-auto max-w-6xl px-6">
            <x-section-heading
                eyebrow="Dashboard"
                title="Active Projects"
                description="Current engineering work and system status."
            />

            <div class="space-y-4">
                @foreach(config('nexus.projects') as $project)
                    @if($project['slug'] !== 'nexus')
                        <x-architecture-card :project="$project" compact />
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- System Status --}}
    <section class="relative border-t border-nexus-border py-20">
        <div class="mx-auto max-w-6xl px-6">
            <x-section-heading
                eyebrow="Metrics"
                title="System Status"
                description="Engineering metrics at a glance."
            />
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
                @foreach(config('nexus.stats') as $stat)
                    <x-stat-card :value="$stat['value']" :label="$stat['label']" :icon="$stat['icon']" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- Technology Stack --}}
    <section class="relative border-t border-nexus-border py-20">
        <div class="mx-auto max-w-6xl px-6">
            <x-section-heading
                eyebrow="Stack"
                title="Technology"
                description="Core technologies and services powering current projects."
            />
            <div class="grid gap-6 sm:grid-cols-3">
                @foreach(config('nexus.technologies') as $category => $techs)
                    <div class="glass rounded-2xl p-6">
                        <h3 class="mb-4 text-xs font-semibold uppercase tracking-wider text-nexus-primary">{{ $category }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($techs as $tech)
                                <x-tech-badge :name="$tech['name']" :version="$tech['version']" />
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Engineering Principles --}}
    <section class="relative border-t border-nexus-border py-20">
        <div class="mx-auto max-w-6xl px-6">
            <x-section-heading
                eyebrow="Principles"
                title="Engineering Approach"
                description="How I design and build software systems."
            />
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach(config('nexus.principles') as $principle)
                    <div class="glass rounded-2xl p-6 transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                        <h3 class="text-sm font-semibold text-nexus-white">{{ $principle['title'] }}</h3>
                        <p class="mt-2 text-xs leading-relaxed text-nexus-muted">{{ $principle['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Closing --}}
    <section class="relative border-t border-nexus-border py-16 sm:py-20">
        <div class="mx-auto max-w-6xl px-6">
            <div class="glass-strong rounded-3xl p-8 sm:p-10 lg:p-12">
                <div class="max-w-2xl">
                    <span class="mb-3 inline-block text-xs font-semibold uppercase tracking-widest text-nexus-primary">Philosophy</span>
                    <h2 class="text-xl font-bold text-nexus-white sm:text-2xl">Build systems, not just features.</h2>
                    <p class="mt-4 text-base leading-relaxed text-nexus-muted sm:text-lg">
                        Every project is an engineering challenge. I focus on building maintainable, scalable systems
                        that solve real problems — not just shipping code.
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:gap-4">
                        <a href="{{ route('projects') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-nexus-primary px-6 py-3 text-sm font-semibold text-white transition-all duration-300 hover:bg-nexus-primary-hover hover:shadow-lg hover:shadow-nexus-primary/20">
                            Enter the Laboratory
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-nexus-border bg-nexus-glass px-6 py-3 text-sm font-semibold text-nexus-white transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                            Get in Touch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
