

<?php $__env->startSection('container'); ?>
    
    <div id="carouselExampleControls" class="carousel slide mt-3 mb-5" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://source.unsplash.com/1200x400?laptop" class="d-block w-100 rounded-4"  alt="gambar">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x400?computer" class="d-block w-100 rounded-4" alt="gambar">
          </div>
          <div class="carousel-item">
            <img src=https://source.unsplash.com/1200x400?handphone" class="d-block w-100 rounded-4" alt="gambar">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only"></span>
        </a>
      </div>
      <h2 class="my-4">Kategori : <?php echo e($kategori); ?></h2>
      <?php if($katalog->count()): ?>
      <div class="row bt-4">
        <?php $__currentLoopData = $katalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-3 rounded-4">
                <div class="card ">
                    <div style="background-color: rgba(0,0,0,0.7) "class="position-absolute px-3 py-2 text-white">
                        <a class="text-white text-decoration-none text-white" href="/kategori?kategori=<?php echo e($item->kategori->slug); ?>"><?php echo e($item->kategori->nama); ?></a>
                    </div>
                    <?php if($item->gambar): ?>
                            <img src="<?php echo e(asset('storage/'.$item->gambar)); ?>?<?php echo e($item->kategori->nama); ?>" alt="" class="img-fluid">
                    <?php else: ?>
                            <img src="https://source.unsplash.com/500x500?<?php echo e($item->kategori->nama); ?>" class="card-img-top" alt="">
                    <?php endif; ?>
                    <div class="card-body">
                    <a class="text-decoration-none text-dark" href="/produk/<?php echo e($item->slug); ?>">
                        <h5 class="card-title"><?php echo e($item->title); ?></h5>
                    </a>
                    <p>
                        <small class="text-muted">By. <a href="/katalog?author=<?php echo e($item->author->username); ?>"><?php echo e($item->author->nama); ?></a> <?php echo e($item->created_at->diffForHumans()); ?>

                        </small>
                    </p>
                    <h3 class="card-title"><?php echo e($item->nama_produk); ?></h3>
                    <p class="card-text ">Rp <?php echo e($item->harga); ?></p>
                    <?php if(auth()->guard()->check()): ?>
                    <a href="/produk/<?php echo e($item->slug); ?>" class="btn btn-primary">Beli</a>
                    <?php else: ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <p class="text-center fs-4">No Post Found.</p>
    <?php endif; ?>
      
            <?php echo e($katalog->links()); ?>

        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tuf\meubelku\resources\views/kategori.blade.php ENDPATH**/ ?>