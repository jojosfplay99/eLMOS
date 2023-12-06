<form id="new_fuse">
<!-----------------------------ADD---------------------------->
<div class="modal fade" id="fuse_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Fuse Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-------------------------------------------------------------------->                    
        
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" style="font-weight: bolder;" id="id" placeholder="tdno" readonly>
                    <label for="floatingInput">PROPERTY ID</label>
                </div> 
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" style="font-weight: bolder;" id="tdno" placeholder="tdno" readonly>
                    <label for="floatingInput">TDNO NO</label>
                </div> 
            </div>            
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <textarea type="textarea" class="form-control" style="font-weight: bolder;" id="ownername" placeholder="tdno" readonly rows="50"></textarea>
                    <label for="floatingInput">OWNERNAME</label>
                </div> 
            </div>                       
        </div>
        <br>
        <hr>
        <br>
        <h3 class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">SELECT MULTIPLE TAXDEC TO FUSE</h3>         
        <table id="example2" class="table table-hover table-bordered table-stripped table-responsive display nowrap" style="font-size:12px;width:1vh;border:.5px solid;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th width="10%">TDNO</th>	
                    <th width="10%">PIN</th>		                                  
                    <th width="10%">OWNERNAME</th>
                    <th width="10%">LOT NO</th>	                   
                    <th width="10%">PROPERTY LOCATION</th>
                    <th width="10%">BARANGAY</th>	               	             	                    	                              
                    <th width="10%">PROPERTY KIND</th> 
                    <th width="5%">STATUS</th> 
                    <th width="5%">TRANSACTION CODE</th>         													                    
                </tr>
            </thead>  
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th width="10%">TDNO</th>	
                    <th width="10%">PIN</th>		                                  
                    <th width="10%">OWNERNAME</th>
                    <th width="10%">LOT NO</th>	                   
                    <th width="10%">PROPERTY LOCATION</th>
                    <th width="10%">BARANGAY</th>	               	             	                    	                              
                    <th width="10%">PROPERTY KIND</th> 
                    <th width="5%">STATUS</th> 
                    <th width="5%">TRANSACTION CODE</th>           													                     
                </tr>
            </tfoot>                                            
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
        <button type="submit" class="btn btn-primary" id="assign" data-bs-dismiss="modal">Assign</button>        
      </div>
    </div>
  </div>
</div>  
</form>




