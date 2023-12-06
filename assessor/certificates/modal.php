<form id="cert_form">
  <div class="modal fade" id="add_cert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Certificates</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>      
        <div class="modal-body">                
          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="tracer_id" name="tracer_id" value="<?php echo date('Ymdhis')?>" readonly>
                <label for="floatingInput">TRACER ID</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="date" class="form-control" id="date_created" name="date_created" value="<?php echo date('Y-m-d')?>" readonly>
                <label for="floatingInput">Date Created</label>
              </div>
            </div>
          </div>          
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="title" name="title" placeholder="CERTIFICATE OF ...." required>
            <label for="floatingInput">Title</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="requested_by" name="requested_by" placeholder="Sample Only" required>
            <label for="floatingInput">Requested By:</label>
          </div>
          <div class="form-floating mb-3">
            <textarea id="basic-example" name="html_taxdec" style="height:500px;">
              <br>
              <table class="table table-bordered" style="border:solid 1px;width:100%;font-size:12px;">
                <tr>
                  <th width="20%">TDNO</th>
                  <th width="20%">OWNERNAME</th>
                  <th width="20%">PROPERTYLOCATION</th>
                  <th width="10%">PREVIOUS TAXDEC</th>
                  <th width="10%">AREA</th>
                  <th width="10%">MARKET VALUE</th>
                  <th width="10%">ASSESSED VALUE</th>                
                </tr>
              </table>
              <br>
            </textarea>
            <label for="floatingInput">Body</label>
          </div>
          <div class="form-floating mb-3">
            <select class="js-example-basic-single form-control form-select-lg" id="select_propertyid" name="select_propertyid" required placeholder="Select Property From Taxdec"></select>
          </div>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>