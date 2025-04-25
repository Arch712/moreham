<?php if (empty($film)) echo "Tidak ada hasil"; else foreach ($film as $f): ?>
    <p><?= $f->judul ?></p>
<?php endforeach; ?>
