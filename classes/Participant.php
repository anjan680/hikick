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
		$participant_name,
        $instructor_name,
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
     
    function show_participant_details() {           
        $select_query="SELECT * FROM t_participant
                WHERE       
                tournament_id='1' AND
                participant_name='$this->participant_name' AND
                email_id='$this->email_id'";     
        $result=mysql_query($select_query);
        $data=mysql_fetch_array($result);
        if($data['participant_id']) {
            $choice_arr=array();
            if($data['choice_event_kata']){
                array_push($choice_arr,'kata');
            }
            if($data['choice_event_kumite']){
                array_push($choice_arr,'Kumite');
            }
            if($data['choice_event_weapons']){
                array_push($choice_arr,'Weapons');
            }
            if($data['choice_event_team_kata']){
                array_push($choice_arr,'Team Kata');
            }   
            $gender='Male';
            if($data['gender']==='F'){
                $gender='Female'; 
            }
            $state=$this->get_state($data['state_code']);       
            $choice_of_event=join(",",$choice_arr);

            $template='<div class="container">
                            <div class="row body-content">
                                <div class="col-lg-offset-1 col-lg-10 well2">
                                    <div class="well round-corner-right">
                                        <form class="form-horizontal">
                                            <div class="text-center legend">Candidate Registration for Tri Nation Cup Open Karate Championship 2014</div>
                                            <div class="row">
                                                <div class="col-xs-4 col-xs-push-8">
                                                    <div class="text-center">
                                                        <img src="uploads/'.$data['profile_picture'].'" alt="click me" class="img-thumbnail">
                                                    </div>
                                                </div>
                                                <div class="col-xs-8 col-xs-pull-4">
                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label">Registration No.</label>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control" disabled="true" value="'.$data['participant_id'].'">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label">Name</label>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control" disabled="true" value="'.$data['participant_name'].'">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="candidate_name" class="col-lg-4 control-label">Instructor</label>
                                                        <div class="col-lg-8">        
                                                            <input type="text" class="form-control" disabled="true" value="'.$data['instructor_name'].'">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label">Gender</label>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control" disabled="true" value="'.$gender.'">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label">Date Of Birth</label>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control" value="'.$data['dob'].'" disabled="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label">Weight</label>
                                                        <div class="col-xs-8">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" disabled="true" value="'.$data['weight'].'">
                                                                <span class="input-group-addon">Kg</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label">Country</label>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control" disabled="true" value="'.$data['country'].'">
                                                        </div>
                                                    </div>
                                                    <div class="states-selection">

                                                    </div>
                                                    <div class="club-selection row">

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label">Choice of Events</label>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control" disabled="true" value="'.$choice_of_event.'">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label">Contact No.</label>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control" disabled="true" value="'.$data['contact_no'].'">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label">Email</label>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control" disabled="true" value="'.$data['email_id'].'">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address" class="col-xs-4 control-label">Address</label>
                                                        <div class="col-xs-8">
                                                            <textarea class="form-control" rows="4" disabled="true">'.$data['address'].'</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group hidden-print ">
                                                    <div class="col-sm-12 text-center">
                                                        <input type="button" onClick=window.print() class="btn btn-primary bttn-round-corner" value="Print">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                       </div>';
            echo $template;
            exit;
        }else{
            echo "No Such Candidate";
            exit;
        }
    }
    function get_state($state_code){
        switch($state_code){
            case 'AN':
                return 'Andaman and Nicobar Islands';
                break;
            case 'AP':
                return 'Andhra Pradesh';
                break;
            case 'AR':
                return 'Arunachal Pradesh';
                break;
            case 'AS':
                return 'Assam';
                break;
            case 'BR':
                return 'Bihar';
                break;
            case 'CH':
                return 'Chandigarh';
                break;
            case 'CT':
                return 'Chhattisgarh';
                break;
            case 'DN':
                return 'Dadra and Nagar Haveli';
                break;
            case 'DD':
                return 'Daman and Diu';
                break;
            case 'DL':
                return 'Delhi';
                break;
            case 'GA':
                return 'Goa';
                break;
            case 'GJ':
                return 'Gujarat';
                break;
            case 'HR':
                return 'Haryana';
                break;
            case 'HP':
                return 'Himachal Pradesh';
                break;
            case 'JK':
                return 'Jammu and Kashmir';
                break;
            case 'JR':
                return 'Jharkhand';
                break;
            case 'KA':
                return 'Karnataka';
                break;
            case 'KL':
                return 'Kerala';
                break;
            case 'LD':
                return 'Lakshadweep';
                break;
            case 'MP':
                return 'Madhya Pradesh';
                break;
            case 'MH':
                return 'Maharashtra';
                break;
            case 'MN':
                return 'Manipur';
                break;
            case 'ML':
                return 'Meghalaya';
                break;
            case 'MZ':
                return 'Mizoram';
                break;
            case 'NL':
                return 'Nagaland';
                break;
            case 'OR':
                return 'Orissa';
                break;
            case 'PY':
                return 'Pondicherry';
                break;
            case 'PB':
                return 'Punjab';
                break;
            case 'RJ':
                return 'Rajasthan';
                break;
            case 'SK':
                return 'Sikkim';
                break;
            case 'TN':
                return 'Tamil Nadu';
                break;
            case 'TE':
                return 'Telangana';
                break;
            case 'TR':
                return 'Tripura';
                break;
            case 'UL':
                return 'Uttaranchal';
                break;
            case 'UP':
                return 'Uttar Pradesh';
                break;
            case 'WB':
                return 'West Bengal';
                break;
            default:
                return 'Other';
        }
    }

    function is_already_registered() {          
        $select_query="SELECT * FROM t_participant
                WHERE       
                tournament_id='1' AND
                participant_name='$this->participant_name' AND
                email_id='$this->email_id'"; 
        $result=mysql_query($select_query);
        $data=mysql_fetch_array($result);
        if($data['participant_id']){
            return $data['participant_id'];
        }
        return false;
    }

	function insert_into_participant() {
		$tournament_id='1';
        $path = $_FILES['file']['name'];
        $randum_hex=dechex(rand (10,10e9)).dechex(rand (10,10e9)).dechex(rand (10,10e9));
        $profile_picture = $randum_hex.'.'.pathinfo($path, PATHINFO_EXTENSION);			
	 	$query="INSERT INTO t_participant
				(
					tournament_id,
					participant_name,
                    instructor_name,
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
					address,
                    profile_picture
				)						
		 	 	VALUES 
				(
					'1',
					'$this->participant_name',
                    '$this->instructor_name',
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
					'$this->address',
                    '$profile_picture'
				)";	
        if ($this->is_already_registered()) {
            $this->show_participant_details();
        }
        else {                
            if (mysql_query($query)) { 
                $candidate_id=$this->is_already_registered(); 
                $tmp_name=$_FILES['file']['tmp_name'];
                $target_dir = 'uploads/'.$profile_picture;
                move_uploaded_file($tmp_name, $target_dir);       
                $this->show_participant_details();
            }
        }
	}

} // End of Class
?>