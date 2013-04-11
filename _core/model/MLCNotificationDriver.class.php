<?php
abstract class MLCNotificationDriver{
	public static $arrCommMethod = array();
	public static function Init(){
		self::$arrCommMethod['email'] = new MLCPostmarkCommMethod();
		self::$arrCommMethod['ua_apid'] = new MLCUACommMethod();
	}
	public static function Send($mixData, $mixUser = null){
		$objUser = null;

		if(is_object($mixUser)){
            //die("CLass:" . get_class($mixUser));
			switch(get_class($mixUser)){
				case('User'):
                case('AuthUser'):
					$objUser = $mixUser;
				break;
				case('Account'):
                case('AuthAccount'):
					$arrUsers = AuthUser::LoadArrayByField('idAccount', $mixUser->IdAccount);
					self::Send($mixData, $arrUsers);
					return;
				break;
			}
		}elseif(is_array($mixUser)){

			foreach($mixUser as $intIndex => $mixUserData){
				self::Send($mixData, $mixUserData);
			}
			return;
		}elseif(is_null($mixUser)){
			$objUser = MLCAuthDriver::User();
		}
		if(is_null($objUser)){
			throw new MLCNotificationDriverException("Invalid user supplied");
		}
		
		//Send that shit
		$mixData->Send($objUser);
	}
	public static function ParseNotification($mixNotification){
		$objNotification = Notification::Parse($mixNotification);
		$strClass = $objNotification->ClassName;
		$objNoteClass = new $strClass($objNotification);
		return $objNoteClass;
	}
	public static function GetUserNotifications($objUser = null){
		if(is_null($objUser)){
			$objUser = MLCAuthDriver::User();
		}
		$arrNotifications = $objUser->GetNotificationAsIdArray();
		return $arrNotifications;
	}
}
class MLCNotificationDriverException extends Exception{
	
}
