

<?php $__env->startSection('container'); ?>
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-8">
                <h1 class="mb-3"><?php echo e($katalog->title); ?></h1>
                <a href="/dashboard/katalog" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i> Back to all my katalogs</a>
                <a href="/dashboard/katalog/<?php echo e($katalog->slug); ?>/edit" class="btn btn-warning text-white"><i class="bi bi-pencil"></i> Edit</a>
                <form action="/dashboard/katalog/<?php echo e($katalog->slug); ?>" method="post" class="d-inline">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</button>
                  </form>
                  <h1 class="mb-3"><?php echo e($katalog->nama_produk); ?></h1>
                <p>Toko <a href="/?author=<?php echo e($katalog->author->username); ?>"><?php echo e($katalog->author->nama); ?></a> || Kategori : <a href="/?category=<?php echo e($katalog->kategori->slug); ?>"><?php echo e($katalog->kategori->nama); ?></a></p>
                  <?php if($katalog->image): ?>
                  <div style="max-height: 350px; overflow:hidden">
                      <img src="<?php echo e(asset('storage/'.$katalog->image)); ?>?<?php echo e($katalog->kategori->nama); ?>" alt="" class="img-fluid mt-4">
                  </div>
                  <?php else: ?>
                    <img src="https://source.unsplash.com/1200x400?<?php echo e($katalog->kategori->nama); ?>" alt="" class="img-fluid mt-4">
                  <?php endif; ?>
                  <h3 class="mt-4">Rp <?php echo e($katalog->harga); ?></h3>
                <article class="my-3 fs-5">
                    <?php echo $katalog->deskripsi; ?>

                </article>

                
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tuf\meubelku\resources\views/dashboard/katalog/show.blade.php ENDPATH**/ ?>