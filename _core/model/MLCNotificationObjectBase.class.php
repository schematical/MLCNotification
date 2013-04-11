<?php
abstract class MLCNotificationObjectBase{
	protected $objNoteDataLayer = null;
	protected $strSubject = null;
	protected $strBody = null;
	protected $strEmailTemplate = null;
	
	public function __construct($objNotification = null){

		if(!is_null($objNotification)){
			if($objNotification->ClassName != get_class($this)){
				throw new Exception("This is not the correct class for this notification");
			}
			$this->objNoteDataLayer = $objNotification;
			$this->ParseData($this->objNoteDataLayer->Data);
		}else{

			$this->objNoteDataLayer = new MLCNotification();
			$this->objNoteDataLayer->CreDate = MLCDateTime::Now();
			$this->objNoteDataLayer->ClassName = get_class($this);
		}

	}
	public function GetNoteDataLayer(){
		//Add data layer
		$this->objNoteDataLayer->Data = $this->GetData();
		//
		return $this->objNoteDataLayer;
	}
	public function GetData(){
		$arrData = array();
		$arrData['Subject'] = $this->strSubject;
		$arrData['Body'] = $this->strBody;
		$arrData['EmailTemplate'] = $this->strEmailTemplate;
		return $arrData;
	}
	public function ParseData($mixData){
		if(is_string($mixData)){
			$arrData = json_decode($mixData, true);
		}else{
			$arrData = $mixData;
		}
		$this->strSubject = $arrData['Subject'];
		$this->strBody = $arrData['Body'];
		$this->strEmailTemplate = $arrData['EmailTemplate'];
		return $arrData;
	}
	public function Send($objUser){
		$arrData = $this->GetData();
		$this->objNoteDataLayer->IdUser = $objUser->IdUser;
		$this->objNoteDataLayer->Data = json_encode($arrData);
		$this->objNoteDataLayer->Save();
		MLCNotificationDriver::$arrCommMethod['email']->Send($objUser, $this);
		//Find send methods
		foreach(MLCNotificationDriver::$arrCommMethod as $strKey => $objCommMethod){
            $strValue = $objUser->GetUserSetting($strKey);
			if(!is_null($strValue)){
				$objCommMethod->Send($objUser, $this);
			}
		}
		
	}
    public function __toArray(){
        $arrData = $this->GetData();
        return $arrData;
    }
    public function __toJson(){
        return json_encode($this->__toArray());
    }
	public function __get($strName){
		switch($strName){
			case('Subject'):
				return $this->strSubject;
			case('Body'):
				return $this->strBody;
			case('EmailTemplate'):
				return $this->strEmailTemplate;
			default:
				throw new MLCMissingPropertyException($this, $strName);
		}
	}
	public function __set($strName, $mixValue){
		switch($strName){
			case('Subject'):
				return $this->strSubject = $mixValue;
			case('Body'):
				return $this->strBody = $mixValue;
			case('EmailTemplate'):
				return $this->strEmailTemplate = $mixValue;
			default:
				throw new MLCMissingPropertyException($this, $strName);
		}
	}
}
