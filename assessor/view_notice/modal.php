<div class="modal fade" id="add_assessment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Notice Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form id="notice_form1">
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="assessment_propertyid" name="assessment_propertyid" placeholder="name@example.com" readonly>
                        <label for="floatingInput">PROPERTY ID</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="assessment_tdno" name="assessment_tdno" placeholder="name@example.com">
                        <label for="floatingInput">TDNO</label>
                    </div> 
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="assessment_lotno" name="assessment_lotno" placeholder="name@example.com">
                        <label for="floatingInput">LOTNO</label>
                    </div> 
                </div>  
                   
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="month" class="form-control" id="assessment_year" name="assessment_year" placeholder="name@example.com" value="<?php echo date('Y-m')?>">
                        <label for="floatingInput">YEAR</label>
                    </div> 
                </div>            
            </div>                        
            <br>            
            <hr>
            <br>            
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="assessment_ownername" name="assessment_ownername" style="height:100px;"></textarea>
                <label for="floatingTextarea">OWNERNAME</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="assessment_propertylocation" name="assessment_propertylocation" style="height:100px;"></textarea>
                <label for="floatingTextarea">PROPERTY LOCATION</label>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="assessment_marketvalue" name="assessment_marketvalue" placeholder="name@example.com" step="0.01">
                        <label for="floatingInput">MARKET VALUE</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="assessment_assessedvalue" name="assessment_assessedvalue" placeholder="name@example.com" step="0.01">
                        <label for="floatingInput">ASSESSED VALUE</label>
                    </div> 
                </div>                     
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="assessment_classification" name="assessment_classification" placeholder="name@example.com" step="0.01">
                        <label for="floatingInput">CLASSIFICATION</label>
                    </div> 
                </div>                     
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="assessment_percentage" name="assessment_percentage" placeholder="name@example.com" value="20">
                        <label for="floatingInput">PERCENTAGE</label>
                    </div> 
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="assessment_basic" name="assessment_basic" placeholder="name@example.com" step="0.01">
                        <label for="floatingInput">BASIC</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="assessment_sef" name="assessment_sef" placeholder="name@example.com" step="0.01">
                        <label for="floatingInput">SEF</label>
                    </div> 
                </div> 
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="assessment_total" name="assessment_total" placeholder="name@example.com" step="0.01">
                        <label for="floatingInput">TOTAL</label>
                    </div> 
                </div>                                                          
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
    </div>
  </div>
</div>