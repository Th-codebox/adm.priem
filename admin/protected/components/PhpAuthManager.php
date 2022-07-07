<?php

class PhpAuthManager extends CPhpAuthManager{
    public function init(){
        parent::init();

        // Для гостей у нас и так роль по умолчанию guest.
        if(!Yii::app()->user->isGuest){
            // Связываем роль, заданную в БД с идентификатором пользователя,
            // возвращаемым UserIdentity.getId().

            $this->assign(Yii::app()->user->role, Yii::app()->user->id);
			session_start();
			$_SESSION['yii_role'] = Yii::app()->user->role;
        }
    }
}