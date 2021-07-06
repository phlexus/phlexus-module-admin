<?php

/**
 * This file is part of the Phlexus CMS.
 *
 * (c) Phlexus CMS <cms@phlexus.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phlexus\Modules\BaseAdmin\Form;

use Phlexus\Form\FormBase;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;

class LoginForm extends FormBase
{
    /**
     * Initialize form
     */
    public function initialize()
    {
        parent::initialize();
        
        $email = new Email('email', [
            'required' => true,
            'class' => 'form-control',
            'placeholder' => 'Email'
        ]);
        
        $email->addValidator(new PresenceOf(['message' => 'Email is required']));
        
        $this->add($email);
        
        $password = new Password('password', [
            'required' => true,
            'class' => 'form-control',
            'placeholder' => 'Password'
        ]);
        
        $password->addValidator(new PresenceOf(['message' => 'Password is required']));
        
        $this->add($password);
    }
}
