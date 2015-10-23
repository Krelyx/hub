<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(__('Send code'),['action' => 'sendCodeToNode', $node->id])?></li>
        <li><?= $this->Html->link(__('Edit Node'), ['action' => 'edit', $node->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Node'), ['action' => 'delete', $node->id], ['confirm' => __('Are you sure you want to delete # {0}?', $node->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nodes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Node'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nodes view large-9 medium-8 columns content">
    <h3><?= h($node->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($node->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($node->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Node Code') ?></th>
            <td><?= $this->Number->format($node->node_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($node->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($node->modified) ?></tr>
        </tr>
    </table>
</div>
<div>
    <?= $this->Html->link(__('Send code'),['action' => 'sendCodeToNode'])?>
        
</div>
    
