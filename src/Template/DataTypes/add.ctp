<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Data Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dataTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($dataType) ?>
    <fieldset>
        <legend><?= __('Add Data Type') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('type');
            echo $this->Form->input('symbol');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
