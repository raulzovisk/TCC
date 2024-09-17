<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-22">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" /> <!-- LOGO -->
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">


                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    
                    @if (!Auth::user() || (Auth::user() && !Auth::user()->is_admin && Auth::user()->isNotAluno()))
                      <!-- Silenciar  <x-nav-link href="{{ route('Aluno.list') }}" :active="request()->routeIs('Aluno.create')">
                            {{ __('Cadastro Aluno') }}
                       </x-nav-link> -->
                    @endif

                    @if (Auth::user() && !Auth::user()->is_admin )
                        <x-nav-link href="{{ route('Aluno.show') }}" :active="request()->routeIs('Aluno.show')">
                            {{ __('Dados Aluno') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('Ficha.index') }}" :active="request()->routeIs('Fichas.index')">
                            {{ __('Fichas') }}
                        </x-nav-link>
                    @endif

                    @if (Auth::user() && Auth::user()->is_admin)
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex mt-3">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ 'Instrutores' }}
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60">
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Opções') }}
                                    </div>
                                    <x-dropdown-link href="{{ route('Instrutor.index') }}">
                                        {{ __('Listar Instrutores') }}
                                    </x-dropdown-link>
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @endif
                    @if (Auth::user() && Auth::user()->instrutor || Auth::user() && Auth::user()->is_admin )
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex mt-3">
                            <x-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ 'Alunos' }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 4h6v6h-6z" />
                                            <path d="M14 4h6v6h-6z" />
                                            <path d="M4 14h6v6h-6z" />
                                            <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="ms-2 -me-0.5 h-4 w-4">
                                            <path stroke="none" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"
                                                fill="none" />
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="w-60">
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Opções') }}
                                        </div>
                                        <x-dropdown-link href="{{ route('Aluno.list') }}">
                                            {{ __('Cadastrar Aluno') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link href="{{ route('Aluno.index') }}">
                                            {{ __('Listar Alunos') }}
                                        </x-dropdown-link>
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex mt-3">
                            <x-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ 'Exercícios' }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 4h6v6h-6z" />
                                            <path d="M14 4h6v6h-6z" />
                                            <path d="M4 14h6v6h-6z" />
                                            <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="ms-2 -me-0.5 h-4 w-4">
                                            <path stroke="none" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"
                                                fill="none" />
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="w-60">
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Opções') }}
                                        </div>
                                        <x-dropdown-link href="{{ route('Exercicio.create') }}">
                                            {{ __('Exercícios') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link href="{{ route('Categoria.index') }}">
                                            {{ __('Categorias') }}
                                        </x-dropdown-link>
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div> 
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex mt-3">
                            <x-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ 'Fichas' }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 4h6v6h-6z" />
                                            <path d="M14 4h6v6h-6z" />
                                            <path d="M4 14h6v6h-6z" />
                                            <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="ms-2 -me-0.5 h-4 w-4">
                                            <path stroke="none" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"
                                                fill="none" />
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="w-60">
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Opções') }}
                                        </div>
                                        <x-dropdown-link href="{{ route('Ficha.create') }}">
                                            {{ __('Criar Fichas') }}
                                        </x-dropdown-link>
                                    </div>
                                </x-slot>
                                
                                
                            </x-dropdown>
                        </div> 
                    @endif

                </div>
            </div>


            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>public/img/logo site melhor qualidade.jpg
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Gerenciar Conta') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Sair') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            @if (!Auth::user() || (Auth::user() && !Auth::user()->is_admin && Auth::user()->isNotAluno()))
              <!-- Silenciar  <x-responsive-nav-link href="{{ route('Aluno.list') }}" :active="request()->routeIs('Aluno.create')">
                    {{ __('Cadastro Aluno') }}
               </x-responsive-nav-link> -->
            @endif
            
            @if (Auth::user() && !Auth::user()->is_admin)
                <x-responsive-nav-link href="{{ route('Aluno.show') }}" :active="request()->routeIs('Aluno.show')">
                    {{ __('Dados Aluno') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('Ficha.index') }}" :active="request()->routeIs('Fichas.index')">
                    {{ __('Fichas') }}
                </x-responsive-nav-link>
            @endif
            
            @if (Auth::user() && Auth::user()->is_admin)
                <x-dropdown align="right" width="60">
                    <x-slot name="trigger">
                        <x-responsive-nav-link href="#">
                            {{ __('Instrutores') }}
                        </x-responsive-nav-link>
                    </x-slot>
                    <x-slot name="content">
                        <div class="w-60">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Opções') }}
                            </div>
                            <x-dropdown-link href="{{ route('Instrutor.assign') }}">
                                {{ __('Atribuir Instrutor') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('Instrutor.index') }}">
                                {{ __('Listar Instrutores') }}
                            </x-dropdown-link>
                        </div>
                    </x-slot>
                </x-dropdown>
            @endif
            
            @if (Auth::user() && (Auth::user()->instrutor || Auth::user()->is_admin))
                <x-dropdown align="right" width="60">
                    <x-slot name="trigger">
                        <x-responsive-nav-link href="#">
                            {{ __('Alunos') }}
                        </x-responsive-nav-link>
                    </x-slot>
                    <x-slot name="content">
                        <div class="w-60">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Opções') }}
                            </div>
                            <x-dropdown-link href="{{ route('Aluno.list') }}">
                                {{ __('Cadastrar Aluno') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('Aluno.index') }}">
                                {{ __('Listar Alunos') }}
                            </x-dropdown-link>
                        </div>
                    </x-slot>
                </x-dropdown>
            
                <x-dropdown align="right" width="60">
                    <x-slot name="trigger">
                        <x-responsive-nav-link href="#">
                            {{ __('Exercícios') }}
                        </x-responsive-nav-link>
                    </x-slot>
                    <x-slot name="content">
                        <div class="w-60">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Opções') }}
                            </div>
                            <x-dropdown-link href="{{ route('Exercicio.create') }}">
                                {{ __('Exercícios') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('Categoria.index') }}">
                                {{ __('Categorias') }}
                            </x-dropdown-link>
                        </div>
                    </x-slot>
                </x-dropdown>
            
                <x-dropdown align="right" width="60">
                    <x-slot name="trigger">
                        <x-responsive-nav-link href="#">
                            {{ __('Fichas') }}
                        </x-responsive-nav-link>
                    </x-slot>
                    <x-slot name="content">
                        <div class="w-60">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Opções') }}
                            </div>
                            <x-dropdown-link href="{{ route('Ficha.create') }}">
                                {{ __('Criar Fichas') }}
                            </x-dropdown-link>
                        </div>
                    </x-slot>
                </x-dropdown>
            @endif
            
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                        :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
