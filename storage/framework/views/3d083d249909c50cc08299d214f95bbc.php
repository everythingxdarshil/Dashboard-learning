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
     <?php $__env->slot('header', null, []); ?> 
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2>User Management</h2>
            <a href="<?php echo e(route('admin.users.create')); ?>"
                style="display: inline-block; padding: 0.5rem 1rem; background-color: #4f46e5; color: white; text-decoration: none; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 600; text-transform: uppercase;">
                + Add New User
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <style>
        .card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
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
        }

        td {
            padding: 1rem 1.5rem;
            border-top: 1px solid #e5e7eb;
        }

        tbody tr:hover {
            background-color: #f9fafb;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e0e7ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4f46e5;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
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

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
        }

        .btn-link {
            color: #4f46e5;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .btn-link:hover {
            color: #3730a3;
        }

        .btn-link.blue {
            color: #3b82f6;
        }

        .btn-link.blue:hover {
            color: #1d4ed8;
        }

        .btn-link.purple {
            color: #a855f7;
        }

        .btn-link.purple:hover {
            color: #7e22ce;
        }

        .btn-link.red {
            color: #ef4444;
        }

        .btn-link.red:hover {
            color: #b91c1c;
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

        .text-gray-400 {
            color: #9ca3af;
        }

        .font-medium {
            font-weight: 500;
        }
    </style>

    <div class="container">
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Joined</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-sm text-gray-900">
                                #<?php echo e($user->id); ?>

                            </td>
                            <td>
                                <div class="user-info">
                                    <div class="avatar"><?php echo e(substr($user->name, 0, 1)); ?></div>
                                    <div class="text-sm font-medium text-gray-900"><?php echo e($user->name); ?></div>
                                </div>
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
                                <?php echo e($user->created_at->format('M d, Y')); ?>

                            </td>
                            <td>
                                <div class="actions">
                                    <a href="<?php echo e(route('admin.users.show', $user)); ?>" class="btn-link">View</a>
                                    <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn-link blue">Edit</a>

                                    <?php if($user->id !== auth()->id()): ?>
                                        <form action="<?php echo e(route('admin.users.toggle-admin', $user)); ?>" method="POST"
                                            style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn-link purple"
                                                style="background: none; border: none; cursor: pointer;">
                                                <?php echo e($user->is_admin ? 'Revoke Admin' : 'Make Admin'); ?>

                                            </button>
                                        </form>

                                        <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn-link red"
                                                style="background: none; border: none; cursor: pointer;">Delete</button>
                                        </form>
                                    <?php else: ?>
                                        <span class="text-gray-400">(You)</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" style="text-align: center; color: #6b7280; padding: 2rem;">
                                No users found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <div style="margin-top: 1rem;">
                <?php echo e($users->links()); ?>

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
<?php endif; ?><?php /**PATH C:\EverythingX\ERP\resources\views/admin/users/index.blade.php ENDPATH**/ ?>