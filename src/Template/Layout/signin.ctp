<?php

use Cake\Core\Configure;

/* @var $this \Cake\View\View */
//$this->Html->css('BootstrapUI.signin', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . strtolower(implode('-', [$this->request->controller, $this->request->action])) . ' layout-signin" ');
$this->start('tb_body_start');
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
?>
<body <?= $this->fetch('tb_body_attrs') ?>>

        <div class="wrapper-page">
            <div class="text-center">
                <?= $this->Html->link(
                    $this->Html->icon('fa-home').
                    $this->html->tag('span', Configure::read('App.title')),
                    ['plugin' => null, 'controller' => 'pages', 'action' => 'display', 'home'],
                    ['class' => 'logo-lg', 'escape' => false]
                ); ?>
            </div>
<?php
$this->end();

$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->start('tb_footer');
echo ' ';
$this->end();

$this->append('content', '</div>');
echo $this->fetch('content');
