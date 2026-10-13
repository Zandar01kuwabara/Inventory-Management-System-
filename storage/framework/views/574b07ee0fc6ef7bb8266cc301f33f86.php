<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'StokKita'); ?> | StokKita</title>
    <style>
        :root{--ink:#1d2939;--muted:#667085;--line:#e4e7ec;--paper:#f5f7fb;--blue:#2855c5;--blue2:#eaf0ff;--green:#13795b;--red:#b42318}
        *{box-sizing:border-box}body{margin:0;font-family:Inter,Segoe UI,Arial,sans-serif;background:var(--paper);color:var(--ink)}
        .top{background:#fff;border-bottom:1px solid var(--line);padding:17px 5vw;display:flex;align-items:center;justify-content:space-between;gap:20px}
        .brand{font-size:21px;font-weight:800;letter-spacing:-.5px}.brand span{color:var(--blue)}
        nav{display:flex;gap:8px;flex-wrap:wrap}nav a{padding:9px 13px;border-radius:9px;color:#475467;text-decoration:none;font-weight:600;font-size:14px}nav a:hover,nav a.active{background:var(--blue2);color:var(--blue)}
        main{max-width:1180px;margin:34px auto;padding:0 22px}.heading{display:flex;justify-content:space-between;align-items:center;gap:18px;flex-wrap:wrap;margin-bottom:22px}
        h1{font-size:29px;letter-spacing:-.8px;margin:0 0 7px}.muted{color:var(--muted);margin:0;line-height:1.5}
        .btn{display:inline-block;background:var(--blue);color:#fff;border:0;border-radius:9px;padding:10px 15px;font-weight:700;text-decoration:none;cursor:pointer;font-size:14px}.btn.secondary{background:#fff;color:var(--ink);border:1px solid var(--line)}.btn.danger{background:#fff0ef;color:var(--red);border:1px solid #ffd2cf}
        .grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:15px}.stat,.panel{background:#fff;border:1px solid var(--line);border-radius:15px;padding:20px;box-shadow:0 4px 15px #10182808}.stat .label{font-size:13px;color:var(--muted);font-weight:600}.stat .value{font-size:30px;font-weight:800;margin-top:12px}.panel{margin-top:20px}
        .panel-head{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;margin-bottom:16px}h2{font-size:18px;margin:0}
        table{width:100%;border-collapse:collapse}th,td{text-align:left;padding:13px 12px;border-bottom:1px solid #eef0f4;font-size:14px}th{font-size:12px;color:var(--muted);text-transform:uppercase;letter-spacing:.5px;background:#fafbfc}tr:last-child td{border-bottom:0}
        .table-wrap{overflow-x:auto}.pill{display:inline-block;padding:5px 9px;border-radius:20px;font-size:12px;font-weight:700;background:#e8f7ef;color:var(--green)}.pill.warn{background:#fff4db;color:#945c00}.pill.bad{background:#ffedeb;color:var(--red)}
        .alert{padding:12px 15px;border-radius:10px;margin-bottom:16px;background:#e8f7ef;color:#116149}.alert.error{background:#ffedeb;color:var(--red)}
        .filters{display:flex;gap:9px;flex-wrap:wrap}.filters input,.filters select,input,select,textarea{border:1px solid #d0d5dd;border-radius:9px;padding:10px 12px;font:inherit;background:white;min-width:0}.filters input{min-width:220px}
        .form-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:17px}.field{display:flex;flex-direction:column;gap:7px}.field label{font-weight:700;font-size:13px}.field small{color:var(--red)}.field.full{grid-column:1/-1}.actions{display:flex;gap:8px;align-items:center;flex-wrap:wrap}.pagination{padding-top:18px}.footer{padding:25px 5vw;text-align:center;color:var(--muted);font-size:12px}
        @media(max-width:800px){.grid{grid-template-columns:repeat(2,minmax(0,1fr))}.top{align-items:flex-start;flex-direction:column}}@media(max-width:540px){.grid,.form-grid{grid-template-columns:1fr}.field.full{grid-column:auto}main{margin-top:24px;padding:0 14px}.stat{padding:16px}}
    </style>
</head>
<body>
<header class="top">
    <div class="brand">stok<span>kita</span><div style="font-size:11px;color:#98a2b3;font-weight:600;letter-spacing:1.2px;margin-top:3px">INVENTORY WORKSPACE</div></div>
    <nav>
        <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">Dashboard</a>
        <a href="<?php echo e(route('barang.index')); ?>" class="<?php echo e(request()->routeIs('barang.*') ? 'active' : ''); ?>">Data Barang</a>
        <a href="<?php echo e(route('kategori.index')); ?>" class="<?php echo e(request()->routeIs('kategori.*') ? 'active' : ''); ?>">Kategori</a>
    </nav>
</header>
<main>
    <?php if(session('success')): ?><div class="alert"><?php echo e(session('success')); ?></div><?php endif; ?>
    <?php if(session('error')): ?><div class="alert error"><?php echo e(session('error')); ?></div><?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert error"><strong>Periksa kembali input:</strong><ul style="margin:7px 0 0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div>
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
</main>
<div class="footer">StokKita · Sistem Manajemen Inventaris Barang · Laravel</div>
</body>
</html>
<?php /**PATH D:\Xampp\htdocs\inventory-laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>