<?php
MLCApplication::InitPackage('MLCPostmark');
class MLCPostmarkCommMethod{

	public function Send($objUser, $objNotification){
		try{
			if(is_null($objNotification->EmailTemplate)){
	 			$objMessage = MLCPostmarkDriver::Compose();
				$objMessage->messageHtml($objNotification->Body);
				$objMessage->messagePlain($objNotification->Body);
			}else{
				$objMessage = MLCPostmarkDriver::ComposeFromTemplate(
                    $objNotification->EmailTemplate,
					array(
                        '_NOTIFICATION'=>$objNotification
                    )
				);
			}
			
	        $objMessage->subject($objNotification->Subject);
	        $objMessage->addTo($objUser->Email, $objUser->Email)->send();
			return true;
		}catch(Exception $e){
            throw $e;
			error_log($e->getMessage());
			return false;
		}

	}
}