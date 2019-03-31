<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formatting $formatting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formattings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formattings form large-9 medium-8 columns content">
    <?= $this->Form->create($formatting) ?>
    <fieldset>
        <legend><?= __('Add Formatting') ?></legend>
        <?php
            echo $this->Form->control('contact_id', ['options' => $contacts]);
            echo $this->Form->control('intl_format_number');
            echo $this->Form->control('natl_format_number');
            echo $this->Form->control('country_code');
            echo $this->Form->control('country_code_iso3');
            echo $this->Form->control('country_name');
            echo $this->Form->control('country_prefix');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
