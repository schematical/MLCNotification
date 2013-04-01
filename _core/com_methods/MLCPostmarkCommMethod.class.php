<?php
class MLCPostmarkCommMethod{
	public function Send($objUser, $objNotification){
		
		$objNotifiticaton = $mixTo;
		$objUser = $mixTo->User;
		try{
			if(is_null($this->strEmailTemplate)){
	 			$objMessage = MLCEmailDriver::Compose();
				$objMessage->messageHtml($objNotifiticaton->Body);
				$objMessage->messagePlain($objNotifiticaton->Body);
			}else{
				$objMessage = MLCEmailDriver::ComposeFromTemplate(
					$this->strEmailTemplate,
					$arrData
				);
			}
			
	        $objMessage->subject($this->strSubject);
	        $objMessage->addTo($objUser->Email, $objUser->Email)->send();
			return true;
		}catch(Exception $e){			
			error_log($e->getMessage());
			return false;
		}

	}
}