<?php

namespace PygonGit\PluginCore\View\Helper;

use Cake\Core\Configure;

class FormHelper extends \BootstrapUI\View\Helper\FormHelper
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->_View->loadHelper('CakeDC/Users.User');
    }

    /*
     * Login form specific stuff
     */
    public function loginCreate($entity = null, $options = [])
    {
        if(!isset($options['class']))
            $options['class'] = [];

        $options['class']['form-signin'] = '';
        $options['class']['form-horizontal m-t-20'] = 'form-horizontal m-t-20';

        return parent::create($entity, $options);
    }

    public function loginFields()
    {
        $out = [];
        $out[] = $this->loginEmail();
        $out[] = $this->loginPassword();
        $out[] = $this->loginRememberMe();
        $out[] = $this->loginReCaptcha();
        return implode('', $out);
    }

    public function loginEmail()
    {
        return parent::control('email', [
            'required' => true,
            'placeholder' => __('Email'),
            'label' => ['text' => __('Email'), 'class' => 'sr-only'],
            'prepend' => $this->Html->icon('mdi mdi-account'),
        ]);
/*


                <div class="form-group row">
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                            <input class="form-control" type="text" required="" placeholder="Username">
                        </div>
                    </div>
                </div>
*/
    }

    public function loginPassword()
    {
        return parent::control('password', [
            'required' => true,
            'placeholder' => __('Password'),
            'label' => ['text' => __('Password'), 'class' => 'sr-only'],
            'prepend' => $this->Html->icon('fa-key'),
        ]);
    }

    public function loginReCaptcha()
    {
        if (Configure::read('Users.reCaptcha.login'))
        {
            return $this->_View->User->addReCaptcha();
        }
    }

    public function loginRememberMe()
    {
        $checkbox = null;
        if (Configure::read('Users.RememberMe.active'))
        {
            $checkbox = parent::checkbox(Configure::read('Users.Key.Data.rememberMe'), [
                'checked' => Configure::read('Users.RememberMe.checked'),
                'id' => 'checkbox-signup',
            ]).
            parent::label(Configure::read('Users.Key.Data.rememberMe'), __d('CakeDC/Users', 'Remember me'), ['for' => 'checkbox-signup']);

            $checkbox = $this->Html->tag('div', $checkbox, ['class' => 'checkbox checkbox-primary']);
            $checkbox = $this->Html->tag('div', $checkbox, ['class' => 'col-12']);
            $checkbox = $this->Html->tag('div', $checkbox, ['class' => 'form-group row']);
        }
        return $checkbox;
    }

    public function loginButton($label = null, $options = [])
    {
        $options['class'] = 'btn btn-primary btn-custom w-md waves-effect waves-light';

        $button = parent::button($label, $options);

        $button = $this->Html->tag('div', $button, ['class' => 'col-xs-12']);
        $button = $this->Html->tag('div', $button, ['class' => 'form-group text-right m-t-20']);

        return $button;
    }

    public function loginLinks()
    {
        $links = [];
        if (Configure::read('Users.Email.required')) {
            $links[] = $this->Html->tag('div', $this->Html->link($this->Html->icon('fa-lock m-r-5'). __('Forgot your password?'), ['action' => 'requestResetPassword'], ['escape' => false, 'class' => 'text-muted']), ['class' => 'col-sm-7']);
        }
        $registrationActive = Configure::read('Users.Registration.active');
        if ($registrationActive)
        {
            $links[] = $this->Html->tag('div', $this->Html->link( __('Create an account'), ['action' => 'register'], ['escape' => false, 'class' => 'text-muted']), ['class' => 'col-sm-5 text-right']);
        }

        $socialLinks = $this->_View->User->socialLoginList([
            'facebook' => ['class' => 'btn-block'],
            'twitter' => ['class' => 'btn-block']
        ]);

        $links = array_merge($socialLinks, $links);

        $links = implode(' ', $links);

        if(!empty($links))
        {
            $links = $this->Html->tag('div', $links, ['class' => 'form-group row m-t-30']);
        }

        return $links;
    }
}
