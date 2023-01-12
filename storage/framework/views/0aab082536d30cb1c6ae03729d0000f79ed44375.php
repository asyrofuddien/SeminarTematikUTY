

<?php $__env->startSection('container'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Post</h1>
</div>

<?php if(session()->has('success')): ?>
<div class="alert alert-success col-lg-8" role="alert">
  <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="table-responsive col-lg-8">
    <a href="/dashboard/katalog/create" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Create new post</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Harga</th>
          <th scope="col">Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $katalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
        <tr>
          <td><?php echo e($loop->iteration); ?></td>
          <td><?php echo e($item->nama_produk); ?></td>
          <td>Rp. <?php echo number_format($item->harga,0,',','.'); ?></td>
          <td><?php echo e($item->kategori->nama); ?></td>
          <td>
            <a href="/dashboard/katalog/<?php echo e($item->slug); ?>" class="badge bg-info">
                <i class="bi bi-eye"></i>
            </a>
            <a href="/dashboard/katalog/<?php echo e($item->slug); ?>/edit" class="badge bg-warning">
                <i class="bi bi-pencil"></i>
            </a>
            <form action="/dashboard/katalog/<?php echo e($item->slug); ?>" method="post" class="d-inline">
              <?php echo method_field('delete'); ?>
              <?php echo csrf_field(); ?>
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tuf\meubelku\resources\views/dashboard/katalog/index.blade.php ENDPATH**/ ?>