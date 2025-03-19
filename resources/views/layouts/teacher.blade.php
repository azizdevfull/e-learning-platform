<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O'qituvchi Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    {{--
    <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            transition: transform 0.3s ease;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }
        }

        .toast {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            transform: translateY(150%);
            transition: transform 0.3s ease;
            z-index: 50;
        }

        .toast.show {
            transform: translateY(0);
        }

        .modal {
            transition: opacity 0.3s ease, visibility 0.3s ease;
            opacity: 0;
            visibility: hidden;
        }

        .modal.open {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            transition: transform 0.3s ease;
            transform: scale(0.95);
        }

        .modal.open .modal-content {
            transform: scale(1);
        }

        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        .spinner {
            border: 3px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top: 3px solid #4F46E5;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900 min-h-screen">
    <!-- Navbar -->
    <header class="bg-white shadow-sm fixed top-0 left-0 right-0 z-30">
        <div class="flex items-center justify-between h-16 px-4 md:px-6">
            <div class="flex items-center">
                <button id="menu-toggle" class="md:hidden mr-2 p-2 rounded-md hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <a href="index.html" class="flex items-center">
                    <span class="text-xl font-bold text-primary">EduTeach</span>
                </a>
            </div>

            <div class="flex items-center space-x-2">
                <div class="hidden md:block relative w-64">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-2 top-2.5 h-4 w-4 text-gray-400"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" placeholder="Qidirish..."
                        class="pl-8 pr-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                <button id="notification-btn" class="p-2 rounded-md hover:bg-gray-100 relative tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">3</span>
                    <span class="tooltiptext">Bildirishnomalar</span>
                </button>
                <div class="relative">
                    <button id="profile-menu-btn" class="p-1 rounded-full hover:bg-gray-100 tooltip">
                        <img src="#" alt="Profile" class="h-8 w-8 rounded-full">
                        <span class="tooltiptext">Profil</span>
                    </button>
                    <div id="profile-dropdown"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        <div class="px-4 py-2 border-b">
                            <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="profile.html"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                        <a href="settings.html"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sozlamalar</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Chiqish</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="sidebar fixed left-0 top-16 z-20 h-[calc(100vh-4rem)] w-64 bg-sidebar border-r border-gray-200 md:translate-x-0">
        <div class="flex flex-col h-full">
            <div class="p-4 border-b">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/default-profile.png') }}" alt="Teacher" class="h-12 w-12 rounded-full">
                    <div>
                        <h3 class="font-medium">{{ Auth::user()->name }}</h3>
                        <p class="text-xs text-gray-500">O'qituvchi</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-auto p-4">
                <nav class="space-y-1">
                    <a href="{{ route('teacher.dashboard') }}"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors {{ request()->routeIs('teacher.dashboard') ? 'bg-primary text-white' : 'hover:bg-sidebar-hover text-gray-600 hover:text-gray-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('teacher.courses.index') }}"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors {{ request()->routeIs('teacher.courses.index') ? 'bg-primary text-white' : 'hover:bg-sidebar-hover text-gray-600 hover:text-gray-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span>Kurslar</span>
                    </a>
                    <a href="{{ route('teacher.tests.index') }}"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors {{ request()->routeIs('teacher.tests.index') ? 'bg-primary text-white' : 'hover:bg-sidebar-hover text-gray-600 hover:text-gray-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span>Testlar</span>
                    </a>
                    <a href="{{ route('teacher.statistics.index') }}"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors {{ request()->routeIs('teacher.statistics.index') ? 'bg-primary text-white' : 'hover:bg-sidebar-hover text-gray-600 hover:text-gray-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>Talabalar</span>
                    </a>
                    <a href="{{ route('teacher.statistics.index') }}"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors {{ request()->routeIs('teacher.statistics.index') ? 'bg-primary text-white' : 'hover:bg-sidebar-hover text-gray-600 hover:text-gray-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span>Statistika</span>
                    </a>
                </nav>
            </div>

            <div class="p-4 border-t">
                <a href="#"
                    class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors hover:bg-sidebar-hover text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Sozlamalar</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors hover:bg-sidebar-hover text-gray-600 hover:text-gray-900 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Chiqish</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    @yield('content')

    <!-- Add Course Modal -->
    <div id="add-course-modal"
        class="modal fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
        <div class="modal-content bg-white rounded-lg shadow-xl w-full max-w-md">
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-lg font-medium">Yangi kurs qo'shish</h3>
                <button id="close-course-modal" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="p-4">
                <form>
                    <div class="space-y-4">
                        <div>
                            <label for="course-name" class="block text-sm font-medium text-gray-700">Kurs nomi</label>
                            <input type="text" id="course-name" name="course-name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                placeholder="Kurs nomini kiriting">
                        </div>
                        <div>
                            <label for="course-description"
                                class="block text-sm font-medium text-gray-700">Tavsif</label>
                            <textarea id="course-description" name="course-description" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                placeholder="Kurs haqida qisqacha ma'lumot"></textarea>
                        </div>
                        <div>
                            <label for="course-category"
                                class="block text-sm font-medium text-gray-700">Kategoriya</label>
                            <select id="course-category" name="course-category"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                                <option value="">Kategoriyani tanlang</option>
                                <option value="algebra">Algebra</option>
                                <option value="geometry">Geometriya</option>
                                <option value="trigonometry">Trigonometriya</option>
                                <option value="calculus">Matematik analiz</option>
                            </select>
                        </div>
                        <div>
                            <label for="course-duration" class="block text-sm font-medium text-gray-700">Davomiyligi
                                (hafta)</label>
                            <input type="number" id="course-duration" name="course-duration" min="1"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                placeholder="Hafta sonini kiriting">
                        </div>
                    </div>
                </form>
            </div>
            <div class="p-4 border-t flex justify-end space-x-2">
                <button id="cancel-course"
                    class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    Bekor qilish
                </button>
                <button id="save-course"
                    class="px-4 py-2 bg-primary text-white rounded-md text-sm font-medium hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    Saqlash
                </button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="toast max-w-md bg-white rounded-lg border border-gray-200 shadow-md p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3 w-0 flex-1">
                <p class="text-sm font-medium text-gray-900" id="toast-title">Muvaffaqiyatli</p>
                <p class="mt-1 text-sm text-gray-500" id="toast-description">Amal muvaffaqiyatli bajarildi</p>
            </div>
            <div class="ml-4 flex-shrink-0 flex">
                <button id="close-toast" class="inline-flex text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Yopish</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });

        // Profile dropdown
        const profileMenuBtn = document.getElementById('profile-menu-btn');
        const profileDropdown = document.getElementById('profile-dropdown');

        profileMenuBtn.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!profileMenuBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });

        // Toast notification
        const toast = document.getElementById('toast');
        const closeToast = document.getElementById('close-toast');
        const notificationBtn = document.getElementById('notification-btn');

        function showToast(title, description, duration = 3000) {
            document.getElementById('toast-title').textContent = title;
            document.getElementById('toast-description').textContent = description;
            toast.classList.add('show');

            if (duration > 0) {
                setTimeout(() => {
                    toast.classList.remove('show');
                }, duration);
            }
        }

        closeToast.addEventListener('click', () => {
            toast.classList.remove('show');
        });

        notificationBtn.addEventListener('click', () => {
            showToast('Yangi xabar', 'Sizda 3 ta o\'qilmagan xabar bor');
        });

        // Add Course Modal
        const addCourseBtn = document.getElementById('add-course-btn');
        const addCourseModal = document.getElementById('add-course-modal');
        const closeCourseModal = document.getElementById('close-course-modal');
        const cancelCourse = document.getElementById('cancel-course');
        const saveCourse = document.getElementById('save-course');

        function openCourseModal() {
            addCourseModal.classList.add('open');
        }

        function closeCourseModalFunc() {
            addCourseModal.classList.remove('open');
        }

        addCourseBtn.addEventListener('click', openCourseModal);
        closeCourseModal.addEventListener('click', closeCourseModalFunc);
        cancelCourse.addEventListener('click', closeCourseModalFunc);

        // Close modal when clicking outside
        addCourseModal.addEventListener('click', (e) => {
            if (e.target === addCourseModal) {
                closeCourseModalFunc();
            }
        });

        // Save course
        saveCourse.addEventListener('click', () => {
            // Show loading spinner
            saveCourse.innerHTML = '<div class="spinner mx-auto"></div>';

            // Simulate API call
            setTimeout(() => {
                closeCourseModalFunc();
                showToast('Muvaffaqiyatli', 'Yangi kurs muvaffaqiyatli qo\'shildi');
                saveCourse.innerHTML = 'Saqlash';
            }, 1500);
        });
    </script>
</body>

</html>