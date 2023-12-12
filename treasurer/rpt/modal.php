<form id="rpt_submit_form">
  <div class="modal fade" id="rpt_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">RPT Tax Computation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="clerkid3" name="clerkid" placeholder="name@example.com" hidden>          
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <select class="large-select2-options-single-field" id="add_subclass_select" name="propertyid" data-placeholder="Choose Property" required></select>
              </div>
            </div>            
          </div>
          <div class="row"> 
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="transaction_code1" name="transaction_code" placeholder="name@example.com">
                <label for="floatingInput">Transaction Code</label>
              </div>
            </div>            
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="ornum1" name="ornum" placeholder="name@example.com">
                <label for="floatingInput">OR Number</label>
              </div>
            </div>           
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="tdno" name="tdno" placeholder="name@example.com">
                <label for="floatingInput">Taxdec No.</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="assessedvalue" name="assessedvalue" placeholder="name@example.com">
                <label for="floatingInput">Assessed Value</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="month" class="form-control" id="taxyear" name="taxyear" value="<?php echo date('Y-m')?>" placeholder="name@example.com">
                <label for="floatingInput">Tax Year</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="tax_per" name="tax_per" value="2" placeholder="name@example.com">
                <label for="floatingInput">Tax Percentage</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="month" class="form-control" id="date_start" name="date_start" value="<?php echo date('Y')."-01"?>" placeholder="name@example.com">
                <label for="floatingInput">Date Start</label>
              </div>
            </div>
          </div>

          <div class="row">            
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="taxdue" name="taxdue" placeholder="name@example.com">
                <label for="floatingInput">Tax Due</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="discount" name="discount" step="0.01" placeholder="name@example.com">
                <label for="floatingInput">Discount</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="penalty" name="penalty" step="0.01" placeholder="name@example.com">
                <label for="floatingInput">Penalty</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="total_taxdue" name="total_taxdue" placeholder="name@example.com">
                <label for="floatingInput">Total Tax Due</label>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col">
              <div class="form-floating">
                <select class="form-select" id="payment_mode" name="payment_mode" aria-label="Floating label select example" required>
                  <option value="ANNUAL" selected>ANNUAL</option>
                  <option value="SEMI ANNUAL">SEMI ANNUAL</option>
                  <option value="QUARTERLY">QUARTERLY</option>
                </select>
                <label for="floatingSelect">Works with selects</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="grand_total_taxdue" name="grand_total_taxdue" placeholder="name@example.com">
                <label for="floatingInput">Grand Total Tax Due</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="basic" name="basic" step="0.01" placeholder="name@example.com">
                <label for="floatingInput">Basic </label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="sef" name="sef" step="0.01" placeholder="name@example.com">
                <label for="floatingInput">SEF</label>
              </div>
            </div>            
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


<form id="rpt_payment_form">
  <div class="modal fade" id="rpt_payment_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">RPT Tax Computation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="clerkid1" name="clerkid" placeholder="name@example.com" readonly hidden>
          <input type="text" class="form-control" id="compute_code1" name="compute_code" placeholder="name@example.com" readonly hidden>
          <input type="text" class="form-control" id="id1" name="id" placeholder="name@example.com" readonly>
          <div class="row">
            <div class="col-4">
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="tags" name="tags" placeholder="name@example.com">
                  <label for="floatingInput">Payment For</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">          
            <div class="col">
              <div class="form-floating mb-3">                
                <input type="text" class="form-control" id="clerkid2" name="clerkid" placeholder="name@example.com" readonly>
                <label for="floatingInput">CLERKID ID</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="or_id1" name="or_id" value="<?php echo $or_id;?>" placeholder="name@example.com" readonly>
                <label for="floatingInput">OR ID</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="propertyid1" name="propertyid" placeholder="name@example.com" readonly>
                <label for="floatingInput">PROPERTY ID</label>
              </div>
            </div>           
          </div>
          <div class="row"> 
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="transaction_code1" name="transaction_code" value="<?php echo $transaction_code;?>" placeholder="name@example.com" readonly>
                <label for="floatingInput">Transaction Code</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="ornumber1" name="ornum" placeholder="name@example.com" readonly>
                <label for="floatingInput">OR Number</label>
              </div>
            </div>           
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="tdno1" name="tdno" placeholder="name@example.com" readonly>
                <label for="floatingInput">Taxdec No.</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="assessedvalue1" name="assessedvalue" placeholder="name@example.com" readonly>
                <label for="floatingInput">Assessed Value</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="taxyear1" name="taxyear" placeholder="name@example.com" readonly>
                <label for="floatingInput">Tax Year</label>
              </div>
            </div>           
            <div class="col">
              <div class="form-floating mb-3">
                <input type="year" class="form-control" id="due_date" name="due_date" placeholder="name@example.com" readonly>
                <label for="floatingInput">Due Date</label>
              </div>
            </div>
          </div>
          <br>
          <hr>
          <br>
          <div class="row">            
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="taxdue1" name="taxdue" placeholder="name@example.com">
                <label for="floatingInput">Tax Due</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="discount1" name="discount" step="0.01" placeholder="name@example.com">
                <label for="floatingInput">Discount</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="penalty1" name="penalty" step="0.01" placeholder="name@example.com">
                <label for="floatingInput">Penalty</label>
              </div>
            </div>            
          </div>
          <div class="row mb-3">
            <div class="col-4">
              <div class="form-floating">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="payment_mode1" name="payment_mode" placeholder="name@example.com" readonly>
                  <label for="floatingInput">PAYMENT MODE</label>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">            
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="total_taxdue1" name="total_taxdue" placeholder="name@example.com">
                <label for="floatingInput">Total Tax Due</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="basic1" name="basic" step="0.01" placeholder="name@example.com">
                <label for="floatingInput">Basic </label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="sef1" name="sef" step="0.01" placeholder="name@example.com">
                <label for="floatingInput">SEF</label>
              </div>
            </div>    
            
          </div>          
          <br>
          
          <br>
          <hr>
          <br>
          <div class="row"> 
            <div class="col">
              <code style="font-family:'Times New Roman', Times, serif;">ADDITIONAL PENALTIES FOR LATE PAYMENT</code>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="additional_penalties" name="additional_penalties" placeholder="name@example.com">
                <label for="floatingInput">Additional Penalties</label>
              </div>
            </div>
            <div class="col">
              <code style="font-family:'Times New Roman', Times, serif;">&nbsp;</code>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="grand_total_taxdue1" name="grand_total_taxdue" placeholder="name@example.com">
                <label for="floatingInput">Grand Total</label>
              </div>
            </div>           
            <div class="col">
              
            </div>                      
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Payment</button>
        </div>
      </div>
    </div>
  </div>
</form>