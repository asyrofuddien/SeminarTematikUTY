

<?php $__env->startSection('container'); ?>
<?php if(session()->has('success')): ?>
<div class="alert alert-success col-lg-12" role="alert">
  <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
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

      <div class="row justify-content-center mb-3">
        <div class="col-md-6">
          <form action="/">
            <?php if(request('kategori')): ?>
                <input type="hidden" name="kategori" value="<?php echo e(request('kategori')); ?>">
            <?php endif; ?>
            <?php if(request('author')): ?>
                <input type="hidden" name="author" value="<?php echo e(request('author')); ?>">
            <?php endif; ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="search.." name="search" value="<?php echo e(request('search')); ?>">
                <button class="btn btn-danger" type="submit">Search</button>
              </div>
              
          </form>
        </div>
    </div>
    
      <?php if($katalog->count()): ?>
      <div class="row bt-4">
        <?php $__currentLoopData = $katalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-3 rounded-4">
                <div class="card ">
                    <div style="background-color: rgba(0,0,0,0.7) "class="position-absolute px-3 py-2 text-white">
                        <a class="text-white text-decoration-none text-white" href="/?kategori=<?php echo e($item->kategori->slug); ?>"><?php echo e($item->kategori->nama); ?></a>
                    </div>
                    <?php if($item->gambar): ?>
                    <img src="<?php echo e(asset('storage/'.$item->image)); ?>" alt="gambar barang" class="img-fluid">
                    <?php else: ?>
                    <img src="https://source.unsplash.com/500x500?<?php echo e($item->kategori->nama); ?>" class="card-img-top" alt="">
                    <?php endif; ?>
                    <div class="card-body">
                    <a class="text-decoration-none text-dark" href="/produk/<?php echo e($item->slug); ?>">
                        <h5 class="card-title"><?php echo e($item->title); ?></h5>
                    </a>
                    <p>
                        <small class="text-muted">By. <a href="/?author=<?php echo e($item->author->username); ?>"><?php echo e($item->author->nama); ?></a> <?php echo e($item->created_at->diffForHumans()); ?>

                        </small>
                    </p>
                    <h3 class="card-title"><?php echo e($item->nama_produk); ?></h3>
                    <p class="card-text ">Rp. <?php echo number_format($item->harga,0,',','.'); ?></p>
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tuf\meubelku\resources\views/home.blade.php ENDPATH**/ ?>