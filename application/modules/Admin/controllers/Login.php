<?php
class LoginController extends CommonController
{
    public $doAuth = false;
    public $layout = 'layout/baseLayout.phtml';
    /**
     * @var Service\user\DbUserAuth
     */
    public $auth;

    public function init()
    {
        parent::init();
        $this->auth = new Service\user\DbUserAuth;
    }

    public function indexAction()
    {
        return true;
    }

    public function loginAction()
    {
        $input = $this->post();
        if(!empty($input['remember']) && $input['remember'] == 'on'){
            $remember = true;
        }else{
            $remember = false;
        }
        try{
            $this->auth->login($input['email'], $input['pwd'], $remember);
            $this->redirect('/index');
            $this->redirectTo('index', 'index');
        }catch (Exception $e){
            return $this->showMsg($e->getMessage());
        }
        return false;
    }

    public function logOutAction()
    {
        $this->auth->logOut();
        $this->redirectTo('login', 'index');
        return false;
    }
}