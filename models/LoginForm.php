<?php

    namespace app\models;

    use Yii;
    use yii\base\Model;

    class LoginForm extends Model
        {
            public $username;
            public $password;
            public $rememberMe = true;

            private $_user;

            public function rules()
            {
                return [
                    [['username', 'password'], 'required'],
                    ['password', 'validatePassword'],
                    ['rememberMe', 'boolean'],
                ];
            }

            public function validatePassword($attribute, $params)
            {
                if (!$this->hasErrors()) {
                    $user = $this->getUser();
                    if (!$user || !Yii::$app->security->validatePassword($this->password, $user->password)) {
                        $this->addError($attribute, 'Incorrect username or password.');
                    }
                }
            }

            public function login()
            {
                if ($this->validate()) {
                    return Yii::$app->user->login($this->getUser());
                }
                return false;
            }

            protected function getUser()
            {
                if ($this->_user === null) {
                    $this->_user = User::findByUsername($this->username);
                }
                return $this->_user;
            }
        }