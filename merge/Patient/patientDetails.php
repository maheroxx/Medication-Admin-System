<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link type="text/css" rel="stylesheet" href="./CSS/patientDetails.css">

</head>
<body>
    <div class = "Wrapper">
        <!--Header Section of the Website-->
        <div class = "Header">
            <div class = "Logo">Logo</div>
        </div>
        <!-------------End--------------------->

        <div class ="MainContentHolder">
            <div class = "DashboardHolder">
                <div class = "DashboardOptionsHolder">
                    <div class ="DashboardOptions">Users </div>
                    <div class ="DashboardOptions"><a href = "index.php">- View Nurse</a></div>
                    <div class ="DashboardOptions"><a href = "viewDoctor.php">- View Doctor</a></div>
                    <div class ="DashboardOptions"><a href = "viewPatient.php">- View Patient </a></div>
                    <div class ="DashboardOptions"><a href = "addUsers.php">- Add Users </a></div>
                </div>

                <div class = "DashboardOptionsHolder">
                    <div class ="DashboardOptions">Back </div>
                    <div class ="DashboardOptions">Logout </div>
                </div>
            </div>

            <div class = "DashboardRightSideHolder">
                <div class = "SearchbarHolder">

                </div>

                <div class = "PatientDetailsHolder">
                    <div class ="ImageHolder"></div>
                    <div class ="DetailsHolder">
                        <div class = "PersonalInformationHolder">
                            Personal Information
                        </div>

                        <div class = "TopSection">
                            <div class = "FieldHolder">
                                Name
                                <input type="text" class="FieldDesign" name="bloodgroup" value="John Doe">
                            </div>

                            <div class = "FieldHolder">
                                Blood Group
                                <input type="text" class="FieldDesign" name="bloodgroup" value="A+">
                            </div>
    
                            <div class = "FieldHolder">
                                Gender
                                <div class ="RadioButtonHolder">
                                    <div class = "RadioHolder">
                                        <input type="radio"  class = "RadioStyle" name="Male" value="Male">
                                        <label for="age1">Male</label><br>
                                    </div>
                                    <div class = "RadioHolder">
                                        <input type="radio"  class = "RadioStyle" name="Female" value="Female">
                                        <label for="age1">Female</label><br>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class ="MedicationHistoryHolder">
                    <div class = "PersonalInformationHolder">
                        Medication History
                    </div>

                    <div class ="MedicalHistoryTabHolder">
                        <div class = "MedicalHistoryTab">
                            <div class = "AllergyHeader">
                                Allergies
                            </div>

                            <div class = "AllergyBox">
                                - Nuts<br>
                                - Sugar
                            </div>
                        </div>

                        <div class = "MedicalHistoryTab">
                            <div class = "AllergyHeader">
                                Allergies
                            </div>

                            <div class = "AllergyBox">
                                - Nuts<br>
                                - Sugar
                            </div>
                        </div>

                        <div class = "MedicalHistoryTab">
                            <div class = "AllergyHeader">
                                Allergies
                            </div>

                            <div class = "AllergyBox">
                                - Nuts<br>
                                - Sugar
                            </div>
                        </div>
                    </div>

                    
                </div>





            </div>


        </div>

    </div>
</body>
</html>