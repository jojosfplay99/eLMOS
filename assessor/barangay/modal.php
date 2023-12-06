<form id="submit_new_barangay">
<div class="modal fade" id="add_new_barangay" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Barangay</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="add_barangay" name="barangay" placeholder="name@example.com" style="text-transform:uppercase">
            <label for="floatingInput">Barangay</label>
        </div>          
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="add_code" name="code" placeholder="name@example.com">
            <label for="floatingInput">Code</label>
        </div>                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
        <button type="submit" class="btn btn-primary" id="assign" data-bs-dismiss="modal">Assign</button>        
      </div>
    </div>
  </div>
</div>  
</form>

<form id="submit_edit_barangay">
<div class="modal fade" id="edit_barangay" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Barangay</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="edit_id" name="id" placeholder="name@example.com" readonly>
            <label for="floatingInput">Description</label>
        </div> 
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="edited_barangay" name="barangay" placeholder="name@example.com">
            <label for="floatingInput">Description</label>
        </div>          
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="edit_code" name="code" placeholder="name@example.com">
            <label for="floatingInput">Code</label>
        </div>                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
        <button type="submit" class="btn btn-primary" id="assign" data-bs-dismiss="modal">Assign</button>        
      </div>
    </div>
  </div>
</div>  
</form>

