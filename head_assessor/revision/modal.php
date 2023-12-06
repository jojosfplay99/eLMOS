<!-- Modal -->

<div class="modal fade" id="filter_barangay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Assign Tax Declaration</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <code>Prefix</code>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="prefix" name="prefix" placeholder="name@example.com" readonly>
            <label for="floatingInput">Prefix</label>
        </div>

        <button type="button" class="btn btn-primary btn-sm" id="unlock">Edit</button>
        <button type="button" class="btn btn-primary btn-sm" id="update_change" disabled>Update / Change</button>
        <hr>
        <code>Barangay</code><br>
        <div class="form-floating mb-1">
          <input type="text" class="form-control" id="barangay_name" name="barangay_name" placeholder="name@example.com" style="text-transform: uppercase;" readonly>
          <label for="floatingInput">Barangay</label>
        </div>
        <br>
        <form id="revise_submit">
          <div class="row">
              <div class="col">
                  <div class="form-floating mb-1">
                      <input type="text" class="form-control" id="barangay_code" name="barangay_code" placeholder="name@example.com" readonly>
                      <label for="floatingInput">Barangay Code</label>
                  </div>
              </div>
              <div class="col">
                  <div class="form-floating mb-1">
                      <input type="number" class="form-control" id="start_taxdec" name="start_taxdec" placeholder="name@example.com" required>
                      <label for="floatingInput">Start Taxdec No</label>
                  </div>
              </div>
              <div class="col">
                  <div class="form-floating mb-1">
                      <input type="text" class="form-control" id="latest_tdno" name="latest_tdno" placeholder="name@example.com" readonly>
                      <label for="floatingInput">Latest TDNO</label>
                  </div>
              </div>            
          </div> 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="update_tdno" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-success">
        <strong class="me-auto text-white">TDNO Prefix</strong>        
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      TDNO Prefix updated successfully!
    </div>
  </div>
</div>

