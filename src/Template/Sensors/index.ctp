<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sensor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nodes'), ['controller' => 'Nodes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Node'), ['controller' => 'Nodes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Data Types'), ['controller' => 'DataTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Data Type'), ['controller' => 'DataTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sensors index large-9 medium-8 columns content">
    <h3><?= __('Sensors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('node_code_id') ?></th>
                <th><?= $this->Paginator->sort('type_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sensors as $sensor): ?>
            <tr>
                <td><?= $this->Number->format($sensor->id) ?></td>
                <td><?= h($sensor->name) ?></td>
                <td><?= $sensor->has('node') ? $this->Html->link($sensor->node->name, ['controller' => 'Nodes', 'action' => 'view', $sensor->node->id]) : '' ?></td>
                <td><?= $sensor->has('data_type') ? $this->Html->link($sensor->data_type->name, ['controller' => 'DataTypes', 'action' => 'view', $sensor->data_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sensor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sensor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sensor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sensor->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
