<?php
namespace App\Helpers;

use Session;
/**
* using {!!\App\Helpers\WidgetAlert::show()!!} in view or {!!WidgetAlert::show()!!} if added to config/app.php in aliases
* 
*/
class WidgetAlert
{
	const ALERT_TYPE = [
		'error'           => 'widget',
		'errors'          => 'widget',
        'danger'          => 'widget',
        'success'         => 'widget',
        'info'            => 'widget',
        'warning'         => 'widget',
        'default'         => 'widget',
        'primary'         => 'widget',
	];

	/**
	*@var delay string | boolean | integer
	*@var App\Helpers
	* delay default is boolean true
	* if delay is integer then alert will hide in time of delay
	* if delay == false then will not hide
	*/
	public static function show($delay = true)
	{
		foreach (self::ALERT_TYPE as $alertType => $widget) {
			if (is_array(Session::get($alertType)) || is_object(Session::get($alertType))) {
				return (new WidgetAlert())->validatorAlert($alertType, Session::get($alertType), $delay);
			}
			else {
				if (Session::has($alertType)) {
					return (new WidgetAlert())->message($alertType,Session::get($alertType), $delay , 'widget');
				}
			}
		}
	}

	/**
	*@var alert string
	*@var mess string
	*@var type string
	*@var App\Helpers
	*@return string
	*/
	public function validatorAlert($alert, $mess, $type)
	{
		$error_string = '';
		if (count($mess) > 0) {
			foreach ($mess->all() as $k => $messages) {
				$error_string .= "<li>$messages</li>";
			}
		}
		return $this->message($alert, $error_string, $type, 'validator');
	}

	/**
	*@var alert string
	*@var mess string
	*@var type string
	*@var type widget
	*@return string
	*/

	public function message($alert, $mess, $type, $widget)
	{
		if ($widget == 'widget') {
			$mess = '<h5 style="font-size:18px;">'.$mess.'</h5>';
		}
		elseif($widget == "validator") {
			$mess = '<ul>'.$mess.'</ul>';
		}

		return $this->createAlert($alert, $mess, $type);
	}


	/**
	*@var alert string
	*@var mess string
	*@var type string
	*@var App\Helpers
	*@return string
	* method returns an html alert
	*/
	public function createAlert($alert, $mess, $type)
	{
		$delay = '';
		if (is_bool($type)) {
			if ($type) {
				$delay = ' alert-widget ';
			}
		}elseif(is_string($type) || is_numeric($type)){
			$delay = ' alert-widget" data-delay="'.$type.'"';
		}
		return '<div class="alert  alert-'.$alert.'  alert-dismissible fade in '.$delay.'" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  	</button>
                	'.$mess.'
                </div>';
	}
}