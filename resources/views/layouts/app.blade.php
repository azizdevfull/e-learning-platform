<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduTeach - @yield('title', 'Onlayn ta\'lim platformasi')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    {{--
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: { DEFAULT: '#4F46E5', hover: '#4338CA', light: '#E0E7FF' },
                        secondary: { DEFAULT: '#10B981', hover: '#059669', light: '#D1FAE5' },
                        accent: { DEFAULT: '#F59E0B', hover: '#D97706', light: '#FEF3C7' },
                        pastel: { blue: '#E0E7FF', green: '#D1FAE5', amber: '#FEF3C7', purple: '#EDE9FE', pink: '#FCE7F3', gray: '#F3F4F6' },
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    animation: { 'float': 'float 3s ease-in-out infinite', 'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite' },
                    keyframes: { float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-10px)' } } }
                }
            }
        }
    </script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Sizning CSS qismlaringiz shu yerda qoladi */
        body {
            font-family: 'Inter', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .category-pill {
            transition: all 0.3s ease;
        }

        .category-pill:hover {
            transform: scale(1.05);
        }

        .dropdown {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0s 0.2s;
        }

        .dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            transition: opacity 0.2s ease, transform 0.2s ease;
        }

        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .mobile-menu.show {
            transform: translateX(0);
        }

        .stats-item {
            position: relative;
        }

        .stats-item::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 70%;
            width: 1px;
            background-color: #E5E7EB;
        }

        .stats-item:last-child::after {
            display: none;
        }

        @media (max-width: 768px) {
            .stats-item::after {
                display: none;
            }
        }

        .testimonial-card {
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: scale(1.03);
        }

        .feature-icon {
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900">
    <!-- Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <span class="text-2xl font-bold text-primary">EduTeach</span>
                    </a>
                    <nav class="hidden md:ml-10 md:flex md:space-x-8">
                        <a href="{{ route('home') }}"
                            class="px-3 py-2 text-sm font-medium text-gray-900 hover:text-primary 
                        {{ request()->routeIs('home') ? 'text-primary' : '' }}">Bosh
                            sahifa</a>
                        <a href="#courses"
                            class="px-3 py-2 text-sm font-medium text-gray-900 hover:text-primary 
                        {{ request()->routeIs('courses.index') ? 'text-primary' : '' }}">Kurslar</a>
                        <div class="relative" id="categories-dropdown">
                            <button
                                class="text-gray-900 hover:text-primary px-3 py-2 text-sm font-medium flex items-center gap-1">
                                Kategoriyalar
                                <svg class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="dropdown absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-2 z-50"
                                id="categories-menu">
                                <x-categories.navbar />
                            </div>
                        </div>
                        @if (!request()->routeIs('courses.*'))
                            <a href="#about" class="text-gray-900 hover:text-primary px-3 py-2 text-sm font-medium">Biz
                                haqimizda</a>
                            <a href="#contact"
                                class="text-gray-900 hover:text-primary px-3 py-2 text-sm font-medium">Aloqa</a>
                        @endif
                    </nav>
                </div>
                <div class="hidden md:flex md:items-center md:space-x-4">
                    @guest
                        <a href="{{ route('login') }}"
                            class="text-gray-900 hover:text-primary px-3 py-2 text-sm font-medium">Kirish</a>
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover">Ro‘yxatdan
                            o‘tish</a>
                    @else
                        <div class="relative" id="user-dropdown">
                            <button class="flex items-center text-sm font-medium text-gray-900 hover:text-primary">
                                <img src="{{ auth()->user()->profile_photo_url ?? 'https://via.placeholder.com/32' }}"
                                    alt="User" class="h-8 w-8 rounded-full mr-2">
                                <span>{{ auth()->user()->name }}</span>
                                <svg class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="dropdown absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 z-50"
                                id="user-menu">
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sozlamalar</a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Chiqish</button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
                <div class="flex md:hidden">
                    <button id="mobile-menu-button"
                        class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div class="mobile-menu fixed inset-0 bg-gray-800 bg-opacity-75 z-50 md:hidden" id="mobile-menu">
            <div class="absolute top-0 left-0 w-3/4 max-w-xs h-full bg-white shadow-xl p-4">
                <div class="flex items-center justify-between mb-6">
                    <a href="/" class="flex items-center">
                        <span class="text-xl font-bold text-primary">EduTeach</span>
                    </a>
                    <button id="close-mobile-menu"
                        class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <nav class="flex flex-col space-y-2">
                    <a href="/"
                        class="text-gray-900 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Bosh
                        sahifa</a>
                    <a href="#courses"
                        class="text-gray-900 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Kurslar</a>
                    <div class="relative">
                        <button
                            class="text-gray-900 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium flex items-center justify-between w-full"
                            id="mobile-categories-button">
                            Kategoriyalar
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="hidden pl-4 mt-1 space-y-1" id="mobile-categories-menu">
                            <x-welcome.categories />
                        </div>
                    </div>
                    <a href="#about"
                        class="text-gray-900 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Biz
                        haqimizda</a>
                    <a href="#contact"
                        class="text-gray-900 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Aloqa</a>
                </nav>
                <div class="mt-6 pt-6 border-t border-gray-200">
                    @guest
                        <a href="{{ route('login') }}"
                            class="block w-full text-center px-4 py-2 text-sm font-medium text-primary hover:bg-gray-100 rounded-md mb-2">Kirish</a>
                        <a href="{{ route('register') }}"
                            class="block w-full text-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover">Ro‘yxatdan
                            o‘tish</a>
                    @else
                        <div class="flex items-center px-3 py-2 mb-4">
                            <img src="{{ auth()->user()->profile_photo_url ?? 'https://via.placeholder.com/32' }}"
                                alt="User" class="h-8 w-8 rounded-full mr-2">
                            <span class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</span>
                        </div>
                        <a href="{{ route('dashboard') }}"
                            class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Dashboard</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Profil</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Sozlamalar</a>
                        <div class="border-t border-gray-200 my-2"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Chiqish</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-1">
                    <a href="/" class="flex items-center mb-4">
                        <span class="text-2xl font-bold text-white">EduTeach</span>
                    </a>
                    <p class="text-gray-400 mb-4">Zamonaviy ta'lim platformasi. Istalgan joyda, istalgan vaqtda o'qish
                        imkoniyati.</p>
                    <div class="flex space-x-4">
                        <!-- Ijtimoiy tarmoqlar ikonkalari -->
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775..." />
                            </svg>
                        </a>
                        <!-- Boshqa ikonkalarni qo‘shing -->
                    </div>
                </div>
                <div class="md:col-span-1">
                    <h3 class="text-lg font-semibold mb-4">Tezkor havolalar</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-white">Bosh sahifa</a></li>
                        <li
                            class="{{ request()->routeIs('courses.index') ? 'bg-primary-dark text-white' : 'text-gray-400 hover:text-white' }}">
                            <a href="#courses">Kurslar</a>
                        </li>
                        <li><a href="#about" class="text-gray-400 hover:text-white">Biz haqimizda</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white">Aloqa</a></li>
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white">Kirish</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white">Ro‘yxatdan
                                o‘tish</a></li>
                    </ul>
                </div>
                <div class="md:col-span-1">
                    <h3 class="text-lg font-semibold mb-4">Kategoriyalar</h3>
                    <ul class="space-y-2">
                        <x-categories.footer />
                    </ul>
                </div>
                <div class="md:col-span-1">
                    <h3 class="text-lg font-semibold mb-4">Yangiliklarga obuna bo‘ling</h3>
                    <p class="text-gray-400 mb-4">Yangi kurslar va maxsus takliflar haqida xabardor bo‘lib turing.</p>
                    <form class="space-y-2">
                        <input type="email" placeholder="Email manzilingiz"
                            class="w-full px-3 py-2 text-gray-900 bg-white rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        <button type="submit"
                            class="w-full bg-primary hover:bg-primary-hover text-white font-medium py-2 px-4 rounded-md">Obuna
                            bo‘lish</button>
                    </form>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8">
                <p class="text-gray-400 text-sm text-center">&copy; {{ date('Y') }} EduTeach. Barcha huquqlar
                    himoyalangan.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Categories dropdown
        const categoriesDropdown = document.getElementById('categories-dropdown');
        const categoriesMenu = document.getElementById('categories-menu');

        if (categoriesDropdown && categoriesMenu) {
            categoriesDropdown.addEventListener('click', function(e) {
                e.stopPropagation();
                categoriesMenu.classList.toggle('show');
            });
        }

        // User dropdown
        const userDropdown = document.getElementById('user-dropdown');
        const userMenu = document.getElementById('user-menu');

        if (userDropdown && userMenu) {
            userDropdown.addEventListener('click', function(e) {
                e.stopPropagation();
                userMenu.classList.toggle('show');
            });
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function() {
            if (categoriesMenu) categoriesMenu.classList.remove('show');
            if (userMenu) userMenu.classList.remove('show');
        });

        // Mobile menu
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMobileMenuButton = document.getElementById('close-mobile-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu && closeMobileMenuButton) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.add('show');
            });

            closeMobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.remove('show');
            });
        }

        // Mobile categories dropdown
        const mobileCategoriesButton = document.getElementById('mobile-categories-button');
        const mobileCategoriesMenu = document.getElementById('mobile-categories-menu');

        if (mobileCategoriesButton && mobileCategoriesMenu) {
            mobileCategoriesButton.addEventListener('click', function() {
                mobileCategoriesMenu.classList.toggle('hidden');
            });
        }

        // Login/Logout functionality (for demo purposes)
        const logoutButton = document.getElementById('logout-button');
        const mobileLogoutButton = document.getElementById('mobile-logout-button');
        const loggedOutButtons = document.getElementById('logged-out-buttons');
        const loggedInButtons = document.getElementById('logged-in-buttons');
        const mobileLoggedOutButtons = document.getElementById('mobile-logged-out-buttons');
        const mobileLoggedInButtons = document.getElementById('mobile-logged-in-buttons');

        // Check if user is logged in (demo)
        function checkLoginStatus() {
            const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';

            if (loggedOutButtons && loggedInButtons) {
                if (isLoggedIn) {
                    loggedOutButtons.classList.add('hidden');
                    loggedInButtons.classList.remove('hidden');
                } else {
                    loggedOutButtons.classList.remove('hidden');
                    loggedInButtons.classList.add('hidden');
                }
            }

            if (mobileLoggedOutButtons && mobileLoggedInButtons) {
                if (isLoggedIn) {
                    mobileLoggedOutButtons.classList.add('hidden');
                    mobileLoggedInButtons.classList.remove('hidden');
                } else {
                    mobileLoggedOutButtons.classList.remove('hidden');
                    mobileLoggedInButtons.classList.add('hidden');
                }
            }
        }

        // Run on page load
        checkLoginStatus();

        // Logout functionality
        if (logoutButton) {
            logoutButton.addEventListener('click', function(e) {
                e.preventDefault();
                localStorage.setItem('isLoggedIn', 'false');
                checkLoginStatus();
            });
        }

        if (mobileLogoutButton) {
            mobileLogoutButton.addEventListener('click', function(e) {
                e.preventDefault();
                localStorage.setItem('isLoggedIn', 'false');
                checkLoginStatus();
                mobileMenu.classList.remove('show');
            });
        }

        // Category filtering
        const categoryPills = document.querySelectorAll('.category-pill');
        const courseCards = document.querySelectorAll('[data-category]');

        categoryPills.forEach(pill => {
            pill.addEventListener('click', function(e) {
                e.preventDefault();

                const category = this.getAttribute('data-category');

                // Remove active class from all pills
                categoryPills.forEach(p => p.classList.remove('bg-primary', 'text-white'));
                categoryPills.forEach(p => {
                    if (p.getAttribute('data-category') === 'mathematics') {
                        p.classList.add('bg-primary-light', 'text-primary');
                    } else if (p.getAttribute('data-category') === 'programming') {
                        p.classList.add('bg-secondary-light', 'text-secondary');
                    } else if (p.getAttribute('data-category') === 'languages') {
                        p.classList.add('bg-accent-light', 'text-accent');
                    } else if (p.getAttribute('data-category') === 'science') {
                        p.classList.add('bg-pastel-purple', 'text-purple-600');
                    } else if (p.getAttribute('data-category') === 'art') {
                        p.classList.add('bg-pastel-pink', 'text-pink-600');
                    }
                });

                // Add active class to clicked pill
                this.classList.remove('bg-primary-light', 'bg-secondary-light', 'bg-accent-light',
                    'bg-pastel-purple', 'bg-pastel-pink');
                this.classList.remove('text-primary', 'text-secondary', 'text-accent', 'text-purple-600',
                    'text-pink-600');
                this.classList.add('bg-primary', 'text-white');

                // Filter courses
                courseCards.forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Adjust for header height
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    if (mobileMenu && mobileMenu.classList.contains('show')) {
                        mobileMenu.classList.remove('show');
                    }
                }
            });
        });
    </script>

</body>

</html>
