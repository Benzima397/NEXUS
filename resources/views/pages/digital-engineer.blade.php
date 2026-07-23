<x-layout.app :title="'Digital Engineer — ' . config('nexus.title')">
    <script type="text/plain" id="digital-engineer-welcome">{!! $config['welcome_message'] !!}</script>

    <section class="py-12 sm:py-20">
        <div class="mx-auto max-w-5xl px-6">
            {{-- Header --}}
            <div class="mb-10 text-center">
                <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-nexus-border bg-nexus-glass px-4 py-1.5">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full rounded-full bg-nexus-success opacity-75" style="animation: pulse-glow 2s infinite"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-nexus-success"></span>
                    </span>
                    <span class="text-xs font-medium text-nexus-muted">{{ $config['status_message'] }}</span>
                </div>
                <h1 class="text-3xl font-bold tracking-tight text-nexus-white sm:text-4xl">
                    {{ $config['title'] }}
                </h1>
                <p class="mt-2 text-sm text-nexus-muted">{{ $config['subtitle'] }}</p>
                <p class="mx-auto mt-4 max-w-xl text-sm leading-relaxed text-nexus-dim">{{ $config['description'] }}</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-[1fr_300px]">
                {{-- Chat Interface --}}
                <div x-data="digitalEngineer" class="glass flex flex-col overflow-hidden min-h-[500px]">
                    {{-- Chat Messages --}}
                    <div x-ref="chatContainer" class="flex-1 overflow-y-auto p-6 scroll-smooth min-h-[350px]">
                        {{-- Welcome State --}}
                        <div x-show="!hasSentMessage" class="flex h-full flex-col items-center justify-center text-center">
                            <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-nexus-primary/10">
                                <svg class="h-8 w-8 text-nexus-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09-3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 00-2.455 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-semibold text-nexus-white">Talk to Benjamin's Engineering Lab</h3>
                            <p class="mt-1 max-w-sm text-xs text-nexus-dim">Ask about projects, architecture, technologies, or engineering experience.</p>
                        </div>

                        {{-- Message List --}}
                        <div x-show="hasSentMessage">
                            <template x-for="(message, index) in messages" :key="index">
                                <div :class="message.role === 'user' ? 'flex justify-end' : 'flex justify-start'" class="mb-4">
                                    <div
                                        :class="message.role === 'user'
                                            ? 'bg-nexus-primary/10 border border-nexus-primary/20 text-nexus-white max-w-[85%]'
                                            : 'bg-white/[0.03] border border-nexus-border text-nexus-muted max-w-[85%]'"
                                        class="rounded-2xl px-4 py-3 text-sm leading-relaxed"
                                    >
                                        <template x-if="message.role === 'assistant'">
                                            <div class="mb-2 flex items-center gap-2">
                                                <div class="flex h-5 w-5 items-center justify-center rounded-md bg-nexus-primary/10">
                                                    <svg class="h-3 w-3 text-nexus-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09-3.09z"/>
                                                    </svg>
                                                </div>
                                                <span class="text-xs font-medium text-nexus-primary">Digital Engineer</span>
                                            </div>
                                        </template>
                                        <div x-text="message.content" class="whitespace-pre-line"></div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        {{-- Loading Indicator --}}
                        <div x-show="loading" class="flex justify-start">
                            <div class="rounded-2xl border border-nexus-border bg-white/[0.03] px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <div class="flex h-5 w-5 items-center justify-center rounded-md bg-nexus-primary/10">
                                        <svg class="h-3 w-3 text-nexus-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/>
                                        </svg>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <div class="h-1.5 w-1.5 rounded-full bg-nexus-primary/50 animate-pulse"></div>
                                        <div class="h-1.5 w-1.5 rounded-full bg-nexus-primary/50 animate-pulse" style="animation-delay: 0.2s"></div>
                                        <div class="h-1.5 w-1.5 rounded-full bg-nexus-primary/50 animate-pulse" style="animation-delay: 0.4s"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Suggested Prompts --}}
                    <div x-show="!hasSentMessage" class="border-t border-nexus-border px-6 py-4">
                        <p class="mb-3 text-[10px] font-semibold uppercase tracking-wider text-nexus-dim">Suggested Questions</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($config['suggested_prompts'] as $prompt)
                                <button @click="askSuggestion('{{ $prompt }}')" class="rounded-lg border border-nexus-border px-3 py-1.5 text-xs text-nexus-muted transition-all duration-200 hover:border-nexus-border-hover hover:text-nexus-white">
                                    {{ $prompt }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Input --}}
                    <div class="border-t border-nexus-border p-4">
                        <form @submit.prevent="send()" class="flex gap-3">
                            <input
                                x-model="input"
                                type="text"
                                placeholder="Ask Benjamin's Engineering Lab..."
                                :disabled="loading"
                                class="flex-1 rounded-xl border border-nexus-border bg-nexus-bg px-4 py-3 text-sm text-nexus-white placeholder-nexus-dim outline-none transition-colors focus:border-nexus-primary/50 focus:ring-1 focus:ring-nexus-primary/30 disabled:opacity-50"
                            >
                            <button type="submit" :disabled="loading || !input.trim()" class="shrink-0 rounded-xl bg-nexus-primary px-5 py-3 text-sm font-semibold text-white transition-all duration-200 hover:bg-nexus-primary-hover disabled:opacity-50 disabled:cursor-not-allowed">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="space-y-6">
                    {{-- Pipeline Architecture --}}
                    <div class="glass rounded-2xl p-5">
                        <h3 class="mb-3 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Pipeline Architecture</h3>
                        <x-architecture-layers :layers="$config['architecture']['layers']" />
                    </div>

                    {{-- Capabilities --}}
                    <div class="glass rounded-2xl p-5">
                        <h3 class="mb-3 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Capabilities</h3>
                        <div class="space-y-3">
                            @foreach($config['capabilities'] as $capability)
                                <div>
                                    <h4 class="text-sm font-medium text-nexus-white">{{ $capability['name'] }}</h4>
                                    <p class="mt-0.5 text-xs text-nexus-dim">{{ $capability['description'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Integration Status --}}
                    <div class="glass rounded-2xl p-5">
                        <h3 class="mb-3 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Integration Status</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-nexus-muted">Knowledge Base</span>
                                <x-status-badge status="online" />
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-nexus-muted">Python API</span>
                                <x-status-badge status="in_development" />
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-nexus-muted">NLP Engine</span>
                                <x-status-badge status="in_development" />
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-nexus-muted">Context Memory</span>
                                <x-status-badge status="in_development" />
                            </div>
                        </div>
                    </div>

                    {{-- Roadmap --}}
                    <div class="glass rounded-2xl p-5">
                        <h3 class="mb-3 text-xs font-semibold uppercase tracking-wider text-nexus-primary">Roadmap</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2 text-xs text-nexus-muted">
                                <svg class="mt-0.5 h-3 w-3 shrink-0 text-nexus-success" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="6"/></svg>
                                Local knowledge responses
                            </li>
                            <li class="flex items-start gap-2 text-xs text-nexus-muted">
                                <svg class="mt-0.5 h-3 w-3 shrink-0 text-nexus-warning" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="6"/></svg>
                                Python FastAPI integration
                            </li>
                            <li class="flex items-start gap-2 text-xs text-nexus-muted">
                                <svg class="mt-0.5 h-3 w-3 shrink-0 text-nexus-dim" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="6"/></svg>
                                OpenAI NLP processing
                            </li>
                            <li class="flex items-start gap-2 text-xs text-nexus-muted">
                                <svg class="mt-0.5 h-3 w-3 shrink-0 text-nexus-dim" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="6"/></svg>
                                Context-aware conversations
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
