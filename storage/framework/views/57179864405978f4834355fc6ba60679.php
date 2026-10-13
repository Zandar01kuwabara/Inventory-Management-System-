<?php $__env->startSection('title', 'Kategori'); ?>
<?php $__env->startSection('content'); ?>
<div class="heading"><div><h1>Kategori Barang</h1><p class="muted">Kelompokkan inventaris agar pencarian dan pengelolaan lebih teratur.</p></div><a class="btn" href="<?php echo e(route('kategori.create')); ?>">＋ Kategori Baru</a></div>
<section class="panel"><div class="panel-head"><h2>Semua kategori</h2><span class="muted"><?php echo e($kategori->total()); ?> kategori</span></div>
<div class="table-wrap"><table><thead><tr><th>Nama Kategori</th><th>Deskripsi</th><th>Jumlah Barang</th><th>Aksi</th></tr></thead><tbody>
<?php $__empty_1 = true; $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td><strong><?php echo e($k->nama); ?></strong></td><td><?php echo e($k->deskripsi ?: '—'); ?></td><td><?php echo e($k->barang_count); ?> item</td><td><div class="actions"><a class="btn secondary" href="<?php echo e(route('kategori.edit', $k)); ?>">Edit</a><form method="POST" action="<?php echo e(route('kategori.destroy', $k)); ?>" onsubmit="return confirm('Hapus kategori ini?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn danger" type="submit">Hapus</button></form></div></td></tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="4">Belum ada kategori.</td></tr><?php endif; ?>
</tbody></table></div><div class="pagination"><?php echo e($kategori->links()); ?></div></section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xampp\htdocs\inventory-laravel\resources\views/kategori/index.blade.php ENDPATH**/ ?>