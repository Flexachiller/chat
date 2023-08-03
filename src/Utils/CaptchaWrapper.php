<?php

namespace flexachiller\chat\Utils;

use Gregwar\Captcha\CaptchaBuilder;
use flexachiller\chat\Core\Session;

class CaptchaWrapper{

    private Session $session;
    private CaptchaBuilder $captcha_builder;

    public function __construct()
    {
        $this->captcha_builder = new CaptchaBuilder();
        $this->captcha_builder->build();

        $this->session = new Session();
    }

    public function get_captcha(){
        $this->session->add('captcha', $this->captcha_builder->getPhrase());
        return $this->captcha_builder->inline();
    }

    public function check_captcha($phrase){
        return $phrase === $this->session->get('captcha');
    }
}