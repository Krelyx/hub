<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sensor Data'), ['action' => 'edit', $sensorData->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sensor Data'), ['action' => 'delete', $sensorData->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sensorData->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sensor Datas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sensor Data'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sensorDatas view large-9 medium-8 columns content">
    <h3><?= h($sensorData->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($sensorData->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($sensorData->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sender') ?></th>
            <td><?= $this->Number->format($sensorData->sender) ?></td>
        </tr>
        <tr>
            <th><?= __('Value') ?></th>
            <td><?= $this->Number->format($sensorData->value) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($sensorData->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($sensorData->modified) ?></tr>
        </tr>
    </table>

</div>
