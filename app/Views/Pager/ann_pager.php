<?php $pager->setSurroundCount(2) ?>

<?php if($pager->hasPrevious()): ?>
    <a href="<?= $pager->getPrevious() ?>" class="ann-page-btn">
        <i class="fas fa-chevron-left"></i>
    </a>
<?php endif; ?>

<?php foreach($pager->links() as $link): ?>
    <a href="<?= $link['uri'] ?>"
       class="ann-page-btn <?= $link['active'] ? 'ann-page-active' : '' ?>">
        <?= $link['title'] ?>
    </a>
<?php endforeach; ?>

<?php if($pager->hasNext()): ?>
    <a href="<?= $pager->getNext() ?>" class="ann-page-btn">
        <i class="fas fa-chevron-right"></i>
    </a>
<?php endif; ?>