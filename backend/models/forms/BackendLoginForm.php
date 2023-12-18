<?php

namespace backend\models\forms;

use Yii;
use common\models\UserAdmin;
use common\models\forms\LoginForm;

/**
 * Login form
 */
class BackendLoginForm extends LoginForm
{
    /**
     * Logs in a user using the provided email and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    /**
     * Finds user_admin by [[email]]
     *
     * @return UserAdmin|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = UserAdmin::findByEmail($this->email);
        }

        return $this->_user;
    }
}