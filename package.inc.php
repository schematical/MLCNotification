<?php
define('__MLC_NOTIFICATION_', dirname(__FILE__));
define('__MLC_NOTIFICATION_CORE__', __MLC_NOTIFICATION__ . '/_core');


define('__MLC_NOTIFICATION_CORE_CTL__', __MLC_NOTIFICATION_CORE__ . '/ctl');
define('__MLC_NOTIFICATION_CORE_MODEL__', __MLC_NOTIFICATION_CORE__ . '/model');
define('__MLC_NOTIFICATION_CORE_VIEW__', __MLC_NOTIFICATION_CORE__ . '/view');
define('__MLC__NOTIFICATION_CG__', __MLC_NOTIFICATION__ . '/_codegen');
MLCApplicationBase::$arrClassFiles['MLCNotificationDriver'] = __MLC_NOTIFICATION_CORE__ . '/MLCNotificationDriver.class.php';
MLCApplicationBase::$arrClassFiles['MLCNotificationBase'] = __MLC_NOTIFICATION_CORE__ . '/MLCNotificationBase.class.php';
//DataLayer
MLCApplicationBase::$arrClassFiles['MLCNotification'] = __MLC_NOTIFICATION_CORE__ . '/MLCNotificationBase.class.php';
//CTL
MLCApplicationBase::$arrClassFiles['MLCNotificationListPanel'] = __MLC_NOTIFICATION_CORE__ . '/MLCNotificationListPanel.class.php';
MLCApplicationBase::$arrClassFiles['MLCNotificationEditPanel'] = __MLC_NOTIFICATION_CORE__ . '/MLCNotificationEditPanel.class.php';
//Comm methods
MLCApplicationBase::$arrClassFiles['MLCPostmarkCommMethod'] = __MLC_NOTIFICATION_CORE__ . '/MLCPostmarkCommMethod.class.php';
MLCApplicationBase::$arrClassFiles['MLCUACommMethod'] = __MLC_NOTIFICATION_CORE__ . '/MLCUACommMethod.class.php';




//require_once(__MLC_NOTIFICATION_CORE__ . '/_enum.inc.php');
MLCNotificationDriver::Init();
