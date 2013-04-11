<?php
define('__MLC_NOTIFICATION__', dirname(__FILE__));
define('__MLC_NOTIFICATION_CORE__', __MLC_NOTIFICATION__ . '/_core');


define('__MLC_NOTIFICATION_CORE_CTL__', __MLC_NOTIFICATION_CORE__ . '/ctl');
define('__MLC_NOTIFICATION_CORE_MODEL__', __MLC_NOTIFICATION_CORE__ . '/model');
define('__MLC_NOTIFICATION_CORE_VIEW__', __MLC_NOTIFICATION_CORE__ . '/view');
define('__MLC__NOTIFICATION_CG__', __MLC_NOTIFICATION__ . '/_codegen');
MLCApplicationBase::$arrClassFiles['MLCNotificationDriver'] = __MLC_NOTIFICATION_CORE_MODEL__ . '/MLCNotificationDriver.class.php';
MLCApplicationBase::$arrClassFiles['MLCNotificationObjectBase'] = __MLC_NOTIFICATION_CORE_MODEL__ . '/MLCNotificationObjectBase.class.php';
//DataLayer
MLCApplicationBase::$arrClassFiles['MLCNotification'] = __MLC_NOTIFICATION_CORE_MODEL__ . '/data_layer/MLCNotification.class.php';
//CTL
MLCApplicationBase::$arrClassFiles['MLCNotificationListPanel'] = __MLC_NOTIFICATION_CORE__ . '/MLCNotificationListPanel.class.php';
MLCApplicationBase::$arrClassFiles['MLCNotificationEditPanel'] = __MLC_NOTIFICATION_CORE__ . '/MLCNotificationEditPanel.class.php';
//Comm methods
MLCApplicationBase::$arrClassFiles['MLCPostmarkCommMethod'] = __MLC_NOTIFICATION_CORE_MODEL__ . '/com_methods/MLCPostmarkCommMethod.class.php';
MLCApplicationBase::$arrClassFiles['MLCUACommMethod'] = __MLC_NOTIFICATION_CORE_MODEL__ . '/com_methods/MLCUACommMethod.class.php';




//require_once(__MLC_NOTIFICATION_CORE__ . '/_enum.inc.php');
MLCNotificationDriver::Init();
