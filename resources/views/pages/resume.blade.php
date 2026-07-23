<x-layout.app :title="'The Engineer — ' . config('nexus.title')">
    @php
        $resume = config('nexus.resume');
        $allProjects = config('nexus.projects');
        $featuredProjects = collect($allProjects)->filter(fn ($p) => in_array($p['slug'], $resume['featured_projects'] ?? []));
    @endphp

    <section class="py-12 sm:py-20">
        <div class="mx-auto max-w-4xl px-6">
            <div class="mb-12 flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <x-section-heading
                    eyebrow="The Engineer"
                    title="Benjamin Nwaochei"
                    description="{{ config('nexus.tagline') }}"
                />
                @if($resumeAvailable)
                    <a href="{{ route('resume.download') }}" class="inline-flex shrink-0 items-center gap-2 rounded-xl bg-nexus-primary px-5 py-2.5 text-sm font-semibold text-white transition-all duration-300 hover:bg-nexus-primary-hover hover:shadow-lg hover:shadow-nexus-primary/20">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                        </svg>
                        Download Resume
                    </a>
                @endif
            </div>

            {{-- Resume Statistics --}}
            <div class="mb-12 grid grid-cols-2 gap-4 sm:grid-cols-4">
                <div class="glass rounded-2xl p-5 text-center transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                    <div class="text-2xl font-bold text-nexus-primary">5+</div>
                    <div class="mt-1 text-xs text-nexus-dim">Years Experience</div>
                </div>
                <div class="glass rounded-2xl p-5 text-center transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                    <div class="text-2xl font-bold text-nexus-primary">15+</div>
                    <div class="mt-1 text-xs text-nexus-dim">APIs Built</div>
                </div>
                <div class="glass rounded-2xl p-5 text-center transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                    <div class="text-2xl font-bold text-nexus-primary">10+</div>
                    <div class="mt-1 text-xs text-nexus-dim">Technologies</div>
                </div>
                <div class="glass rounded-2xl p-5 text-center transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                    <div class="text-2xl font-bold text-nexus-primary">6</div>
                    <div class="mt-1 text-xs text-nexus-dim">Deployments</div>
                </div>
            </div>

            {{-- Professional Summary --}}
            <div class="mb-12">
                <h2 class="mb-4 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Professional Summary</h2>
                <div class="glass rounded-2xl p-6">
                    <p class="text-sm leading-relaxed text-nexus-muted">{{ $resume['summary'] }}</p>
                </div>
            </div>

            {{-- Experience Timeline --}}
            <div class="mb-12">
                <h2 class="mb-6 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Experience</h2>
                <x-timeline :items="$resume['experience']" />
            </div>

            {{-- Projects --}}
            @if(!empty($resume['projects']))
                <div class="mb-12">
                    <h2 class="mb-6 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Projects</h2>
                    <div class="space-y-4">
                        @foreach($resume['projects'] as $project)
                            <div class="glass rounded-2xl p-6 transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                                <h3 class="text-base font-semibold text-nexus-white">{{ $project['title'] }}</h3>
                                <p class="mt-2 text-sm text-nexus-muted">{{ $project['description'] }}</p>
                                <div class="mt-3 flex flex-wrap gap-1.5">
                                    @foreach($project['technologies'] as $tech)
                                        <x-tag :tag="$tech" />
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Technical Skills --}}
            <div class="mb-12">
                <h2 class="mb-6 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Technical Skills</h2>
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($resume['skills'] as $category => $skills)
                        <div class="glass rounded-2xl p-5">
                            <h3 class="text-xs font-semibold uppercase tracking-wider text-nexus-primary">{{ $category }}</h3>
                            <div class="mt-3 flex flex-wrap gap-1.5">
                                @foreach($skills as $skill)
                                    <x-tag :tag="$skill" />
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Education --}}
            <div class="mb-12">
                <h2 class="mb-6 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Education</h2>
                <x-timeline :items="$resume['education']" />
            </div>

            {{-- Certifications --}}
            @if(!empty($resume['certifications']))
                <div class="mb-12">
                    <h2 class="mb-6 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Certifications</h2>
                    <div class="space-y-4">
                        @foreach($resume['certifications'] as $cert)
                            <div class="glass rounded-2xl p-6 transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                                <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                                    <h3 class="text-base font-semibold text-nexus-white">{{ $cert['title'] }}</h3>
                                    <span class="mt-1 text-xs font-semibold text-nexus-primary sm:mt-0">{{ $cert['issuer'] }}</span>
                                </div>
                                @if(isset($cert['date']))
                                    <p class="mt-2 text-xs text-nexus-dim">{{ $cert['date'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="mb-12">
                    <h2 class="mb-6 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Certifications</h2>
                    <div class="glass rounded-2xl p-6">
                        <p class="text-sm text-nexus-dim">Certifications coming soon.</p>
                    </div>
                </div>
            @endif

            {{-- Technologies --}}
            @if(!empty($resume['technologies']))
                <div class="mb-12">
                    <h2 class="mb-6 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Technologies</h2>
                    <div class="glass rounded-2xl p-6">
                        <div class="flex flex-wrap gap-2">
                            @foreach($resume['technologies'] as $tech)
                                <div class="inline-flex items-center gap-2 rounded-xl border border-nexus-border bg-nexus-glass px-3 py-2 transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                                    <span class="text-sm font-medium text-nexus-white">{{ $tech['name'] }}</span>
                                    @if(!empty($tech['version']))
                                        <span class="rounded-md bg-nexus-primary/10 px-1.5 py-0.5 text-[10px] font-semibold text-nexus-primary">v{{ $tech['version'] }}</span>
                                    @endif
                                    <span class="text-[10px] text-nexus-dim">{{ $tech['category'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{-- Featured Projects --}}
            @if($featuredProjects->isNotEmpty())
                <div class="mb-12">
                    <h2 class="mb-6 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Featured Projects</h2>
                    <div class="space-y-4">
                        @foreach($featuredProjects as $project)
                            <a href="{{ route('projects.show', $project['slug']) }}" class="group glass block rounded-2xl p-6 transition-all duration-300 hover:border-nexus-border-hover hover:bg-white/[0.04]">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="flex flex-wrap items-center gap-3">
                                            <h3 class="text-base font-semibold text-nexus-white transition-colors group-hover:text-nexus-primary">{{ $project['title'] }}</h3>
                                            <x-status-badge :status="$project['status']" />
                                        </div>
                                        <p class="mt-1 text-sm text-nexus-muted">{{ $project['tagline'] }}</p>
                                    </div>
                                    <svg class="h-4 w-4 shrink-0 text-nexus-dim transition-all group-hover:translate-x-0.5 group-hover:text-nexus-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                    </svg>
                                </div>
                                <div class="mt-3 flex flex-wrap gap-1.5">
                                    @foreach(array_slice($project['technologies'], 0, 5) as $tech)
                                        <x-tag :tag="$tech" />
                                    @endforeach
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layout.app>
