<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="heading"><div><h1>Ringkasan Inventaris</h1><p class="muted">Pantau ketersediaan barang dan kondisi stok dalam satu halaman.</p></div><a class="btn" href="<?php echo e(route('barang.create')); ?>">＋ Tambah Barang</a></div>
<div class="grid">
    <div class="stat"><div class="label">Jenis Barang</div><div class="value"><?php echo e($jumlahBarang); ?></div><p class="muted">item terdaftar</p></div>
    <div class="stat"><div class="label">Kategori</div><div class="value"><?php echo e($jumlahKategori); ?></div><p class="muted">kelompok barang</p></div>
    <div class="stat"><div class="label">Total Unit</div><div class="value"><?php echo e(number_format($totalUnit, 0, ',', '.')); ?></div><p class="muted">unit tercatat</p></div>
    <div class="stat"><div class="label">Perlu Perhatian</div><div class="value" style="color:#b76e00"><?php echo e($stokMenipis->count()); ?></div><p class="muted">stok mencapai batas minimum</p></div>
</div>
<section class="panel">
    <div class="panel-head"><div><h2>Daftar stok yang perlu diperiksa</h2><p class="muted" style="margin-top:5px">Barang dengan jumlah sama dengan atau di bawah stok minimum.</p></div><a href="<?php echo e(route('barang.index')); ?>" class="btn secondary">Lihat semua</a></div>
    <div class="table-wrap"><table><thead><tr><th>Kode</th><th>Nama barang</th><th>Kategori</th><th>Jumlah</th><th>Status</th></tr></thead><tbody>
    <?php $__empty_1 = true; $__currentLoopData = $stokMenipis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr><td><?php echo e($item->kode_barang); ?></td><td><strong><?php echo e($item->nama); ?></strong></td><td><?php echo e($item->kategori->nama); ?></td><td><?php echo e($item->jumlah); ?> unit</td><td><span class="pill warn">Stok menipis</span></td></tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="5" style="text-align:center;color:#667085;padding:26px">Semua stok berada di atas batas minimum.</td></tr><?php endif; ?>
    </tbody></table></div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xampp\htdocs\inventory-laravel\resources\views/dashboard.blade.php ENDPATH**/ ?>