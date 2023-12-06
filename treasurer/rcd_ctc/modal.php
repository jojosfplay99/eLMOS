<form id="ctc_submit_form">
  <div class="modal fade" id="ctc_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">RPT Tax Computation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="id" name="id" readonly>
                <label for="clerkid">Clerk ID</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="ornumber" name="ornumber" placeholder="OR NUMBER" readonly>
                <label for="ornumber">OR Number</label>
              </div>
            </div>					
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="transnum" id="transaction_code" readonly>
                <label for="transnum">Transaction_number</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="fname" id="fname" placeholder="FIRST NAME" required>
                <label for="fname">First Name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="mname" id="mname" placeholder="MIDDLE NAME" required>
                <label for="mname">Middle Name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="lname" id="lname" placeholder="LAST NAME"  required>
                <label for="lname">Last Name</label>
              </div>
            </div>
          </div>	

          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <select class="form-select" id="gender" name="gender" id="gender" aria-label="Floating label select example" required>
                  <option value="" selected disabled>Select Here</option>
                  <option value="MALE">MALE</option>
                  <option value="FEMALE">FEMALE</option>
                </select>
                <label for="gender">Gender</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <select class="form-select" id="civil_status" name="civil_status" id="civil_status" aria-label="Floating label select example" required>
                  <option value="" selected disabled>Select Here</option>
                  <option value="SINGLE">SINGLE</option>
                  <option value="MARRIED">MARRIED</option>
                  <option value="SEPARATED">SEPARATED</option>
                  <option value="WIDOW">WIDOW</option>
                </select>
                <label for="gender">Civil Status</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="date" class="form-control" name="bdate" id="bdate" placeholder="BIRTH DATE" required>
                <label for="bdate">Birth Date</label>
              </div>
            </div>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="address" id="address" placeholder="ADDRESS" required>
            <label for="address">Address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="placeofbirth" id="placeofbirth" placeholder="ADDRESS" required>
            <label for="placeofbirth">Place of Birth</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="citizenship" id="citizenship" placeholder="ADDRESS" required>
            <label for="citizenship">Citizenship</label>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <select class="form-select" id="ctctype" name="ctctype" id="ctctype" aria-label="Floating label select example" required>
                  <option value="" selected disabled>Select Here</option>
                  <option value="REGULAR">REGULAR</option>
                  <option value="BUSINESS">BUSINESS</option>
                  <option value="CORPORATION">CORPORATION</option>
                </select>
                <label for="ctctype">CTC TYPE</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" name="basic" id="basic" step="0.00" placeholder="ADDRESS">
                <label for="basic">Basic</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" name="gross" id="gross" value="0" step="0.00" placeholder="GROSS" required>
                <label for="gross">Gross</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" name="taxdue" id="taxdue" step="0.00" placeholder="TAXDUE" >
                <label for="compute">Taxdue</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              
            </div>
            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" name="penalty" id="penalty" placeholder="PENALTY">
                <label for="grandtotal">Penalty</label>
              </div>
            </div>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" name="total" id="total" placeholder="GRAND TOTAL">
            <label for="grandtotal">Grand Total</label>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Computation</button>
        </div>
      </div>
    </div>
  </div>
</form>
