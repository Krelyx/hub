<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sensor Datas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sensorDatas form large-9 medium-8 columns content">
    <?= $this->Form->create($sensorData) ?>
    <fieldset>
        <legend><?= __('Add Sensor Data') ?></legend>
        <?php
            echo $this->Form->input('sender');
            echo $this->Form->input('type');
            echo $this->Form->input('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
