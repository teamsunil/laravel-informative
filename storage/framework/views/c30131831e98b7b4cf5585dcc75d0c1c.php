

<?php $__env->startSection('title', 'Manage Menus'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="text-primary">Menus</h1>
    <a href="<?php echo e(route('menus.create')); ?>" class="btn btn-success float-right">Add New Menu</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?> <div class="alert alert-success"><?php echo e(session('success')); ?></div> <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Position</th>
                <th>Order</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($menu->title); ?></td>
                    <td><?php echo e(ucfirst(str_replace('-', ' ', $menu->position))); ?></td>
                    <td><?php echo e($menu->order); ?></td>
                    <td>
                        <button class="btn btn-sm toggle-status-btn <?php echo e($menu->status ? 'btn-success' : 'btn-danger'); ?>" data-id="<?php echo e($menu->id); ?>">
                            <?php echo e($menu->status ? 'Active' : 'Inactive'); ?>

                        </button>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.menus.edit', $menu->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                        <form action="<?php echo e(route('admin.menus.destroy', $menu->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this menu?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
    $('.toggle-status-btn').click(function() {
        var btn = $(this);
        var id = btn.data('id');

        $.post("<?php echo e(url('admin/menus')); ?>/" + id + "/toggle-status", {_token: '<?php echo e(csrf_token()); ?>'}, function(response){
            if(response.status === 'success'){
                if(response.new_status){
                    btn.removeClass('btn-danger').addClass('btn-success').text('Active');
                } else {
                    btn.removeClass('btn-success').addClass('btn-danger').text('Inactive');
                }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\admin\menus\index.blade.php ENDPATH**/ ?>