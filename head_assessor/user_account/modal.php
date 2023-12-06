<form id="submit_edit">
<div class="modal fade" id="edit_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
        <div class="form-floating mb-3">
          <input type="text" class="form-control" placeholder="ID" id="edit_id" name="id" readonly>
          <label for="floatingSelect">ID</label>
        </div>                
        <div class="form-floating">
            <select class="form-select" id="edit_status" name="status" aria-label="Floating label select example">                
                <option value="ACTIVE">ACTIVE</option>
                <option value="PENDING">PENDING</option>
            </select>
            <label for="floatingSelect">Works with selects</label>
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
