<?php
?>
<div class="games index content">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <?php if(!is_null($this->request->getAttribute('identity')) && $this->request->getAttribute('identity')->level == 'admin') : ?>
        <?=$this->Html->link(__('New game'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?php endif; ?>
    <h3><?= __('Games') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('genre') ?></th>
                    <th><?= $this->Paginator->sort('studio') ?></th>
                    <th><?= $this->Paginator->sort('releaseyears') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($games as $game): ?>
                <tr>
                    <td><?= h($game->title) ?></td>
                    <td><?= h($game->genre) ?></td>
                    <td><?= h($game->studio)?></td>
                    <td><?= h($game->releaseyears)?></td>
                    <td>
                        <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $game->id], ['class' => 'button', 'escape' => false]) ?>

                        <?php if(!is_null($this->request->getAttribute('identity')) && $this->request->getAttribute('identity')->level == 'admin') : ?>
                            
                            <?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $game->id], ['class' => 'button', 'escape' => false]) ?>
                            <?= $this->Form->postLink('<i class="fa-solid fa-trash-can"></i>', ['action' => 'delete', $game->id], ['class' => 'button', 'confirm' => __('Are you sure you want to delete # {0}?', $game->id), 'escape' => false]) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
