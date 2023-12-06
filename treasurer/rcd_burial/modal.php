<form id="burial_form">
  <div class="modal fade" id="burial_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">RPT Tax Computation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">                              
          <input type="text" class="form-control" id="batch_code" name="batch_code" hidden>
            <div class="row"> 
              <div class="col">                    
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="id" name="id" readonly>
                  <label for="clerkid">Transaction ID</label>
                </div>
              </div> 
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="transnum" id="transnum" readonly>
                  <label for="transnum">Transaction_number</label>
                </div>
              </div>              
              <div class="col">                    
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="clerkid" name="clerkid" readonly>
                  <label for="clerkid">Clerk ID</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="ornumber" name="ornumber" placeholder="OR NUMBER" readonly>
                  <label for="ornumber">OR Number</label>
                </div>
              </div>					              
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="payor" name="payor" placeholder="Payor">
              <label for="payor">Payor</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="applicant" id="applicant" placeholder="Applicant"  required>
              <label for="applicant">Applicant</label>
            </div>


            <div class="row">                  
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="municipality" id="municipality" placeholder="MUNICIPALITY" >
                  <label for="municipality">Municipality</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="province" id="province" placeholder="PROVINCE" value="CEBU">
                  <label for="province">Province</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="date" class="form-control" name="dated" id="dated" placeholder="PROVINCE" value="<?php echo date('Y-m-d')?>" required>
                  <label for="dated">Date Applied</label>
                </div>
              </div>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="deceased_person" id="deceased_person" placeholder="DECEASED PERSON" required>
              <label for="deceased_person">Deceased Person</label>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="nationality" id="nationality" placeholder="NATIONALITY" required>
                  <label for="nationality">Nationality</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" name="age" id="age" placeholder="AGE" required>
                  <label for="age">Age</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating">
                  <select class="form-select" name="gender" id="gender" aria-label="Floating label select example" required>
                    <option value="" disabled>Select Here</option>
                    <option value="MALE">MALE</option>
                    <option value="FEMALE">FEMALE</option>
                  </select>
                  <label for="gender">Gender</label>
                </div>
              </div>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="causeofdeath" id="causeofdeath" placeholder="CAUSE OF DEATH" required>
              <label for="cemetery">Cause of Death</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="cemetery" id="cemetery" placeholder="CEMETERY" required>
              <label for="cemetery">Cemetery</label>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-floating mb-3">
                  <select class="form-select" name="ini" id="ini" aria-label="Floating label select example" required>
                    <option value="" disabled>Select Here</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                  <label for="ini">Infectious / Not Infectious</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating mb-3">
                  <select class="form-select" name="ene" id="ene" aria-label="Floating label select example" required>
                    <option value="" disabled>Select Here</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                  <label for="ene">Embalmed / Not Embalmed</label>
                </div>
              </div>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="dor" id="dor" placeholder="FEE" required>
              <label for="dor">Disposition of Remains</label>
            </div>

            <div class="form-floating mb-3">
              <input type="number" class="form-control" name="fee" id="fee" placeholder="FEE" required>
              <label for="cemetery">Fees</label>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </div>
    </div>
  </div>
</form>
