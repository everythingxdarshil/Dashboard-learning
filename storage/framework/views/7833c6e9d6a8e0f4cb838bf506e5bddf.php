<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f3f4f6;
        }

        .navbar {
            background-color: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 1rem 0;
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            font-weight: bold;
            font-size: 1.25rem;
            color: #111827;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #4b5563;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: #111827;
        }

        .user-menu {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.25rem;
            text-transform: uppercase;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .user-avatar:hover {
            transform: scale(1.05);
        }

        .user-name-container {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            cursor: pointer;
        }

        .user-name {
            font-size: 0.875rem;
            color: #374151;
            font-weight: 500;
        }

        .dropdown-arrow {
            width: 12px;
            height: 12px;
            transition: transform 0.3s ease;
            color: #374151;
        }

        .user-menu.active .dropdown-arrow {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 0.5rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 0.5rem;
            min-width: 150px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .user-menu.active .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-links {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .dropdown-link {
            text-decoration: none;
            color: #4f46e5;
            font-size: 0.875rem;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease;
            display: block;
        }

        .dropdown-link:hover {
            background-color: #f3f4f6;
        }

        .logout-btn {
            background: none;
            border: none;
            color: #ef4444;
            cursor: pointer;
            font-size: 0.875rem;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease;
            width: 100%;
            text-align: left;
        }

        .logout-btn:hover {
            background-color: #fef2f2;
        }
    </style>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="navbar">
            <div class="nav-container">
                <div class="nav-brand"><?php echo e(config('app.name')); ?></div>
                <ul class="nav-links">
                    <li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                </ul>
                <div class="user-menu" id="userMenu">
                    <div class="user-avatar" onclick="toggleDropdown()">
                        <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                    </div>
                    <div class="user-name-container" onclick="toggleDropdown()">
                        <div class="user-name"><?php echo e(Auth::user()->name); ?></div>
                        <svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div class="dropdown-menu">
                        <div class="dropdown-links">
                            <a href="<?php echo e(route('profile.edit')); ?>" class="dropdown-link">Profile</a>
                            <?php if(Auth::user()->is_admin): ?>
                                <a href="<?php echo e(route('admin.dashboard')); ?>" class="dropdown-link">Admin Panel</a>
                            <?php endif; ?>
                            <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin: 0;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="logout-btn">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <script>
            function toggleDropdown() {
                const userMenu = document.getElementById('userMenu');
                userMenu.classList.toggle('active');
            }

            // Close dropdown when clicking outside
            document.addEventListener('click', function (event) {
                const userMenu = document.getElementById('userMenu');
                if (!userMenu.contains(event.target)) {
                    userMenu.classList.remove('active');
                }
            });
        </script>

        <!-- Page Heading -->
        <?php if(isset($header)): ?>
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <?php echo e($header); ?>

                </div>
            </header>
        <?php endif; ?>

        <!-- Page Content -->
        <main>
            <?php echo e($slot); ?>

        </main>
    </div>
</body>

</html><?php /**PATH C:\EverythingX\ERP\resources\views/layouts/app.blade.php ENDPATH**/ ?>