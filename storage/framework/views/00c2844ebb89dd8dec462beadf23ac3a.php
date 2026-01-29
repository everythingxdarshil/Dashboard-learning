<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <style>
        /* Statistics Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 0.5rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .stat-card-inner {
            display: flex;
            align-items: center;
        }

        .stat-icon {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon svg {
            width: 24px;
            height: 24px;
            color: white;
        }

        .stat-icon.indigo {
            background-color: #6366f1;
        }

        .stat-icon.purple {
            background-color: #a855f7;
        }

        .stat-icon.green {
            background-color: #22c55e;
        }

        .stat-icon.blue {
            background-color: #3b82f6;
        }

        .stat-icon.yellow {
            background-color: #eab308;
        }

        .stat-content {
            margin-left: 1.25rem;
            flex: 1;
        }

        .stat-label {
            font-size: 0.875rem;
            color: #6b7280;
            font-weight: 500;
            text-transform: uppercase;
        }

        .stat-value {
            font-size: 1.875rem;
            font-weight: 600;
            color: #111827;
        }

        /* Table */
        .card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .card h3 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #f9fafb;
        }

        th {
            padding: 0.75rem 1.5rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 500;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        td {
            padding: 1rem 1.5rem;
            border-top: 1px solid #e5e7eb;
        }

        tbody tr:hover {
            background-color: #f9fafb;
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 9999px;
        }

        .badge-purple {
            background-color: #f3e8ff;
            color: #7c3aed;
        }

        .badge-gray {
            background-color: #f3f4f6;
            color: #374151;
        }

        .badge-green {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-yellow {
            background-color: #fef3c7;
            color: #92400e;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        .text-gray-900 {
            color: #111827;
        }

        .font-medium {
            font-weight: 500;
        }

        .link {
            color: #4f46e5;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .link:hover {
            color: #3730a3;
        }

        .mt-4 {
            margin-top: 1rem;
        }
    </style>

    <div class="container">
        <!-- Statistics Cards -->
        <div class="stats-grid">
            <!-- Total Users -->
            <div class="stat-card">
                <div class="stat-card-inner">
                    <div class="stat-icon indigo">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Total Users</div>
                        <div class="stat-value"><?php echo e($stats['total_users']); ?></div>
                    </div>
                </div>
            </div>

            <!-- Admin Users -->
            <div class="stat-card">
                <div class="stat-card-inner">
                    <div class="stat-icon purple">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Admin Users</div>
                        <div class="stat-value"><?php echo e($stats['admin_users']); ?></div>
                    </div>
                </div>
            </div>

            <!-- Regular Users -->
            <div class="stat-card">
                <div class="stat-card-inner">
                    <div class="stat-icon green">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Regular Users</div>
                        <div class="stat-value"><?php echo e($stats['regular_users']); ?></div>
                    </div>
                </div>
            </div>

            <!-- Verified Users -->
            <div class="stat-card">
                <div class="stat-card-inner">
                    <div class="stat-icon blue">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Verified Users</div>
                        <div class="stat-value"><?php echo e($stats['verified_users']); ?></div>
                    </div>
                </div>
            </div>

            <!-- Unverified Users -->
            <div class="stat-card">
                <div class="stat-card-inner">
                    <div class="stat-icon yellow">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <div class="stat-label">Unverified Users</div>
                        <div class="stat-value"><?php echo e($stats['unverified_users']); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Users Table -->
        <div class="card">
            <h3>Recent Users</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $recent_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <div class="text-sm font-medium text-gray-900"><?php echo e($user->name); ?></div>
                            </td>
                            <td>
                                <div class="text-sm text-gray-500"><?php echo e($user->email); ?></div>
                            </td>
                            <td>
                                <?php if($user->is_admin): ?>
                                    <span class="badge badge-purple">Admin</span>
                                <?php else: ?>
                                    <span class="badge badge-gray">User</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($user->email_verified_at): ?>
                                    <span class="badge badge-green">Verified</span>
                                <?php else: ?>
                                    <span class="badge badge-yellow">Unverified</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-sm text-gray-500">
                                <?php echo e($user->created_at->diffForHumans()); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" style="text-align: center; color: #6b7280;">
                                No users found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="mt-4">
                <a href="<?php echo e(route('admin.users.index')); ?>" class="link">
                    View all users →
                </a>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?><?php /**PATH C:\EverythingX\ERP\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>