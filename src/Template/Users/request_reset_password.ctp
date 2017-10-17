<?php

$this->extend('PygonGit/PluginCore.Layout/signin');
?>
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create('User', ['class' => 'text-center m-t-20']) ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Enter your <b>Email</b> and instructions will be sent to you!
    </div>
    <?= $this->Form->control('reference', [
        'append' => $this->Form->button(__d('CakeDC/Users', 'Submit'), ['class' => 'btn btn-email btn-primary waves-effect waves-light']),
    ]) ?>
    <?= $this->Form->end() ?>
</div>
