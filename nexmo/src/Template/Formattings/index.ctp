<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formatting[]|\Cake\Collection\CollectionInterface $formattings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formatting'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formattings index large-9 medium-8 columns content">
    <h3><?= __('Formattings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('intl_format_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('natl_format_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_code_iso3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_prefix') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formattings as $formatting): ?>
            <tr>
                <td><?= $this->Number->format($formatting->id) ?></td>
                <td><?= $formatting->has('contact') ? $this->Html->link($formatting->contact->name, ['controller' => 'Contacts', 'action' => 'view', $formatting->contact->id]) : '' ?></td>
                <td><?= h($formatting->intl_format_number) ?></td>
                <td><?= h($formatting->natl_format_number) ?></td>
                <td><?= h($formatting->country_code) ?></td>
                <td><?= h($formatting->country_code_iso3) ?></td>
                <td><?= h($formatting->country_name) ?></td>
                <td><?= h($formatting->country_prefix) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formatting->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formatting->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formatting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formatting->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
