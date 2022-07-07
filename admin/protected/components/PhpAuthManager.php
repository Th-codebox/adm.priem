<?php

class PhpAuthManager extends CPhpAuthManager{
    public function init(){
        parent::init();

        // ��� ������ � ��� � ��� ���� �� ��������� guest.
        if(!Yii::app()->user->isGuest){
            // ��������� ����, �������� � �� � ��������������� ������������,
            // ������������ UserIdentity.getId().

            $this->assign(Yii::app()->user->role, Yii::app()->user->id);
			session_start();
			$_SESSION['yii_role'] = Yii::app()->user->role;
        }
    }
}