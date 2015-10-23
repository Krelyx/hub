<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Data Type'), ['action' => 'edit', $dataType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Data Type'), ['action' => 'delete', $dataType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dataType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Data Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Data Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dataTypes view large-9 medium-8 columns content">
    <h3><?= h($dataType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($dataType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($dataType->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Symbol') ?></th>
            <td><?= h($dataType->symbol) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($dataType->id) ?></td>
        </tr>
    </table>
</div>
