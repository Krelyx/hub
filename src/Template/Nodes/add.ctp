<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Nodes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="nodes form large-9 medium-8 columns content">
    <?= $this->Form->create($node) ?>
    <fieldset>
        <legend><?= __('Add Node') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('node_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
