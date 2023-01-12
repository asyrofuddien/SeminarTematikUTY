

<?php $__env->startSection('container'); ?>

<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <a href="/" class="btn btn-primary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
            <h1 class="mb-3"><?php echo e($katalog->nama_produk); ?></h1>
            <p>Toko <a href="/?author=<?php echo e($katalog->author->username); ?>"><?php echo e($katalog->author->nama); ?></a> || Kategori : <a href="/?category=<?php echo e($katalog->kategori->slug); ?>"><?php echo e($katalog->kategori->nama); ?></a></p>

            <?php if($katalog->image): ?>
            <div style="max-height: 350px; overflow:hidden">
                <img src="<?php echo e(asset('storage/'.$katalog->image)); ?>?<?php echo e($katalog->kategori->nama); ?>" alt="" class="img-fluid ">
            </div>
            <?php else: ?>
              <img src="https://source.unsplash.com/1200x400?<?php echo e($katalog->kategori->nama); ?>" alt="" class="img-fluid ">
            <?php endif; ?>
            <h3 class="mt-4">Rp. <?php echo number_format($katalog->harga,0,',','.'); ?></h3>

                <article class="my-3 fs-5 ">
                    <?php echo $katalog->deskripsi; ?>

                </article>
                
            <div>
                <form method="post" action="/pesen" class="mb-5" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3" hidden>
                        <label for="toko_id" class="form-label"></label>
                        <input type="text" class="form-control <?php $__errorArgs = ['toko_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="toko_id" name="toko_id" required autofocus value="<?php echo e($katalog->user_id); ?>">
                    </div>
                    <div class="mb-3" hidden>
                        <label for="produk_id" class="form-label"></label>
                        <input type="text" class="form-control <?php $__errorArgs = ['produk_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="produk_id" name="produk_id" required autofocus value="<?php echo e($katalog->id); ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="bank" class="mb-2">Bank Pembayaran</label>
                        <select class="form-control" id="bank" name="bank">
                          <option>MANDIRI</option>
                          <option>BRI</option>
                          <option>BCA</option>
                        </select>
                      </div>
                    <div class="mb-3">
                      <label for="image" class="form-label" >Bukti Pembayaran</label>
                      <img class="img-preview im-fluid mb-3 col-sm-5">
                      <input class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="image" name="image" onchange="previewImage()">
                      <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="invalid-feedback">
                        <?php echo e($message); ?>

                      </div>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><i class="bi bi-basket"> Beli</i></button>
                  </form>
            </div>

        </div>

    </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tuf\meubelku\resources\views/produk.blade.php ENDPATH**/ ?>