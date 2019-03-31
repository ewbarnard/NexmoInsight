<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formattings'), ['controller' => 'Formattings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formatting'), ['controller' => 'Formattings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contacts view large-9 medium-8 columns content">
    <h3><?= h($contact->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($contact->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($contact->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($contact->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contact->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formattings') ?></h4>
        <?php if (!empty($contact->formattings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Contact Id') ?></th>
                <th scope="col"><?= __('Intl Format Number') ?></th>
                <th scope="col"><?= __('Natl Format Number') ?></th>
                <th scope="col"><?= __('Country Code') ?></th>
                <th scope="col"><?= __('Country Code Iso3') ?></th>
                <th scope="col"><?= __('Country Name') ?></th>
                <th scope="col"><?= __('Country Prefix') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($contact->formattings as $formattings): ?>
            <tr>
                <td><?= h($formattings->id) ?></td>
                <td><?= h($formattings->contact_id) ?></td>
                <td><?= h($formattings->intl_format_number) ?></td>
                <td><?= h($formattings->natl_format_number) ?></td>
                <td><?= h($formattings->country_code) ?></td>
                <td><?= h($formattings->country_code_iso3) ?></td>
                <td><?= h($formattings->country_name) ?></td>
                <td><?= h($formattings->country_prefix) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Formattings', 'action' => 'view', $formattings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Formattings', 'action' => 'edit', $formattings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Formattings', 'action' => 'delete', $formattings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formattings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
