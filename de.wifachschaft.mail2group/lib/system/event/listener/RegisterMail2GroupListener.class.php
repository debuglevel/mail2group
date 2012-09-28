<?php
//wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');
require_once(WCF_DIR.'/../../emailValidator.php');

class RegisterMail2GroupListener implements EventListener {
	
	public function execute($eventObj, $className, $eventName){
		//echo "|".$className." - ".$eventName."|";

		//fire when:
		//RegisterActivationForm - save

		if (
			($className == "RegisterActivationForm" && $eventName == "save")
		)
		{
			if (isApprovedMail($eventObj->user->email) === false)
			{
				echo "mail not approved";
			}
			else
			{
				echo "mail approved";

				$groupID = 9;
	
				// add user to group
				require_once(WCF_DIR.'lib/data/user/UserEditor.class.php');
				$user = new UserEditor($eventObj->user->userID);
				$user->addToGroup($groupID);
				$user->resetSession();
			}
		}

		if ($className == "EmailActivationForm" && $eventName == "save")
		{
			if (isApprovedMail($eventObj->user->newEmail) === false)
			{
				echo "mail not approved";
			}
			else
			{
				echo "mail approved";

				$groupID = 9;
	
				// add user to group
				require_once(WCF_DIR.'lib/data/user/UserEditor.class.php');
				$user = new UserEditor($eventObj->user->userID);
				$user->addToGroup($groupID);
				$user->resetSession();
			}
		}

	}
}
?>
