<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Try Bootstrap</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./lib/bootstrap-3.2.0-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./lib/bootstrap.min.css"> -->
    <link rel="icon" type="image/png" href="./images/favicon.jpg">

    <link href="./lib/datePicker/source/datepicker_dashboard/datepicker_dashboard.css" rel="stylesheet">


    <script src="./lib/datePicker/mootools-core.js" type="text/javascript"></script>
    <script src="./lib/datePicker/mootools-more.js" type="text/javascript"></script>

    <script type="text/javascript" src="./lib/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="./lib/handlebars-v2.0.0.js"></script>
    <script type="text/javascript" src="./lib/bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>

    <script src="./lib/datePicker/source/Locale.en-US.DatePicker.js" type="text/javascript"></script>
    <script src="./lib/datePicker/source/Picker.js" type="text/javascript"></script>
    <script src="./lib/datePicker/source/Picker.Attach.js" type="text/javascript"></script>
    <script src="./lib/datePicker/source/Picker.Date.js" type="text/javascript"></script>

    <script src="./js/form.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        //Date.defineFormat('dddmmyyy', '%d/%m/%Y');
        new Picker.Date($$('.date'), {
            timePicker: false,
            positionOffset: {
                x: 5,
                y: 0
            },
            pickerClass: 'datepicker_dashboard',
            useFadeInOut: !Browser.ie,
            draggable: false
        })
    });
    </script>

</head>

<body>


<?php

	
	include('./classes/Participant.php');

	$objParticipant= new Participant();
	
	if(@$_POST['Submit'])
	{		
            $objParticipant->first_name = str_replace("''","''", $_POST['candidate_first_name']);
            $objParticipant->last_name=str_replace("''","''", $_POST['candidate_last_name']);
            $objParticipant->country=str_replace("''","''", $_POST['country']);
            $objParticipant->state_code=str_replace("''","''", $_POST['state']);
            $objParticipant->gender=str_replace("''","''", $_POST['sex']);
            $objParticipant->club_name=str_replace("''","''", $_POST['club']);
            $objParticipant->dob=str_replace("''","''", $_POST['candidate_dob']);////////DOB in string
            $objParticipant->weight=str_replace("''","''", $_POST['candidate_weight']);
            $objParticipant->choice_event_kata=str_replace("''","''", $_POST['kata']);
            $objParticipant->choice_event_kumite=str_replace("''","''", $_POST['kumite']);
            $objParticipant->choice_event_weapons=str_replace("''","''", $_POST['weapons']);
            $objParticipant->choice_event_team_kata=str_replace("''","''", $_POST['team_kata']);
            $objParticipant->email_id=str_replace("''","''", $_POST['candidate_email']);
            $objParticipant->contact_no=str_replace("''","''", $_POST['candidate_mo_num']);
            $objParticipant->address=str_replace("''","''", $_POST['address']);
			
			$objParticipant->insert_into_participant();
				

	}
	
?>


    <div class="container">
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
                    <form class="form-horizontal" name="frmAddProduct" id="frmAddProduct" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>
                                <div class="col-sm-offset-1">Legend</div>
                            </legend>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="candidate_f_name" class="col-lg-4 control-label">First Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="candidate_first_name" id="candidate_first_name" name="candidate_first_name" placeholder="Candidate's First Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="candidate_l_name" class="col-lg-4 control-label">Last Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="candidate_last_name" id="candidate_last_name" placeholder="Candidate's Last Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Gender</label>
                                <div class="col-sm-10">
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
                                     <input type="submit" name="Submit" id="submit_button"  class="btn btn-primary bttn-round-corner" />
                                </div>
                            </div> 
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script class="club-select-template" type="text/x-handlebars-template">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="club_name" class="col-lg-4 control-label">Club</label>
                <div class="col-lg-8">
                    <select class="form-control" id="club" name="club" required>
                        <option value="" selected>-select-</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-6 club-input">

        </div>
    </script>
    <script class="club-input-template" type="text/x-handlebars-template">
        <div class="form-group">
            <label for="club_name_other" class="col-lg-1 control-label">&nbsp;</label>
            <div class="col-lg-11">
                <input type="text" class="form-control" id="club_name_other" placeholder="Enter Your Club Name">
            </div>
        </div>
    </script>
    <script class="states-selection-template" type="text/x-handlebars-template">
        <div class="form-group">
            <label for="select" class="col-lg-4 control-label">State</label>
            <div class="col-lg-8">
                <select class="form-control" id="state" name="state" required>
                    <option value="default" selected="">-Select-</option>
                    <option value="AN">Andaman and Nicobar Islands</option>
                    <option value="AP">Andhra Pradesh</option>
                    <option value="AR">Arunachal Pradesh</option>
                    <option value="AS">Assam</option>
                    <option value="BR">Bihar</option>
                    <option value="CH">Chandigarh</option>
                    <option value="CT">Chhattisgarh</option>
                    <option value="DN">Dadra and Nagar Haveli</option>
                    <option value="DD">Daman and Diu</option>
                    <option value="DL">Delhi</option>
                    <option value="GA">Goa</option>
                    <option value="GJ">Gujarat</option>
                    <option value="HR">Haryana</option>
                    <option value="HP">Himachal Pradesh</option>
                    <option value="JK">Jammu and Kashmir</option>
                    <option value="JR">Jharkhand</option>
                    <option value="KA">Karnataka</option>
                    <option value="KL">Kerala</option>
                    <option value="LD">Lakshadweep</option>
                    <option value="MP">Madhya Pradesh</option>
                    <option value="MH">Maharashtra</option>
                    <option value="MN">Manipur</option>
                    <option value="ML">Meghalaya</option>
                    <option value="MZ">Mizoram</option>
                    <option value="NL">Nagaland</option>
                    <option value="OR">Orissa</option>
                    <option value="PY">Pondicherry</option>
                    <option value="PB">Punjab</option>
                    <option value="RJ">Rajasthan</option>
                    <option value="SK">Sikkim</option>
                    <option value="TN">Tamil Nadu</option>
                    <option value="TE">Telangana</option>
                    <option value="TR">Tripura</option>
                    <option value="UL">Uttaranchal</option>
                    <option value="UP">Uttar Pradesh</option>
                    <option value="WB">West Bengal</option>
                </select>
            </div>
        </div>
    </script>
</body>

</html>
