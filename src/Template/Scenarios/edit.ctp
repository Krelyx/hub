<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $scenario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $scenario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Scenarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="scenarios form large-9 medium-8 columns content">
    <?= $this->Form->create($scenario) ?>
    <fieldset>
        <legend><?= __('Edit Scenario') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('script_file');
            //echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
