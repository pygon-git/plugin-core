<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;


if (!$this->fetch('page_title')) {
    $this->start('page_title');
        echo __($this->request->controller);
    $this->end();
}

$this->prepend('tb_body_attrs', ' class="fixed-left ' . strtolower(implode('-', [$this->request->controller, $this->request->action])) . ' layout-dashboard" ');
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>


    <?php
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

        <!-- Begin page -->
        <div id="wrapper">
        <?= $this->cell('PygonGit/PluginCore.Header')->render() ?>
        <?= $this->cell('PygonGit/PluginCore.Sidebar')->render() ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <?= $this->cell('PygonGit/PluginCore.Pagetitle', [$this->fetch('page_title')])->render() ?>


<?php
$this->end();

$this->start('tb_body_end');
echo '</body>';
$this->end();
$this->append('content', '                    </div>');
$this->append('content', '                </div>');
$this->append('content', $this->cell('PygonGit/PluginCore.Footer')->render());
$this->append('content', '             </div>');
$this->append('content', $this->cell('PygonGit/PluginCore.Notifications')->render());
$this->append('content', '<!-- END wrapper --></div>');
echo $this->fetch('content');
