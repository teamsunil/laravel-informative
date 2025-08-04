<div class="sidebar-wrap">
    
    <div class="sidebar-widget search card p-4 mb-3 border-0">
        <form action="<?php echo e(route('blogs.listing')); ?>" method="GET">
            <input type="text" class="form-control" name="search" placeholder="search" value="<?php echo e(request('search')); ?>">
            <button type="submit" class="btn btn-main btn-small d-block mt-2">search</button>
        </form>
    </div>

    
    <?php if(isset($author)): ?>
    <div class="sidebar-widget card border-0 mb-3">
        <img src="<?php echo e($author->avatar ?? asset('images/blog/blog-author.jpg')); ?>" alt="" class="img-fluid">
        <div class="card-body p-4 text-center">
            <h5 class="mb-0 mt-4"><?php echo e($author->name); ?></h5>
            <p><?php echo e($author->role ?? ''); ?></p>
            <p><?php echo e($author->bio ?? ''); ?></p>
            
            <ul class="list-inline author-socials">
                <?php if($author->facebook): ?><li class="list-inline-item mr-3"><a href="<?php echo e($author->facebook); ?>"><i class="fab fa-facebook-f text-muted"></i></a></li><?php endif; ?>
                <?php if($author->twitter): ?><li class="list-inline-item mr-3"><a href="<?php echo e($author->twitter); ?>"><i class="fab fa-twitter text-muted"></i></a></li><?php endif; ?>
                <?php if($author->linkedin): ?><li class="list-inline-item mr-3"><a href="<?php echo e($author->linkedin); ?>"><i class="fab fa-linkedin-in text-muted"></i></a></li><?php endif; ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    
    <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
        <h5>Latest Posts</h5>
        <?php $__currentLoopData = $latestBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="media border-bottom py-3">
                <a href="<?php echo e(route('blogs.detail', $latest->slug)); ?>">
                    <img class="mr-4" src="<?php echo e($latest->image ? asset('storage/' . $latest->image) : asset('images/blog/default.jpg')); ?>" alt="<?php echo e($latest->title); ?>" width="70">
                </a>
                <div class="media-body">
                    <h6 class="my-2"><a href="<?php echo e(route('blogs.detail', $latest->slug)); ?>"><?php echo e($latest->title); ?></a></h6>
                    <span class="text-sm text-muted"><?php echo e($latest->created_at->format('d M Y')); ?></span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\front\blog\sidebar.blade.php ENDPATH**/ ?>