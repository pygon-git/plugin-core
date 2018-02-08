<?php

use Cake\Core\Configure;

/**
 * Default `html` block.
 */
if (!$this->fetch('html')) {
    $this->start('html');
    printf('<!-- <html> here to pass tests --><html lang="%s" class="no-js">', Configure::read('App.language'));
    $this->end();
}

/**
 * Default `title` block.
 */
if (!$this->fetch('title')) {
    $this->start('title');
    echo Configure::read('App.title');
    $this->end();
}

/**
 * Default `footer` block.
 */
if (!$this->fetch('tb_footer')) {
    $this->start('tb_footer');
    echo " ";
    $this->end();
}

/**
 * Default `body` block.
 */
$this->prepend('tb_body_attrs', ' class="fixed-left ' . strtolower(implode('-', [$this->request->controller, $this->request->action])) . ' layout-default"' );
if (!$this->fetch('tb_body_start')) {
    $this->start('tb_body_start');
    echo '<body' . $this->fetch('tb_body_attrs') . '>';
    $this->end();
}
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
if (!$this->fetch('tb_body_end')) {
    $this->start('tb_body_end');
    echo '</body>';
    $this->end();
}

/**
 * Prepend `meta` block with `author` and `favicon`.
 */
$this->prepend('meta', $this->Html->meta('author', null, ['name' => 'author', 'content' => Configure::read('App.author')]));
// $this->prepend('meta', $this->Html->meta('favicon.ico', '/favicon.ico', ['type' => 'icon']));

/**
 * Prepend `css` block with Bootstrap stylesheets and append
 * the `$html5Shim`.
 */
$html5Shim =
<<<HTML

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
HTML;
$this->prepend('css', $this->Html->css([
    '/assets/pygon-git/plugin-core/webroot/plugins/datatables/dataTables.bootstrap4.min.css',
    '/assets/pygon-git/plugin-core/webroot/plugins/datatables/responsive.bootstrap4.min.css',
    '/assets/pygon-git/plugin-core/webroot/plugins/datatables/buttons.bootstrap4.min.css',
    '/assets/pygon-git/plugin-core/webroot/plugins/switchery/switchery.min.css',
    '/assets/pygon-git/plugin-core/webroot/css/bootstrap.min.css',
    '/assets/pygon-git/plugin-core/webroot/css/icons.css',
    '/assets/pygon-git/plugin-core/webroot/css/style.css',
    '/assets/pygon-git/plugin-core/webroot/css/core.css',
]));

$this->append('css', $html5Shim);

/**
 * Prepend `script` block with jQuery and Bootstrap scripts
 */
$this->prepend('script', $this->Html->script([
    '/assets/pygon-git/plugin-core/webroot/js/modernizr.min.js',
    '/assets/pygon-git/plugin-core/webroot/js/jquery.min.js',
    '/assets/pygon-git/plugin-core/webroot/js/popper.min.js',
    '/assets/pygon-git/plugin-core/webroot/js/bootstrap.min.js',
//    '/assets/twbs/bootstrap/assets/js/ie10-viewport-bug-workaround.js',
    '/assets/pygon-git/plugin-core/webroot/js/detect.js',
    '/assets/pygon-git/plugin-core/webroot/js/fastclick.js',
    '/assets/pygon-git/plugin-core/webroot/js/waves.js',
    '/assets/pygon-git/plugin-core/webroot/js/wow.min.js',
    '/assets/pygon-git/plugin-core/webroot/js/jquery.slimscroll.js',
    '/assets/pygon-git/plugin-core/webroot/js/jquery.scrollTo.min.js',
    '/assets/pygon-git/plugin-core/webroot/plugins/datatables/jquery.dataTables.min.js',
    '/assets/pygon-git/plugin-core/webroot/plugins//datatables/dataTables.bootstrap4.min.js',
    '/assets/pygon-git/plugin-core/webroot/plugins/switchery/switchery.min.js',
    '/assets/pygon-git/plugin-core/webroot/js/jquery.core.js',
    '/assets/pygon-git/plugin-core/webroot/js/jquery.app.js',
    '/assets/pygon-git/plugin-core/webroot/js/core.js',
]));


?>
<!DOCTYPE html>

<?= $this->fetch('html') ?>

    <head>

        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <title><?= $this->fetch('title') ?></title>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>

    </head>

    <?php
    echo $this->fetch('tb_body_start');
    echo $this->fetch('tb_flash');
    echo $this->fetch('content');
    echo $this->fetch('tb_footer');
    ?><script> var resizefunc = []; </script><?php
    echo $this->fetch('script');
    echo $this->fetch('tb_body_end');
    ?>

</html>
