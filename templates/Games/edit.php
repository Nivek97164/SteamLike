<?php

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $game->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $game->id), 'class' => 'side-nav-item']
            ) ?>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <?= $this->Html->link(__('List Games'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="Games form content">
            <?= $this->Form->create($game) ?>
            <fieldset>
                <legend><?= __('Edit Game') ?></legend>
                <?php
                    echo $this->Form->control('title', ['label' => 'Titre du jeu']);
                    echo $this->Form->control('description', ['type' => 'textarea']);
                    echo $this->Form->control('studio', ['label' => 'Nom du studio']);
                    echo $this->Form->control('releaseyears', ['type' => 'date']);
                    echo $this->Form->control('genre', ['type' => 'radio', 'options' => [
                        'RPG' => 'RPG',
                        'FPS' => 'FPS',
                        'SandBox' => 'SandBox',
                        'Versus Fighting' => 'Versus Fighting'
                        ]
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
