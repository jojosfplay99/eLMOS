<form id="submit_new_actual">
<div class="modal fade" id="add_new_actual" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Actual Use</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
        <div class="mb-3">
          <select class="large-select2-options-single-field" id="add_actual_select" name="classification" data-placeholder="Choose Classification" required></select>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="add_subclass_code" name="code" placeholder="name@example.com">
            <label for="floatingInput">Code</label>
        </div>       
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="add_subclass_description" name="description" placeholder="name@example.com">
            <label for="floatingInput">Description</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="add_subclass_value" name="value" placeholder="name@example.com">
            <label for="floatingInput">Value</label>
        </div>
        <div class="form-floating">
            <select class="form-select" id="add_subclass_status" name="status" aria-label="Floating label select example">                
                <option value="ACTIVE">ACTIVE</option>
                <option value="INACTIVE2">INACTIVE</option>
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


<form id="submit_edit_actual">
<div class="modal fade" id="add_edit_actual" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Actual Use</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="edit_actual_id" name="id" placeholder="name@example.com">
            <label for="floatingInput">ID</label>
        </div>  
        <div class="mb-3">
          <select class="large-select2-options-single-field" id="edit_actual_select" name="classification" data-placeholder="Choose Classification" required></select>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="edit_actual_code" name="code" placeholder="name@example.com">
            <label for="floatingInput">Code</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="edit_actual_description" name="description" placeholder="name@example.com">
            <label for="floatingInput">Description</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="edit_actual_value" name="value" placeholder="name@example.com">
            <label for="floatingInput">Value</label>
        </div>
        <div class="form-floating">
            <select class="form-select" id="edit_actual_status" name="status" aria-label="Floating label select example">                
                <option value="ACTIVE">ACTIVE</option>
                <option value="INACTIVE2">INACTIVE</option>
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

<form id="submit_set_class2">
  <div class="modal fade" id="set_class2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Set General Class Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <select class="large-select2-options-single-field" id="set_classification2" name="classname" data-placeholder="Choose Classification" >
                <option></option>                
            </select>
          </div>        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Set Class Code</button>        
        </div>
      </div>
    </div>
  </div>  
</form>
