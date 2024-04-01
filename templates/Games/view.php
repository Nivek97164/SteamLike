<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Game $game
 */

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <?= $this->Html->link(__('List Games'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="Games view content">
            <h3><?= h($game->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($game->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($game->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Genre') ?></th>
                    <td><?= h($game->genre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Studio') ?></th>
                    <td><?= h($game->studio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date de Sotie') ?></th>
                    <td><?= h($game->releaseyears) ?></td>
                </tr>

            <!-- Afficher les réalisations associées à ce jeu -->
                    <?php if (!empty($gameAchievements)) : ?>
                        <h4>Achievements:</h4>
                        <ul>
                            <?php foreach ($gameAchievements as $achievement) : ?>
                                <li><?= h($achievement->achievementname) ?> - <?= h($achievement->description) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <p>No achievements found for this game.</p>
                    <?php endif; ?>
            </table>
        </div>
    </div>
</div>