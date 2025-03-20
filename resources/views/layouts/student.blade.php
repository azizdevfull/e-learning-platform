<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "EduPortal - O'quv platformasi")</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                <a href="{{ route('student.dashboard') }}" class="flex items-center">
                    <span class="text-xl font-bold text-primary">EduPortal</span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('student.dashboard') }}" class="px-3 py-2 rounded-md hover:bg-gray-100">Dashboard</a>
                <a href="{{ route('student.courses.index') }}"
                    class="px-3 py-2 rounded-md hover:bg-gray-100">Kurslar</a>
                <a href="{{ route('student.tests.index') }}" class="px-3 py-2 rounded-md hover:bg-gray-100">Testlar</a>
                <a href="{{ route('student.profile') }}" class="px-3 py-2 rounded-md hover:bg-gray-100">Profil</a>
            </div>

            <div class="flex items-center space-x-2">
                <div class="relative">
                    <button id="profile-menu-btn" class="p-1 rounded-full hover:bg-gray-100">
                        <img src="{{ asset('images/default-profile.png') }}" alt="Profile" class="h-8 w-8 rounded-full">
                    </button>
                    <div id="profile-dropdown"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        <a href="{{ route('student.profile') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                        <div class="border-t border-gray-100"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full">Chiqish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="sidebar fixed left-0 top-16 z-20 h-[calc(100vh-4rem)] w-64 bg-sidebar border-r border-gray-200 md:translate-x-0">
        <div class="flex flex-col gap-2 p-4">
            <div class="py-2">
                <h2 class="px-3 text-lg font-semibold">Asosiy</h2>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('student.dashboard') }}"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors {{ request()->routeIs('student.dashboard') ? 'bg-primary text-white' : 'hover:bg-sidebar-hover text-gray-600 hover:text-gray-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('student.courses.index') }}"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors {{ request()->routeIs('student.courses.*') ? 'bg-primary text-white' : 'hover:bg-sidebar-hover text-gray-600 hover:text-gray-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span>Kurslar</span>
                    </a>
                    <a href="{{ route('student.tests.index') }}"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors {{ request()->routeIs('student.tests.*') ? 'bg-primary text-white' : 'hover:bg-sidebar-hover text-gray-600 hover:text-gray-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span>Testlar</span>
                    </a>
                </div>
            </div>

            <!-- Kategoriyalar (hozircha statik, keyin dinamik qilinishi mumkin) -->
            <div class="py-2">
                <h2 class="px-3 text-lg font-semibold">Kategoriyalar</h2>
                <div class="mt-3 space-y-1">
                    <a href="#"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors hover:bg-sidebar-hover text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <span>Dasturlash</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors hover:bg-sidebar-hover text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <span>Dizayn</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors hover:bg-sidebar-hover text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <span>Marketing</span>
                    </a>
                </div>
            </div>

            <!-- Boshqarish (hozircha statik yoki keyin qo‘shiladi) -->
            <div class="py-2">
                <h2 class="px-3 text-lg font-semibold">Boshqarish</h2>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('student.results.index') }}"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors {{ request()->routeIs('student.results.index') ? 'bg-primary text-white' : 'hover:bg-sidebar-hover text-gray-600 hover:text-gray-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span>Natijalar</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors hover:bg-sidebar-hover text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        <span>Forum</span>
                    </a>
                    <a href="{{ route('student.profile') }}"
                        class="flex items-center gap-3 rounded-md px-3 py-2 text-sm transition-colors hover:bg-sidebar-hover text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>Profil</span>
                    </a>
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
                </div>
            </div>
        </div>
    </aside>

    @yield('content')



    <!-- Modal -->
    <div id="modal" class="modal fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
        <div class="modal-content bg-white rounded-lg shadow-xl w-full max-w-md">
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-lg font-medium" id="modal-title">Modal Title</h3>
                <button id="close-modal" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="p-4" id="modal-content">
                <!-- Modal content will be inserted here -->
            </div>
            <div class="p-4 border-t flex justify-end space-x-2" id="modal-footer">
                <button id="modal-cancel"
                    class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    Bekor qilish
                </button>
                <button id="modal-confirm"
                    class="px-4 py-2 bg-primary text-white rounded-md text-sm font-medium hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    Tasdiqlash
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
            showToast('Yangi xabar', 'Siz yangi kurs uchun ro\'yxatdan o\'tdingiz');
        });

        // Modal
        const modal = document.getElementById('modal');
        const closeModal = document.getElementById('close-modal');
        const modalCancel = document.getElementById('modal-cancel');

        function openModal(title, content, onConfirm = null) {
            document.getElementById('modal-title').textContent = title;
            document.getElementById('modal-content').innerHTML = content;

            const modalConfirm = document.getElementById('modal-confirm');

            if (onConfirm) {
                modalConfirm.onclick = onConfirm;
            }

            modal.classList.add('open');
        }

        function closeModalFunc() {
            modal.classList.remove('open');
        }

        closeModal.addEventListener('click', closeModalFunc);
        modalCancel.addEventListener('click', closeModalFunc);

        // Close modal when clicking outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModalFunc();
            }
        });

        // Example of opening a modal
        // Uncomment to test
        /*
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                openModal(
                    'Kursni boshlash', 
                    '<p>Siz haqiqatan ham bu kursni boshlashni xohlaysizmi?</p>',
                    () => {
                        showToast('Muvaffaqiyatli', 'Kurs boshlandi');
                        closeModalFunc();
                    }
                );
            }, 1000);
        });
        */
    </script>
</body>

</html>