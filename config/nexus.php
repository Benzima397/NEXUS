<?php

return [

    'name' => 'NEXUS',
    'author' => 'Benjamin Nwaochei',
    'title' => 'NEXUS',
    'description' => 'Benjamin Nwaochei builds secure, scalable software that connects systems and automates business processes.',
    'tagline' => 'Backend Software Engineer',

    'navigation' => [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'Projects', 'route' => 'projects'],
        ['label' => 'Resume', 'route' => 'resume'],
        ['label' => 'Digital Engineer', 'route' => 'assistant'],
        ['label' => 'Contact', 'route' => 'contact'],
    ],

    'mission' => [
        'headline' => 'Building secure, scalable',
        'headline_accent' => 'software systems',
        'statement' => 'I design and build backend systems that connect enterprise applications, automate business processes and deliver production-grade software. Every project is an engineering challenge solved with clean, maintainable code.',
        'buttons' => [
            ['label' => 'Enter the Laboratory', 'route' => 'projects', 'style' => 'primary'],
            ['label' => 'Meet the Engineer', 'route' => 'resume', 'style' => 'secondary'],
        ],
    ],

    'terminal' => [
        ['type' => 'comment', 'text' => '# NEXUS Engineering Lab'],
        ['type' => 'command', 'text' => 'whoami'],
        ['type' => 'output', 'text' => 'Benjamin Nwaochei — Backend Engineer'],
        ['type' => 'command', 'text' => 'cat status.json'],
        ['type' => 'output', 'text' => '{'],
        ['type' => 'output', 'text' => '  "role": "Backend Software Engineer",'],
        ['type' => 'output', 'text' => '  "focus": ["Laravel", "Python", "APIs"],'],
        ['type' => 'output', 'text' => '  "status": "building",'],
        ['type' => 'output', 'text' => '  "projects_active": 4,'],
        ['type' => 'output', 'text' => '  "uptime": "5+ years"'],
        ['type' => 'output', 'text' => '}'],
        ['type' => 'command', 'text' => 'ls lab/projects/'],
        ['type' => 'output', 'text' => 'gridspace/  ai-personal-assistant/  python-automation/  nexus/'],
        ['type' => 'cursor', 'text' => '_'],
    ],

    'projects' => [
        [
            'title' => 'Gridspace',
            'slug' => 'gridspace',
            'status' => 'in_development',
            'status_label' => 'In Development',
            'category' => 'Full Stack Platform',
            'tagline' => 'Enterprise platform with API-first architecture',
            'description' => 'Comprehensive platform built with Laravel featuring API development, enterprise integrations and scalable architecture designed for production workloads.',
            'modules' => [
                'API Gateway' => 'RESTful API with versioning, rate limiting and authentication',
                'Service Layer' => 'Business logic isolation with repository pattern',
                'Queue System' => 'Background job processing with retry and monitoring',
                'Integration Hub' => 'Third-party service connectors with fallback handling',
            ],
            'problem' => 'Building a unified platform that handles complex business logic, multiple integrations and high-traffic demands while maintaining code quality and system reliability.',
            'solution' => 'Designed a modular Laravel architecture with a service layer, queue-based job processing, API versioning and comprehensive testing to ensure reliability at scale.',
            'architecture' => 'Laravel MVC with Service Layer pattern, Repository pattern for data access, event-driven architecture for cross-cutting concerns, and RESTful API with versioning.',
            'technologies' => ['Laravel', 'MySQL', 'REST APIs', 'Queues', 'Redis', 'Vite', 'TailwindCSS'],
            'layers' => [
                ['name' => 'Presentation', 'tech' => ['Blade', 'TailwindCSS', 'Alpine.js']],
                ['name' => 'Application', 'tech' => ['Laravel', 'Service Layer', 'Queues']],
                ['name' => 'Data', 'tech' => ['MySQL', 'Redis', 'Eloquent']],
            ],
            'challenges' => [
                'Managing complex business requirements while keeping the codebase maintainable',
                'Integrating multiple third-party services with varying API patterns and reliability',
                'Ensuring data consistency across distributed queue-based operations',
            ],
            'lessons' => [
                'Service layer pattern significantly improves testability and maintainability',
                'API versioning from day one prevents breaking changes in production',
                'Queue-based processing requires careful idempotency design',
                'Redis caching reduces database load by 80% for read-heavy operations',
            ],
            'improvements' => [
                'GraphQL API layer for flexible query support',
                'Real-time WebSocket support for live updates',
                'Expanded monitoring and observability stack',
                'Horizontal scaling infrastructure',
            ],
            'github' => 'https://github.com/benjamin/gridspace',
            'live_demo' => null,
            'gallery' => [],
        ],
        [
            'title' => 'AI Personal Assistant',
            'slug' => 'ai-personal-assistant',
            'status' => 'online',
            'status_label' => 'Online',
            'category' => 'AI & Automation',
            'tagline' => 'Intelligent automation with Python and FastAPI',
            'description' => 'Intelligent assistant built with Python and FastAPI, designed to automate workflows, process data and provide intelligent responses through a clean API interface.',
            'modules' => [
                'Pipeline Engine' => 'Composable workflow pipelines with async execution',
                'Plugin System' => 'Modular capability architecture with type-safe interfaces',
                'Knowledge Base' => 'Structured data storage for context-aware responses',
                'API Interface' => 'RESTful endpoints for client integration',
            ],
            'problem' => 'Manual repetitive workflows consume engineering time. Existing tools lack the flexibility to handle custom automation scenarios specific to backend engineering workflows.',
            'solution' => 'Built a Python-based assistant using FastAPI with modular pipeline architecture. Each capability is an isolated module that can be composed into complex workflows.',
            'architecture' => 'FastAPI backend with async processing, modular plugin architecture for capabilities, SQLite for persistence, and a clean REST interface for client integration.',
            'technologies' => ['Python', 'FastAPI', 'SQLite', 'REST APIs', 'Async Processing', 'Docker'],
            'layers' => [
                ['name' => 'Interface', 'tech' => ['REST API', 'Chat UI']],
                ['name' => 'Intelligence', 'tech' => ['Python', 'FastAPI', 'Plugins']],
                ['name' => 'Data', 'tech' => ['SQLite', 'File System']],
            ],
            'challenges' => [
                'Designing a plugin architecture that is both flexible and type-safe',
                'Managing async workflows reliably without losing state or data consistency',
                'Balancing response quality with processing speed',
            ],
            'lessons' => [
                'Async/await patterns in Python simplify concurrent pipeline execution',
                'Type hints and protocols enforce plugin contracts without inheritance overhead',
                'SQLite works well for prototyping but PostgreSQL is better for production',
                'Modular architecture makes it easy to add new capabilities without refactoring',
            ],
            'improvements' => [
                'OpenAI integration for natural language processing',
                'Browser automation capabilities',
                'Persistent conversation history',
                'Web-based management interface',
            ],
            'github' => 'https://github.com/Benzima397/ai-assistant.git',
            'live_demo' => null,
            'gallery' => [],
        ],
        [
            'title' => 'Python Automation',
            'slug' => 'python-automation',
            'status' => 'online',
            'status_label' => 'Online',
            'category' => 'Automation Engineering',
            'tagline' => 'Workflow automation and system orchestration',
            'description' => 'Collection of Python automation tools and scripts designed to streamline development workflows, data processing and system administration tasks.',
            'modules' => [
                'CLI Toolkit' => 'Command-line interfaces for each automation tool',
                'Pipeline Builder' => 'Composable pipeline architecture for chaining operations',
                'Config Engine' => 'YAML-based configuration with validation',
                'Scheduler' => 'Cron-based task scheduling with logging',
            ],
            'problem' => 'Repetitive manual tasks across development and operations slow down productivity. Each task requires context switching and is prone to human error.',
            'solution' => 'Developed a modular Python toolkit with configurable pipelines, CLI interfaces and logging. Each tool follows the Unix philosophy of doing one thing well.',
            'architecture' => 'Python packages with clean CLI interfaces, YAML-based configuration, structured logging, and composable pipeline architecture for chaining operations.',
            'technologies' => ['Python', 'Click', 'YAML', 'REST APIs', 'Cron', 'Docker'],
            'layers' => [
                ['name' => 'Interface', 'tech' => ['CLI', 'REST API']],
                ['name' => 'Pipeline', 'tech' => ['Python', 'Click', 'YAML']],
                ['name' => 'Execution', 'tech' => ['Cron', 'Docker', 'Shell']],
            ],
            'challenges' => [
                'Making automation tools reliable enough for production use',
                'Handling edge cases gracefully when automating manual tasks',
                'Ensuring idempotency across all pipeline operations',
            ],
            'lessons' => [
                'Click framework makes building professional CLIs straightforward',
                'YAML configuration with validation prevents runtime errors',
                'Structured logging is essential for debugging automated workflows',
                'Unix philosophy of small, composable tools creates maintainable systems',
            ],
            'improvements' => [
                'Web dashboard for monitoring automation runs',
                'Slack/Email notifications for pipeline status',
                'Marketplace for sharing automation modules',
            ],
            'github' => 'https://github.com/benjamin/python-automation',
            'live_demo' => null,
            'gallery' => [],
        ],
        [
            'title' => 'FastAPI WordPress Bridge',
            'slug' => 'fastapi-wordpress-bridge',
            'status' => 'in_development',
            'status_label' => 'In Development',
            'category' => 'Enterprise Integration',
            'tagline' => 'Bridging modern Python with enterprise WordPress',
            'description' => 'Bridge service connecting modern FastAPI backends with WordPress CMS, enabling enterprise content management with modern API capabilities.',
            'modules' => [
                'Sync Engine' => 'Bidirectional data synchronization between systems',
                'Webhook Handler' => 'Event-driven communication between WordPress and FastAPI',
                'Cache Layer' => 'Redis-based caching for performance optimization',
                'Admin Dashboard' => 'WordPress plugin for bridge status monitoring',
            ],
            'problem' => 'Enterprise WordPress sites need modern backend capabilities (async processing, ML pipelines, real-time data) but WordPress PHP architecture limits these integrations.',
            'solution' => 'Built a FastAPI service that communicates with WordPress via REST API and webhooks, providing a modern Python backend while preserving WordPress content management.',
            'architecture' => 'FastAPI middleware layer between WordPress and modern services, bidirectional webhook system, Redis for caching and queue management, and API gateway pattern.',
            'technologies' => ['Python', 'FastAPI', 'WordPress', 'REST APIs', 'Redis', 'Webhooks', 'Docker'],
            'layers' => [
                ['name' => 'Modern Layer', 'tech' => ['FastAPI', 'Python', 'Redis']],
                ['name' => 'Bridge', 'tech' => ['Webhooks', 'REST API', 'Sync']],
                ['name' => 'Legacy', 'tech' => ['WordPress', 'MySQL', 'PHP']],
            ],
            'challenges' => [
                'Maintaining data consistency between WordPress MySQL and the FastAPI service',
                'Handling WordPress plugin ecosystem variability in API responses',
                'Designing a conflict resolution strategy for bidirectional sync',
            ],
            'lessons' => [
                'Webhook-based sync is more reliable than polling for real-time updates',
                'WordPress REST API has inconsistent behavior across different post types',
                'Redis caching is critical for performance when bridging two systems',
                'Conflict resolution requires a clear strategy: last-write-wins is rarely correct',
            ],
            'improvements' => [
                'Bi-directional real-time sync',
                'WordPress admin dashboard for bridge status',
                'Support for headless WordPress with custom post types',
            ],
            'github' => 'https://github.com/benjamin/fastapi-wordpress-bridge',
            'live_demo' => null,
            'gallery' => [],
        ],
        [
    'title' => 'NEXUS — Engineering Lab',
            'slug' => 'nexus',
            'status' => 'online',
            'status_label' => 'Online',
            'category' => 'Engineering Lab',
            'tagline' => 'This engineering laboratory',
            'description' => 'This engineering lab — a production-ready personal engineering website built with Laravel 13, Blade, TailwindCSS and Alpine.js.',
            'modules' => [
                'Config Engine' => 'Content-driven configuration system for all site data',
                'Component Library' => 'Reusable Blade components with glass morphism design',
                'AI Interface' => 'Pre-built chat interface ready for API integration',
                'Resume System' => 'PDF management with download and online viewing',
            ],
            'problem' => 'Need a centralized engineering presence that showcases real work, not template portfolios.',
            'solution' => 'Built a config-driven Laravel application with clean architecture, reusable components and scalable design patterns.',
            'architecture' => 'Laravel MVC, config-driven content, Blade component system, service layer ready, Vite build pipeline.',
            'technologies' => ['Laravel', 'Blade', 'TailwindCSS', 'Alpine.js', 'Vite', 'MySQL'],
            'layers' => [
                ['name' => 'Presentation', 'tech' => ['Blade', 'TailwindCSS', 'Alpine.js']],
                ['name' => 'Application', 'tech' => ['Laravel', 'Controllers', 'Config']],
                ['name' => 'Data', 'tech' => ['MySQL', 'Config Files']],
            ],
            'challenges' => [
                'Designing a system that feels premium without unnecessary complexity',
                'Balancing aesthetics with performance and accessibility',
                'Creating reusable components that adapt to different content types',
            ],
            'lessons' => [
                'Config-driven architecture makes content updates trivial without code changes',
                'Blade components with slots enable highly reusable UI patterns',
                'TailwindCSS v4 CSS-first config is cleaner than JS-based configuration',
                'Alpine.js provides enough interactivity without the overhead of a full SPA framework',
            ],
            'improvements' => [
                'Python API integration for AI features',
                'Articles system with Markdown support',
                'GitHub integration for live project data',
                'Admin dashboard for content management',
            ],
            'github' => 'https://github.com/Benzima397/NEXUS.git',
            'live_demo' => 'Bencodes.tech',
            'gallery' => [],
        ],
    ],

    'stats' => [
        ['label' => 'Years Experience', 'value' => '5+', 'icon' => 'clock'],
        ['label' => 'APIs Built', 'value' => '15+', 'icon' => 'api'],
        ['label' => 'Technologies', 'value' => '10+', 'icon' => 'tech'],
        ['label' => 'Deployments', 'value' => '6', 'icon' => 'deploy'],
        ['label' => 'Active Projects', 'value' => '4', 'icon' => 'projects'],
    ],

    'technologies' => [
        'Primary' => [
            ['name' => 'Laravel', 'version' => '13'],
            ['name' => 'PHP', 'version' => '8.4'],
            ['name' => 'Python', 'version' => '3.x'],
            ['name' => 'MySQL', 'version' => '8'],
        ],
        'Services' => [
            ['name' => 'FastAPI', 'version' => ''],
            ['name' => 'Redis', 'version' => ''],
            ['name' => 'Docker', 'version' => ''],
            ['name' => 'Render', 'version' => ''],
        ],
        'Frontend' => [
            ['name' => 'Blade', 'version' => ''],
            ['name' => 'TailwindCSS', 'version' => '4'],
            ['name' => 'Alpine.js', 'version' => ''],
            ['name' => 'Vite', 'version' => '8'],
        ],
    ],

    'principles' => [
        [
            'title' => 'Service Layer Architecture',
            'description' => 'Controllers, services, repositories — clear separation of concerns with defined data flow.',
        ],
        [
            'title' => 'API First Design',
            'description' => 'Every feature has an API. RESTful design with versioning, authentication and documentation.',
        ],
        [
            'title' => 'Secure by Default',
            'description' => 'Authentication, authorization, encryption and input validation baked into every layer.',
        ],
        [
            'title' => 'Tested & Automated',
            'description' => 'Pest/PHPUnit testing, CI/CD pipelines and automated workflows. Code ships with confidence.',
        ],
        [
            'title' => 'Production Ready',
            'description' => 'Docker deployments, queue management, caching strategies and monitoring from day one.',
        ],
        [
            'title' => 'Config Driven',
            'description' => 'Content and behavior controlled through configuration. Easy to update, scalable by design.',
        ],
    ],

    'resume' => [
        'summary' => 'Backend Software Engineer specializing in building secure, scalable systems that connect enterprise applications and automate business processes. Proficient in Python, Laravel and modern backend technologies with a focus on API development, system integration and secure software practices.',

        'experience' => [
            [
                'title' => 'Backend Software Engineer',
                'company' => 'Independent / Contract',
                'period' => '2022 — Present',
                'year' => '2022',
                'description' => 'Building and maintaining backend systems, APIs and automation tools for enterprise clients. Specializing in Laravel, Python and system integrations.',
                'highlights' => [
                    'Designed and implemented RESTful APIs serving thousands of daily requests',
                    'Built automation pipelines reducing manual workflow time by significant margins',
                    'Integrated multiple enterprise systems including WordPress, CRM and payment platforms',
                    'Implemented security best practices including authentication, authorization and data encryption',
                ],
            ],
            [
                'title' => 'Full Stack Developer',
                'company' => 'Various Projects',
                'period' => '2020 — 2022',
                'year' => '2020',
                'description' => 'Developed full-stack web applications with focus on backend architecture and API design. Worked with Laravel, WordPress and custom PHP solutions.',
                'highlights' => [
                    'Built custom WordPress solutions for enterprise content management needs',
                    'Developed Laravel applications with service-oriented architecture',
                    'Created API integrations between disparate business systems',
                    'Implemented automated testing pipelines for code quality assurance',
                ],
            ],
        ],

        'projects' => [
            [
                'title' => 'Gridspace',
                'description' => 'Enterprise platform with API-first architecture built with Laravel, featuring scalable backend systems and real-time data processing.',
                'technologies' => ['Laravel', 'MySQL', 'REST APIs', 'Redis'],
            ],
            [
                'title' => 'AI Personal Assistant',
                'description' => 'Intelligent automation platform built with Python and FastAPI, featuring modular pipeline architecture for workflow automation.',
                'technologies' => ['Python', 'FastAPI', 'SQLite', 'Docker'],
            ],
            [
                'title' => 'Python Automation Suite',
                'description' => 'Collection of automation tools and scripts for streamlining development workflows and system administration tasks.',
                'technologies' => ['Python', 'Click', 'YAML', 'Cron'],
            ],
        ],

        'skills' => [
            'Languages' => ['Python', 'PHP', 'JavaScript', 'SQL', 'Bash'],
            'Frameworks' => ['Laravel', 'FastAPI', 'WordPress', 'REST APIs'],
            'Databases' => ['MySQL', 'PostgreSQL', 'SQLite', 'Redis'],
            'Tools' => ['Git', 'Docker', 'Linux', 'Nginx', 'Vite', 'TailwindCSS'],
            'Practices' => ['API Design', 'Secure Development', 'Testing', 'CI/CD', 'Code Review'],
            'Systems' => ['Queue Management', 'Caching Strategies', 'Authentication', 'System Integration'],
        ],

        'technologies' => [
            ['name' => 'Laravel', 'version' => '13', 'category' => 'Framework'],
            ['name' => 'PHP', 'version' => '8.4', 'category' => 'Language'],
            ['name' => 'Python', 'version' => '3.x', 'category' => 'Language'],
            ['name' => 'MySQL', 'version' => '8', 'category' => 'Database'],
            ['name' => 'FastAPI', 'version' => '', 'category' => 'Framework'],
            ['name' => 'Redis', 'version' => '', 'category' => 'Database'],
            ['name' => 'Docker', 'version' => '', 'category' => 'DevOps'],
            ['name' => 'Git', 'version' => '', 'category' => 'Tool'],
        ],

        'certifications' => [],

        'education' => [
            [
                'title' => 'Office Technology & Management',
                'company' => 'Polytechnic',
                'period' => '2025 — 2027',
                'year' => '2025',
                'description' => 'Foundation in software engineering principles, algorithms, data structures and system design.',
            ],
        ],

        'featured_projects' => ['gridspace', 'ai-personal-assistant', 'python-automation'],
    ],

    'contact' => [
        'email' => 'benjaminnwaochei@gmail.com',
        'github' => 'https://github.com/Benzima397',
        'linkedin' => 'https://www.linkedin.com/in/benjamin-nwaochei/',
        'message' => 'Open a communication channel. Every transmission is read and responded to.',
    ],

    'channels' => [
        [
            'name' => 'GitHub',
            'description' => 'Code repositories and open source work',
            'url' => 'https://github.com/Benzima397',
            'status' => 'online',
            'type' => 'external',
        ],
        [
            'name' => 'LinkedIn',
            'description' => 'Professional network and updates',
            'url' => 'https://www.linkedin.com/in/benjamin-nwaochei/',
            'status' => 'online',
            'type' => 'external',
        ],
        [
            'name' => 'Email',
            'description' => 'Direct communication channel',
            'url' => 'mailto:benjaminnwaochei@gmail.com',
            'status' => 'online',
            'type' => 'direct',
        ],
        [
            'name' => 'Resume',
            'description' => 'Download engineering credentials',
            'url' => '/resume',
            'status' => 'online',
            'type' => 'internal',
        ],
    ],

    'digital_engineer' => [
        'title' => 'Digital Engineer',
        'subtitle' => 'Benjamin\'s Digital Twin',
        'description' => 'Talk directly with Benjamin\'s Engineering Lab. Ask about projects, technologies, architecture decisions, or engineering experience.',
        'welcome_message' => 'Hello am Benjamin\'s Digital Engineer — a digital twin of his engineering knowledge. I can walk you through his projects, explain architecture decisions, discuss technologies, or help you understand his engineering approach. What would you like to explore?',
        'suggested_prompts' => [
            'Tell me about Benjamin',
            'Tell me about Gridspace',
            'Tell me about his Laravel experience',
            'What technologies does he use?',
            'Show me his projects',
            'How can I contact him?',
        ],
        'status_message' => 'Running on local knowledge — full AI integration coming soon.',
        'architecture' => [
            'name' => 'Digital Engineer Pipeline',
            'layers' => [
                ['name' => 'Interface', 'tech' => ['Chat UI', 'Suggested Prompts']],
                ['name' => 'Processing', 'tech' => ['PHP Service Layer', 'Future: Python API']],
                ['name' => 'Knowledge', 'tech' => ['Projects DB', 'Resume Data', 'Skills Graph']],
            ],
        ],
        'capabilities' => [
            ['name' => 'Project Deep Dives', 'description' => 'Detailed breakdowns of architecture, modules and engineering decisions'],
            ['name' => 'Technology Expertise', 'description' => 'Technical skills, frameworks and tooling knowledge'],
            ['name' => 'Engineering Philosophy', 'description' => 'Approach to building software systems'],
            ['name' => 'Resume & Experience', 'description' => 'Professional background and career journey'],
        ],
    ],

];
