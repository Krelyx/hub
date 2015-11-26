<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(__('Activate scenario'),['action' => 'activateScenario', $scenario->id])?></li>
        <li><?= $this->Form->postLink(__('Desactivate scenario'),['action' => 'desactivateScenario', $scenario->id])?></li>
        <li><?= $this->Html->link(__('Edit Scenario'), ['action' => 'edit', $scenario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Scenario'), ['action' => 'delete', $scenario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scenario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Scenarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scenario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="scenarios view large-9 medium-8 columns content">
    <h3><?= h($scenario->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($scenario->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Script File') ?></th>
            <td><?= h($scenario->script_file) ?></td>
        </tr>
        <tr>
            <th><?= __('Is activated') ?></th>
            <td><?= $scenario->status ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($scenario->description)); ?>
       
    </div>
</div>
