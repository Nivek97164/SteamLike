<?php
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
        <div class="games form content">
            <?= $this->Form->create($game) ?>
            <fieldset>
                <legend><?= __('Add Games') ?></legend>
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
                <?= $this->Form->create($game) ?>
            <fieldset>
                <legend><?= __('Badge Game') ?></legend>
                
                <!-- Champ de formulaire pour sélectionner le nombre de badges -->
                <?= $this->Form->control('num_achievements', ['type' => 'number', 'label' => 'Number of Achievements', 'id' => 'numAchievements']) ?>
    
                <!-- Div pour contenir les champs d'achievement générés dynamiquement -->
                <div id="achievementsContainer"></div>

            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const numAchievementsField = document.getElementById('numAchievements');
        const achievementsContainer = document.getElementById('achievementsContainer');
        
        numAchievementsField.addEventListener('change', function() {
            const numAchievements = parseInt(numAchievementsField.value);
            achievementsContainer.innerHTML = ''; // Effacer les champs existants
            
            for (let i = 0; i < numAchievements; i++) {
                // Générer les champs de formulaire pour chaque achievement
                const achievementFields = `
                    <label>Achievement ${i + 1} Name:</label>
                    <input type="text" name="badges[${i}][achievementname]" required>
                    <label>Achievement ${i + 1} Description:</label>
                    <input type="text" name="badges[${i}][description]" required>
                    <br><br>
                `;
                achievementsContainer.innerHTML += achievementFields;
            }
        });
    });
</script> 