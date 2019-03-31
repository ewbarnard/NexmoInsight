<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formatting $formatting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formatting'), ['action' => 'edit', $formatting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formatting'), ['action' => 'delete', $formatting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formatting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formattings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formatting'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formattings view large-9 medium-8 columns content">
    <h3><?= h($formatting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= $formatting->has('contact') ? $this->Html->link($formatting->contact->name, ['controller' => 'Contacts', 'action' => 'view', $formatting->contact->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Intl Format Number') ?></th>
            <td><?= h($formatting->intl_format_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Natl Format Number') ?></th>
            <td><?= h($formatting->natl_format_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country Code') ?></th>
            <td><?= h($formatting->country_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country Code Iso3') ?></th>
            <td><?= h($formatting->country_code_iso3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country Name') ?></th>
            <td><?= h($formatting->country_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country Prefix') ?></th>
            <td><?= h($formatting->country_prefix) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formatting->id) ?></td>
        </tr>
    </table>
</div>
