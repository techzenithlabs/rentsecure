<div class="main-content">
    <div class="cont-wrapper">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Rental Application - Residential</h1>
             
            </div>

            <form>
        <!-- Rental Details -->
        <div class="form-group">
            <label for="property">Property Address</label>
            <input type="text" class="form-control" id="property" name="property">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="startDay">Start Date</label>
                <input type="text" class="form-control" id="startDay" placeholder="Day" name="startDay">
            </div>
            <div class="form-group col-md-4">
                <label for="startMonth">Month</label>
                <input type="text" class="form-control" id="startMonth" placeholder="Month" name="startMonth">
            </div>
            <div class="form-group col-md-4">
                <label for="startYear">Year</label>
                <input type="text" class="form-control" id="startYear" placeholder="Year" name="startYear">
            </div>
        </div>
        <div class="form-group">
            <label for="rent">Monthly Rent</label>
            <input type="text" class="form-control" id="rent" name="rent">
        </div>
        <div class="form-group">
            <label for="dueDay">Rent Due Day</label>
            <input type="text" class="form-control" id="dueDay" name="dueDay">
        </div>

        <!-- Applicant 1 Details -->
        <h4><strong>Applicant</strong></h4>
        <div class="form-group">
            <label for="applicant1Name">Name</label>
            <input type="text" class="form-control" id="applicant1Name" name="applicant1Name">
        </div>
        <div class="form-group">
            <label for="applicant1Dob">Date of Birth</label>
            <input type="text" class="form-control" id="applicant1Dob" name="applicant1Dob">
        </div>
        <div class="form-group">
            <label for="applicant1Sin">SIN No. (Optional)</label>
            <input type="text" class="form-control" id="applicant1Sin" name="applicant1Sin">
        </div>
        <div class="form-group">
            <label for="applicant1License">Drivers License No.</label>
            <input type="text" class="form-control" id="applicant1License" name="applicant1License">
        </div>
        <div class="form-group">
            <label for="applicant1Occupation">Occupation</label>
            <input type="text" class="form-control" id="applicant1Occupation" name="applicant1Occupation">
        </div>

        <!-- Applicant 2 Details -->
        <div style="display:none">
        <h4>Applicant #2</h4>
        <div class="form-group">
            <label for="applicant2Name">Name</label>
            <input type="text" class="form-control" id="applicant2Name" name="applicant2Name">
        </div>
        <div class="form-group">
            <label for="applicant2Dob">Date of Birth</label>
            <input type="text" class="form-control" id="applicant2Dob" name="applicant2Dob">
        </div>
        <div class="form-group">
            <label for="applicant2Sin">SIN No. (Optional)</label>
            <input type="text" class="form-control" id="applicant2Sin" name="applicant2Sin">
        </div>
        <div class="form-group">
            <label for="applicant2License">Drivers License No.</label>
            <input type="text" class="form-control" id="applicant2License" name="applicant2License">
        </div>
        <div class="form-group">
            <label for="applicant2Occupation">Occupation</label>
            <input type="text" class="form-control" id="applicant2Occupation" name="applicant2Occupation">
        </div>
    </div>

        <!-- Other Occupants -->
        <h4>Other Occupants</h4>
        <div class="form-group">
            <label for="occupant1Name">Name</label>
            <input type="text" class="form-control" id="occupant1Name" name="occupant1Name">
        </div>
        <div class="form-group">
            <label for="occupant1Relationship">Relationship</label>
            <input type="text" class="form-control" id="occupant1Relationship" name="occupant1Relationship">
        </div>
        <div class="form-group">
            <label for="occupant1Age">Age</label>
            <input type="text" class="form-control" id="occupant1Age" name="occupant1Age">
        </div>
        <div class="form-group">
            <label for="pets">Do you have any pets?</label>
            <input type="text" class="form-control" id="pets" name="pets">
        </div>
        <div class="form-group">
            <label for="petsDescription">If so, describe</label>
            <textarea class="form-control" id="petsDescription" name="petsDescription"></textarea>
        </div>
        <div class="form-group">
            <label for="reasonVacating">Why are you vacating your present place of residence?</label>
            <textarea class="form-control" id="reasonVacating" name="reasonVacating"></textarea>
        </div>

        <!-- Employment Details -->
        <h4>Employment Details</h4>
        <div class="form-group">
            <label for="presentEmployer1">Applicant Present Employer</label>
            <input type="text" class="form-control" id="presentEmployer1" name="presentEmployer1">
        </div>
        <div class="form-group">
            <label for="presentEmployerAddress1">Business Address</label>
            <input type="text" class="form-control" id="presentEmployerAddress1" name="presentEmployerAddress1">
        </div>
        <div class="form-group">
            <label for="presentEmployerPhone1">Business Telephone</label>
            <input type="text" class="form-control" id="presentEmployerPhone1" name="presentEmployerPhone1">
        </div>
        <div class="form-group">
            <label for="presentPosition1">Position Held</label>
            <input type="text" class="form-control" id="presentPosition1" name="presentPosition1">
        </div>
        <div class="form-group">
            <label for="presentLength1">Length of Employment</label>
            <input type="text" class="form-control" id="presentLength1" name="presentLength1">
        </div>
        <div class="form-group">
            <label for="presentSupervisor1">Name of Supervisor</label>
            <input type="text" class="form-control" id="presentSupervisor1" name="presentSupervisor1">
        </div>
        <div class="form-group">
            <label for="presentSalary1">Current Salary Range: Monthly $</label>
            <input type="text" class="form-control" id="presentSalary1" name="presentSalary1">
        </div>

        <div class="form-group">
            <label for="presentEmployer2">Applicant #2 Present Employer</label>
            <input type="text" class="form-control" id="presentEmployer2" name="presentEmployer2">
        </div>
        <div class="form-group">
            <label for="presentEmployerAddress2">Business Address</label>
            <input type="text" class="form-control" id="presentEmployerAddress2" name="presentEmployerAddress2">
        </div>
        <div class="form-group">
            <label for="presentEmployerPhone2">Business Telephone</label>
            <input type="text" class="form-control" id="presentEmployerPhone2" name="presentEmployerPhone2">
        </div>
        <div class="form-group">
            <label for="presentPosition2">Position Held</label>
            <input type="text" class="form-control" id="presentPosition2" name="presentPosition2">
        </div>
        <div class="form-group">
            <label for="presentLength2">Length of Employment</label>
            <input type="text" class="form-control" id="presentLength2" name="presentLength2">
        </div>
        <div class="form-group">
            <label for="presentSupervisor2">Name of Supervisor</label>
            <input type="text" class="form-control" id="presentSupervisor2" name="presentSupervisor2">
        </div>
        <div class="form-group">
            <label for="presentSalary2">Current Salary Range: Monthly $</label>
            <input type="text" class="form-control" id="presentSalary2" name="presentSalary2">
        </div>

        <!-- Previous Employment -->
        <h4>Previous Employment</h4>
        <div class="form-group">
            <label for="previousEmployer1">Applicant  Previous Employer</label>
            <input type="text" class="form-control" id="previousEmployer1" name="previousEmployer1">
        </div>
        <div class="form-group">
            <label for="previousEmployerAddress1">Business Address</label>
            <input type="text" class="form-control" id="previousEmployerAddress1" name="previousEmployerAddress1">
        </div>
        <div class="form-group">
            <label for="previousEmployerPhone1">Business Telephone</label>
            <input type="text" class="form-control" id="previousEmployerPhone1" name="previousEmployerPhone1">
        </div>
        <div class="form-group">
            <label for="previousPosition1">Position Held</label>
            <input type="text" class="form-control" id="previousPosition1" name="previousPosition1">
        </div>
        <div class="form-group">
            <label for="previousLength1">Length of Employment</label>
            <input type="text" class="form-control" id="previousLength1" name="previousLength1">
        </div>
        <div class="form-group">
            <label for="previousSupervisor1">Name of Supervisor</label>
            <input type="text" class="form-control" id="previousSupervisor1" name="previousSupervisor1">
        </div>

        <div class="form-group">
            <label for="previousEmployer2">Applicant #2 Previous Employer</label>
            <input type="text" class="form-control" id="previousEmployer2" name="previousEmployer2">
        </div>
        <div class="form-group">
            <label for="previousEmployerAddress2">Business Address</label>
            <input type="text" class="form-control" id="previousEmployerAddress2" name="previousEmployerAddress2">
        </div>
        <div class="form-group">
            <label for="previousEmployerPhone2">Business Telephone</label>
            <input type="text" class="form-control" id="previousEmployerPhone2" name="previousEmployerPhone2">
        </div>
        <div class="form-group">
            <label for="previousPosition2">Position Held</label>
            <input type="text" class="form-control" id="previousPosition2" name="previousPosition2">
        </div>
        <div class="form-group">
            <label for="previousLength2">Length of Employment</label>
            <input type="text" class="form-control" id="previousLength2" name="previousLength2">
        </div>
        <div class="form-group">
            <label for="previousSupervisor2">Name of Supervisor</label>
            <input type="text" class="form-control" id="previousSupervisor2" name="previousSupervisor2">
        </div>

        <!-- Declaration -->
        <h4>Declaration</h4>
        <div class="form-group">
            <label for="signature1">Applicant  Signature</label>
            <input type="text" class="form-control" id="signature1" name="signature1">
        </div>
        <div class="form-group">
            <label for="date1">Date</label>
            <input type="text" class="form-control" id="date1" name="date1">
        </div>
        <div class="form-group">
            <label for="signature2">Applicant #2 Signature</label>
            <input type="text" class="form-control" id="signature2" name="signature2">
        </div>
        <div class="form-group">
            <label for="date2">Date</label>
            <input type="text" class="form-control" id="date2" name="date2">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 </div>
   </div>
