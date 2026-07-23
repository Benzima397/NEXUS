<x-layout.app :title="'Project — ' . $project['title']">
    <section class="py-12 sm:py-20">
        <div class="mx-auto max-w-4xl px-6">
            <a href="{{ route('projects') }}" class="mb-8 inline-flex items-center gap-2 text-sm text-nexus-muted transition-colors hover:text-nexus-white">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
                Back to The Laboratory
            </a>

            {{-- Project Header --}}
            <div class="mb-8">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="text-xs font-medium uppercase tracking-widest text-nexus-primary">{{ $project['category'] }}</span>
                    <x-status-badge :status="$project['status']" />
                </div>
                <h1 class="mt-3 text-3xl font-bold tracking-tight text-nexus-white sm:text-4xl">{{ $project['title'] }}</h1>
                <p class="mt-2 text-sm text-nexus-muted">{{ $project['tagline'] }}</p>
                <p class="mt-4 max-w-2xl text-lg text-nexus-muted">{{ $project['description'] }}</p>
            </div>

            {{-- Action Buttons --}}
            <div class="mb-10 flex flex-wrap gap-3">
                @if(!empty($project['github']))
                    <a href="{{ $project['github'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-xl border border-nexus-border bg-nexus-glass px-4 py-2.5 text-sm font-medium text-nexus-white transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        View Source
                    </a>
                @endif
                @if(!empty($project['live_demo']))
                    <a href="{{ $project['live_demo'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-xl bg-nexus-primary px-4 py-2.5 text-sm font-semibold text-white transition-all duration-300 hover:bg-nexus-primary-hover hover:shadow-lg hover:shadow-nexus-primary/20">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                        </svg>
                        Live Demo
                    </a>
                @endif
            </div>

            {{-- Architecture Layers --}}
            @if(!empty($project['layers']))
                <div class="mb-8" x-data="{ open: true }">
                    <button @click="open = !open" class="mb-4 flex w-full items-center justify-between text-left">
                        <h2 class="text-xs font-semibold uppercase tracking-wider text-nexus-primary">Architecture Layers</h2>
                        <svg class="h-4 w-4 text-nexus-dim transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse x-cloak class="glass rounded-2xl p-6">
                        <x-architecture-layers :layers="$project['layers']" />
                    </div>
                </div>
            @endif

            {{-- Modules --}}
            @if(!empty($project['modules']))
                <div class="mb-8" x-data="{ open: true }">
                    <button @click="open = !open" class="mb-4 flex w-full items-center justify-between text-left">
                        <h2 class="text-xs font-semibold uppercase tracking-wider text-nexus-primary">Modules</h2>
                        <svg class="h-4 w-4 text-nexus-dim transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse x-cloak class="grid gap-3 sm:grid-cols-2">
                        @foreach($project['modules'] as $moduleName => $moduleDescription)
                            <div class="glass rounded-2xl p-5 transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                                <h3 class="text-sm font-semibold text-nexus-white">{{ $moduleName }}</h3>
                                <p class="mt-1.5 text-xs text-nexus-muted">{{ $moduleDescription }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Problem & Solution --}}
            <div class="mb-8 space-y-4">
                @if(!empty($project['problem']))
                    <div class="glass rounded-2xl p-6">
                        <h2 class="text-sm font-semibold text-nexus-white">Problem</h2>
                        <p class="mt-3 text-sm leading-relaxed text-nexus-muted">{{ $project['problem'] }}</p>
                    </div>
                @endif
                @if(!empty($project['solution']))
                    <div class="glass rounded-2xl p-6">
                        <h2 class="text-sm font-semibold text-nexus-white">Solution</h2>
                        <p class="mt-3 text-sm leading-relaxed text-nexus-muted">{{ $project['solution'] }}</p>
                    </div>
                @endif
            </div>

            {{-- Challenges --}}
            @if(!empty($project['challenges']))
                <div class="mb-8" x-data="{ open: false }">
                    <button @click="open = !open" class="mb-4 flex w-full items-center justify-between text-left">
                        <h2 class="text-xs font-semibold uppercase tracking-wider text-nexus-warning">Challenges</h2>
                        <svg class="h-4 w-4 text-nexus-dim transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse x-cloak class="glass rounded-2xl p-6">
                        <ul class="space-y-3">
                            @foreach($project['challenges'] as $challenge)
                                <li class="flex items-start gap-2.5 text-sm text-nexus-muted">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-nexus-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                    </svg>
                                    {{ $challenge }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- Lessons Learned --}}
            @if(!empty($project['lessons']))
                <div class="mb-8" x-data="{ open: false }">
                    <button @click="open = !open" class="mb-4 flex w-full items-center justify-between text-left">
                        <h2 class="text-xs font-semibold uppercase tracking-wider text-nexus-success">Lessons Learned</h2>
                        <svg class="h-4 w-4 text-nexus-dim transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse x-cloak class="glass rounded-2xl p-6">
                        <ul class="space-y-3">
                            @foreach($project['lessons'] as $lesson)
                                <li class="flex items-start gap-2.5 text-sm text-nexus-muted">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-nexus-success" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                                    </svg>
                                    {{ $lesson }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- Future Improvements --}}
            @if(!empty($project['improvements']))
                <div class="mb-8" x-data="{ open: false }">
                    <button @click="open = !open" class="mb-4 flex w-full items-center justify-between text-left">
                        <h2 class="text-xs font-semibold uppercase tracking-wider text-nexus-info">Future Improvements</h2>
                        <svg class="h-4 w-4 text-nexus-dim transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse x-cloak class="glass rounded-2xl p-6">
                        <ul class="space-y-3">
                            @foreach($project['improvements'] as $improvement)
                                <li class="flex items-start gap-2.5 text-sm text-nexus-muted">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-nexus-info" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 00-2.455 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/>
                                    </svg>
                                    {{ $improvement }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- Technologies --}}
            <div class="glass rounded-2xl p-6">
                <h2 class="text-sm font-semibold text-nexus-white">Technologies Used</h2>
                <div class="mt-3 flex flex-wrap gap-2">
                    @foreach($project['technologies'] as $tech)
                        <x-tag :tag="$tech" active />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
