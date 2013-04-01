<?php
MLCApplication::InitPackage('MLCUrbanAirship');
class MLCUACommMethod{
	public function Send($objUser, $objNotification){
		$strApid = $objUser->GetUserSetting('ua_apid');
		MUADriver::Push($objNotification->__toJson(), array($strApid));
	}
}
