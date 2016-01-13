<?php
/**
 * 后台用户模型
 * Class UserModel
 */
class UserModel extends Core\Model{

    public $tableName = 'user';

    public function getInfoByEmail($email){
        return $this->get('*', ['email' => $email]);
    }

    public function setToken($userId, $token){
        return $this->update(['token' => $token], ['id' => $userId]);
    }


    public function getInfoByToken($token){
        return $this->get('*', ['token' => $token]);
    }

}