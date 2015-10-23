<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Data Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dataTypes index large-9 medium-8 columns content">
    <h3><?= __('Data Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('symbol') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataTypes as $dataType): ?>
            <tr>
                <td><?= $this->Number->format($dataType->id) ?></td>
                <td><?= h($dataType->name) ?></td>
                <td><?= h($dataType->type) ?></td>
                <td><?= h($dataType->symbol) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dataType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dataType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dataType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dataType->id)]) ?>
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
