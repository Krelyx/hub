<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sensors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Nodes'), ['controller' => 'Nodes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Node'), ['controller' => 'Nodes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Data Types'), ['controller' => 'DataTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Data Type'), ['controller' => 'DataTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sensors form large-9 medium-8 columns content">
    <?= $this->Form->create($sensor) ?>
    <fieldset>
        <legend><?= __('Add Sensor') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('node_code_id', ['options' => $nodes]);
            echo $this->Form->input('data_type_id', ['options' => $dataTypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
