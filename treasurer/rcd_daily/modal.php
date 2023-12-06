<form id="daily_submit_form">
  <div class="modal fade" id="daily_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="id" name="id" placeholder="name@example.com" required>
            <label for="floatingInput">ID</label>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Payor" id="payor" name="payor" style="height:80px;" required></textarea>
            <label for="floatingTextarea">Payor</label>
          </div>
          <div class="mb-3">
            <select class="large-select2-options-single-field" id="add_subclass_select" name="naturecol" data-placeholder="Choose Classification" required></select>
          </div>  
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ngascode" name="ngascode" placeholder="name@example.com" required>
            <label for="floatingInput">NGAS Code</label>
          </div>             
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="amount" name="amount" step="0.01" value="0" placeholder="name@example.com" required>
            <label for="floatingInput">Amount</label>
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
