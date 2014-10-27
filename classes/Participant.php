<!--*************************************************************************************************************
                               Project      : Hikick
                               Class        : Participant
                               Modified By  : Monojit
                               Purpose      : participant regisrtation 
**************************************************************************************************************-->

<?php

include('./includes/db.php');


class Participant { 
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

	function insert_into_participant() {	
		$tournament_id='1';
				
	 	$query="INSERT INTO t_participant
				(
					tournament_id,
					participant_name,
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
					'$this->participant_name',
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
			$template='<div class="container">
        <!--   <div class="navbar navbar-inverse">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Brand</a>
          </div>
          <div class="navbar-collapse collapse navbar-inverse-collapse">
              <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Active</a>
                  </li>
                  <li><a href="#">Link</a>
                  </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Link</a>
                  </li>
              </ul>
          </div>
      </div> -->


        <div class="row body-content">
            <!-- <div class="col-lg-4 visible-lg">
                <div class="well round-corner-left">
                    <div class="image-container"><img src="./images/ka.jpg"></div>
                </div>
            </div> -->
            <div class="col-lg-offset-1 col-lg-10 well2">
                <div class="well round-corner-right">
                    <form class="form-horizontal" name="frmAddProduct" id="frmAddProduct" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend>
                                <div class="col-sm-offset-1">Legend</div>
                            </legend>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="candidate_name" class="col-lg-4 control-label">Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="candidate_name" id="candidate_name" value="'.$this->participant_name.'" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Gender</label>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="sex" value="M" checked="">Male
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="sex"  value="F">Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                            

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="candidate_dob" class="col-lg-4 control-label">Date Of Birth</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control date" name="candidate_dob" id="candidate_dob" placeholder="DD/MM/YYYY" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="candidate_weight" class="col-lg-4 control-label">Weight</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="candidate_weight" id="candidate_weight" placeholder="Ex : 50.58" required>
                                                <span class="input-group-addon">Kg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="select" class="col-lg-4 control-label">Country</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="country" id="country" required>
                                                <option value="" selected>-select-</option>
                                                <option value="India">India</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 states-selection">

                                </div>
                            </div>

                            <div class="club-selection row">

                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Choice of Events</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="kata" id="kata" value="1">Kata
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="kumite" id="kumite" value="1">Kumite
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="weapons" id="weapons" value="1">Weapons
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="team_kata" id="team_kata" value="1">Team Kata
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="candidate_mo_num" class="col-lg-4 control-label">Contact No.</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="candidate_mo_num" id="candidate_mo_num" placeholder="Ex. +91-1234567890" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="candidate_email" class="col-lg-4 control-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="candidate_email" id="candidate_email" placeholder="Ex. abc@123.com">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">Address</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="4" name="address" id="address" required></textarea>
                                    <span class="help-block">Enter proper mailing address</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12 text-center">
                                    <!-- <button type="submit" class="btn btn-primary bttn-round-corner" name="submit" id="submit">Submit</button> -->
                                     <input type="submit" name="Submit" id="submit_button"  class="btn btn-primary bttn-round-corner" value="Register">
                                </div>
                            </div> 
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>';/*
			echo $template;
			exit;*/

	 	$select_query="SELECT * FROM t_participant
	 			WHERE		
					tournament_id='1' AND
					participant_name='$this->participant_name' AND
					country='$this->country' AND
					state_code='$this->state_code' AND
					gender='$this->gender' AND
					club_name='$this->club_name' AND
					dob='$this->dob' AND
					weight='$this->weight' AND
					choice_event_kata='$this->choice_event_kata' AND
					choice_event_kumite='$this->choice_event_kumite' AND
					choice_event_weapons='$this->choice_event_weapons' AND
					choice_event_team_kata='$this->choice_event_team_kata' AND
					email_id='$this->email_id' AND
					contact_no='$this->contact_no' AND
					address='$this->address'";	

			$result=mysql_query($select_query) or die(mysql_error());
			$data=mysql_fetch_array($result);
            echo '<script language="javascript" type="text/javascript">
                  alert("Your Participant Id is '.$data['participant_id'].'");
                 </script>';
		} else {
			echo $query;
			echo '<script language="javascript" type="text/javascript">
				  alert("Employee Details not Inserted");
				 </script>';
		}
	}
	 
    function registered_participant_details(){
    		
    	$select_query="SELECT * FROM t_participant
    			WHERE		
    			tournament_id='1',
    			participant_name='$this->participant_name',
    			email_id='$this->email_id'";	
    		echo $select_query;	
    	$result=mysql_query($select_query) or die(mysql_error());
    	$data=mysql_fetch_array($result);
    	echo $data['participant_id'];
    	exit;
    }

} // End of Class
?>