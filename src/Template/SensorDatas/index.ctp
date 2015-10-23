<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sensor Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sensorDatas index large-9 medium-8 columns content">
    <h3><?= __('Sensor Datas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('sensor_id') ?></th>
                <th><?= $this->Paginator->sort('value') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sensorDatas as $sensorData): ?>
            <tr>
                <td><?= $sensorData->has('sensor') ? $this->Html->link($sensorData->sensor->name, ['controller' => 'Sensors', 'action' => 'view', $sensorData->sensor->id]) : '' ?></td>
                <td><?= $this->Number->format($sensorData->value) ?></td>
                <td><?= h($sensorData->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sensorData->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sensorData->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sensorData->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sensorData->id)]) ?>
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
