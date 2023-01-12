

<?php $__env->startSection('container'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-3"><?php echo e($katalog->nama_produk); ?></h1>
            <p>By. <a href="/katalogs?author=<?php echo e($katalog->author->username); ?>"><?php echo e($katalog->author->nama); ?></a> in <a href="/katalogs?kategori=<?php echo e($katalog->kategori->slug); ?>"><?php echo e($katalog->kategori->nama); ?></a></p>

            <?php if($katalog->gambar): ?>
            <div style="max-height: 350px; overflow:hidden">
                <img src="<?php echo e(asset('storage/'.$katalog->image)); ?>?<?php echo e($katalog->kategori->nama); ?>" alt="" class="img-fluid ">
            </div>
            <?php else: ?>
              <img src="https://source.unsplash.com/1200x400?<?php echo e($katalog->kategori->nama); ?>" alt="" class="img-fluid ">
            <?php endif; ?>
            <article class="my-3 fs-5">
                <?php echo $katalog->deskripsi; ?>

            </article>

            
            <a href="/katalogs">Back to katalogs</a>
        </div>

    </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tuf\meubelku\resources\views/katalog.blade.php ENDPATH**/ ?>