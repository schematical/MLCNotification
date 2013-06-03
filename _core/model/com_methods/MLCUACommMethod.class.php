<?php
MLCApplication::InitPackage('MLCUrbanAirship');
class MLCUACommMethod{
	public function Send($objUser, $objNotification){
		$strApid = $objUser->GetUserSetting('ua_apid');
        //die("Hit:" . $strApid);
        $arrData = array();
        $arrData['android'] = array(
            'alert'=>$objNotification->Subject,
            //'extra'=>$objNotification->__toArray()
        );

		MUADriver::Push($arrData, array($strApid));
	}
}
