

<?php $__env->startSection('title', 'Sort Menus'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="text-primary">Sort Menus (Drag & Drop)</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position => $menuItems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <?php echo e(ucfirst(str_replace('-', ' ', $position))); ?> Menus
            </div>
            <div class="card-body">
                <ul class="list-group sortable-menu" data-position="<?php echo e($position); ?>">
                    <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center" data-id="<?php echo e($menu->id); ?>">
                            <?php echo e($menu->title); ?>

                            <span class="badge badge-primary"><?php echo e($menu->order); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <button id="saveOrder" class="btn btn-success">Save Order</button>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function () {
        $(".sortable-menu").sortable({
            placeholder: "ui-state-highlight"
        }).disableSelection();

        $('#saveOrder').click(function () {
            var orderData = [];
            $('.sortable-menu').each(function(){
                $(this).children('li').each(function(){
                    orderData.push($(this).data('id'));
                });
            });

            $.ajax({
                url: "<?php echo e(route('menus.updateOrder')); ?>",
                method: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    order: orderData
                },
                success: function (res) {
                    if(res.status === 'success'){
                        alert('Order Updated Successfully!');
                        location.reload();
                    }
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .ui-state-highlight { height: 2.5em; background-color: #d4edda; }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\admin\menus\sort.blade.php ENDPATH**/ ?>