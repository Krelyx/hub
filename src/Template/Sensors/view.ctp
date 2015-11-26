<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sensor'), ['action' => 'edit', $sensor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sensor'), ['action' => 'delete', $sensor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sensor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sensors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sensor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nodes'), ['controller' => 'Nodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Node'), ['controller' => 'Nodes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Data Types'), ['controller' => 'DataTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Data Type'), ['controller' => 'DataTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sensors view large-9 medium-8 columns content">
    <h3><?= h($sensor->node_code) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($sensor->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Node') ?></th>
            <td><?= $sensor->has('node') ? $this->Html->link($sensor->node->name, ['controller' => 'Nodes', 'action' => 'view', $sensor->node->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Data Type') ?></th>
            <td><?= $sensor->has('data_type') ? $this->Html->link($sensor->data_type->name, ['controller' => 'DataTypes', 'action' => 'view', $sensor->data_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($sensor->id) ?></td>
        </tr>
    </table>
    <div class="related row">
        <div class="column large-12">
            <h4 class="subheader"><?= __('Related SensorDatas') ?></h4>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('Created') ?></th>
                    <th><?= __('Value') ?></th>
                </tr>
                <?php foreach ($sensordatas as $sensordata): ?>
                    <tr>
                        <td><?= h($sensordata->created) ?></td>
                        <td><?= $this->Number->format($sensordata->value) . $symbol ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
        <h3><?= h($sensor->name) ?></h3>
        <div class="myScatterChartJs">
            <canvas id="myScatterChart" width="600" height="400"></canvas>
        </div> 
    </div>
</div>
            <?= $this->cell('Chart',['id' => $sensor->id]) ?>
