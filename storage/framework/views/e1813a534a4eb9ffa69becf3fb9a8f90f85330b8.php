

<?php $__env->startSection('container'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pesanan</h1>
</div>

<?php if(session()->has('success')): ?>
<div class="alert alert-success col-lg-8" role="alert">
  <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="table-responsive col-lg-10">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Harga</th>
          <th scope="col">Bukti Pembayaran</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
        <tr>
          <td><?php echo e($loop->iteration); ?></td>
          <td><?php echo e($item->produk->nama_produk); ?></td>
          <td>Rp. <?php echo number_format($item->produk->harga,0,',','.'); ?></td>
          <td>
            
            <div class="align-self-lg-center" style="max-height: 50px;max-width: 50px; overflow:hidden">
              <a href="<?php echo e(asset('storage/'.$item->bukti)); ?>" >
                <img src="<?php echo e(asset('storage/'.$item->bukti)); ?>" alt="" class="img-fluid ">
              </a>
            </div>
            
         </td>
          <td>
            <?php if($item->status): ?>
            <i class="bi bi-check">Selesai</i>
            <?php else: ?>
            <i class="bi bi-exclamation-diamond-fill"> Belum diproses</i>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tuf\meubelku\resources\views/dashboard/pembelian/index.blade.php ENDPATH**/ ?>