

<?php $__env->startSection('container'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="col-md-12 mb-3 rounded-4">
            <div class="card ">
                <div class="card-body">
                
                    <h5 class="card-title text-center">INVOICE</h5>
                    <p>Nama Barang : <?php echo e($barang->nama_produk); ?></p>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tuf\meubelku\resources\views/pesen/index.blade.php ENDPATH**/ ?>