<div class="modal fade" id="or_create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Generate New O.R.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="or_form">
        <input type="hidden" id="clerkid" name="clerkid">
        <div class="form-floating mb-3">
          <select class="form-select" id="formtype" name="formtype" aria-label="Floating label select example" required>
            <option value="" disabled selected>Form Type Options</option>
            <option value="FORM51">Form 51</option>
            <option value="FORM56">Form 56</option>
            <option value="FORM58">Form 58</option>
            <option value="CTC1">CTC Individual</option>
            <option value="CTC2">CTC Corporation</option>
          </select>
          <label for="floatingSelect">Select Form Type</label>
        </div>
          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="starting_or" name="starting_or" value="0" placeholder="name@example.com">
                <label for="floatingInput">Starting OR</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="padding_or" name="padding_or" value="8" placeholder="name@example.com">
                <label for="floatingInput">Padding</label>
              </div>
            </div>
          </div>          
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="amount_or" name="amount_or" value="1" placeholder="name@example.com">
            <label for="floatingInput">OR Quantity</label>
          </div>          
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="ending_or" name="ending_or" placeholder="name@example.com" readonly>
            <label for="floatingInput">Ending OR</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="batch_or" name="batch_or" value="0" placeholder="name@example.com" required>
            <label for="floatingInput">Batch</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="$('#or_form').submit()">Generate Changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="or_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-stripped" id="or_list" style="font-size:12px;width:100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FORM</th>
                    <th>OR NUMBER</th>
                    <th>BATCH CODE</th>
                    <th>DATE</th>
                    <th>STATUS</th>
                    <th>CLERKID</th>
                    <th width="10%">ACTION</th>
                </tr>
            </thead>              
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>