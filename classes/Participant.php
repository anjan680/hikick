<!--*************************************************************************************************************
                               Project      : Flexifoods
                               Class        : Employee
                               Page Name    : employee_class.php
                               Modified By  : Ajit
                               Purpose      : To Employee
                               Powered By   : Softech ERP Solutions Pvt. Ltd. 
**************************************************************************************************************-->

<?php

include('./includes/db.php');


class Participant
{ 
	 	/****************************************************************************************
			Member Variables	
		 ***************************************************************************************/
		var 
			$first_name,
			$last_name,
			$country,
			$state_code,
			$gender,
			$club_name,
			$dob,
			$weight,
			$choice_event_kata,
			$choice_event_kumite,
			$choice_event_weapons,
			$choice_event_team_kata,
			$email_id,
			$contact_no,
			$address;			
			
			
			

	 	/****************************************************************************************
			Member functions
		*****************************************************************************************
			// function insert()
			// function getvalue($id)
			// function getall()
			// function delete($id)
			// function edit($id)
		*****************************************************************************************/

	function insert_into_participant()
	{	
		$tournament_id='1';
				
	 	$query="INSERT INTO t_participant
				(
					tournament_id,
					first_name,
					last_name,
					country,
					state_code,
					gender,
					club_name,
					dob,
					weight,
					choice_event_kata,
					choice_event_kumite,
					choice_event_weapons,
					choice_event_team_kata,
					email_id,
					contact_no,
					address
				)						
		 	 	VALUES 
				(
					'1',
					'$this->first_name',
					'$this->last_name',
					'$this->country',
					'$this->state_code',
					'$this->gender',
					'$this->club_name',
					'$this->dob',
					'$this->weight',
					'$this->choice_event_kata',
					'$this->choice_event_kumite',
					'$this->choice_event_weapons',
					'$this->choice_event_team_kata',
					'$this->email_id',
					'$this->contact_no',
					'$this->address'
				)";	
				
		if(mysql_query($query))
		{
			echo "<script language='javascript' type='text/javascript'>
				  alert('Employee details Inserted ');</script>";
		}
		else
		{
				echo $query;
			echo "<script language='javascript' type='text/javascript'>
				  alert('Employee Details not Inserted');
				 </script>";
		}
	 }

} // End of Class
?>