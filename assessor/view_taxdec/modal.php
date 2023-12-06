<form id="add_classification_form" class="was-validated">
<div class="modal fade" id="add_classification_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Classifications</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">        
            <div class="row mb-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="propertyid_classification" name="propertyid" placeholder="propertyid" readonly>
                        <label for="floatingInput">Property ID</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="clerkid_class" name="clerkid" placeholder="clerkid_class" readonly>
                        <label for="floatingInput">Clerk ID</label>
                    </div>
                </div> 
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="tdno_classification" name="tdno_classification" placeholder="propertyid" readonly>
                        <label for="floatingInput">TDNO</label>
                    </div>
                </div>               
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="area" name="area" placeholder="area" step="0.0001" value="0" required>
                        <label for="floatingInput">Area</label>
                    </div>                                       
                </div>
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" id="area_mode" name="area_mode" aria-label="Floating label select example">                            
                            <option value="SQM" selected>SQM</option>
                            <option value="HECTARES">HECTARES</option>
                        </select>
                        <label for="floatingSelect">Area Mode</label>
                    </div>                    
                </div> 
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="per_sqm" name="per_sqm" placeholder="area" step="0.01" value="0" readonly>
                        <label for="floatingInput">Area/SQM</label>
                    </div>
                </div>                               
            </div>            
            <div class="row mb-2">
                <div class="col">
                    <select class="large-select2-options-single-field" id="select_classification" name="classification" data-placeholder="Choose Classification" required></select>
                    <input type="hidden" id="classification_name" name="classification_name">
                </div>
                <div class="col">
                    <select class="large-select2-options-single-field" id="select_sub_classification" name="sub_classification" data-placeholder="Choose Sub Classification" required disabled></select>
                </div>
                <div class="col">
                    <select class="large-select2-options-single-field" id="select_actualuse" name="actual_use" data-placeholder="Choose Actual Use" required disabled></select>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="unit_value" name="unit_value" placeholder="unit_value" step="0.01" readonly>
                        <label for="floatingInput">Unit Value</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="basic_value" name="basic_value" placeholder="basic_value" step="0.01" required>
                        <label for="floatingInput">Base Market Value</label>
                    </div>
                </div>                                
            </div>
            <hr class="mb-5">
            <h5 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">FOR BUILDING****</h5>
            <div class="row mb-2">
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floor_item" name="floor_item" placeholder="floor_item">
                        <label for="floatingInput">Floor / Item</label>
                    </div>
                </div>                                                
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="depreciated_level" name="depreciated_level" placeholder="depreciated_level" value="0" required>
                        <label for="floatingInput">Depreciated Level</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="depreciated_value" name="depreciated_value" placeholder="depreciated_value" step="0.01" required>
                        <label for="floatingInput">Depreciated Value</label>
                    </div>
                </div>                                
            </div>
            <hr class="mb-5">
            <div class="row mb-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="adjustment_factor" name="adjustment_factor" placeholder="adjustment_factor" required>
                        <label for="floatingInput">Adjustment Factor</label>
                    </div>
                </div>
            </div>
                    
            <div class="row mb-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="adjustment_level" name="adjustment_level" placeholder="adjustment_level" step="0.01" value="100" required>
                        <label for="floatingInput">Adjustment Level</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="marketvalue" name="marketvalue" placeholder="marketvalue" step="0.01" rrequired>
                        <label for="floatingInput">Market Value</label>
                    </div>
                </div>                
            </div>
            <div class="row mb-2">                
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="assessment_level" name="assessment_level" placeholder="assessment_level" step="0.01" required>
                        <label for="floatingInput">Assessment Level</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="assessed_value" name="assessed_value" placeholder="assessed_value" step="0.01" required>
                        <label for="floatingInput">Assessment Value</label>
                    </div>
                </div>
            </div>
            <code>MARKET VALUE AND ASSESSED VALUES WILL BE ROUNDED UP UPON SUBMISSION.</code>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
</form>

<form id="edit_classification_form" class="was-validated">
<div class="modal fade" id="edit_classification_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Classifications</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">        
      <div class="row mb-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="id2" name="id" placeholder="propertyid" readonly>                        
                        <label for="floatingInput">ID</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="clerkid_class2" name="clerkid" placeholder="clerkid_class" readonly>
                        <label for="floatingInput">Clerk ID</label>
                    </div>
                </div> 
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="tdno_classification2" name="tdno_classification" placeholder="propertyid" readonly>
                        <label for="floatingInput">TDNO</label>
                    </div>
                </div>               
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="area2" name="area" placeholder="area" step="0.0001" value="0" required>
                        <label for="floatingInput">Area</label>
                    </div>                                       
                </div>
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" id="area_mode2" name="area_mode" aria-label="Floating label select example">                            
                            <option value="SQM" selected>SQM</option>
                            <option value="HECTARES">HECTARES</option>
                        </select>
                        <label for="floatingSelect">Area Mode</label>
                    </div>                    
                </div> 
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="per_sqm2" name="per_sqm" placeholder="area" step="0.01" value="0">
                        <label for="floatingInput">Area/SQM</label>
                    </div>
                </div>                               
            </div>                    
            <hr>
            <div class="row mb-2">
                <div class="col">
                    
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="basic_value2" name="basic_value" placeholder="basic_value" step="0.01" required>
                        <label for="floatingInput">Base Market Value</label>
                    </div>
                </div>                                
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="depreciated_level2" name="depreciated_level" placeholder="depreciated_level" value="0" required>
                        <label for="floatingInput">Depreciated Level</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="depreciated_value2" name="depreciated_value" placeholder="depreciated_value" step="0.01" required>
                        <label for="floatingInput">Depreciated Value</label>
                    </div>
                </div>                                
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="adjustment_level2" name="adjustment_level" placeholder="adjustment_level" step="0.01" value="100" required>
                        <label for="floatingInput">Adjustment Level</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="marketvalue2" name="marketvalue" placeholder="marketvalue" step="0.01" rrequired>
                        <label for="floatingInput">Market Value</label>
                    </div>
                </div>                
            </div>
            <div class="row mb-2">                
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="assessment_level2" name="assessment_level" placeholder="assessment_level" step="0.01" required>
                        <label for="floatingInput">Assessment Level</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="assessed_value2" name="assessed_value" placeholder="assessed_value" step="0.01" required>
                        <label for="floatingInput">Assessment Value</label>
                    </div>
                </div>
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


<form id="roof_selection">
    <div class="modal fade" id="roof_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Roof Selection</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">            
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="id" placeholder="name@example.com" value="<?php echo $id;?>" readonly>
                    <label for="floatingInput">ID</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="js-example-basic-single form-control form-select-lg" id="select_roof" name="select_roof" required placeholder="Select Property From Taxdec"></select>
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </div>
        </div>
    </div>
</form>          

<form id="add_roof">
    <div class="modal fade" id="new_roof_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">New Roof Selection</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="new_roof" placeholder="name@example.com">
                        <label for="floatingInput">New Material</label>
                    </div>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!------->

<div class="modal fade" id="floor_finish_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Floor Finish Selection</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="floor_selection">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="id" placeholder="name@example.com" value="<?php echo $id;?>" readonly>
                    <label for="floatingInput">ID</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="js-example-basic-single form-control form-select-lg" id="select_floor_finish" name="select_floor_finish" required placeholder="Select Property From Taxdec"></select>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="1f" value="1f">
                                <span>
                                    1F
                                </span>
                            </label>                    
                        </div>
                    </div>
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="2f" value="2f">
                                <span>
                                    2F
                                </span>
                            </label>                    
                        </div>
                    </div>
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="3f"  value="3f">
                                <span>
                                    3F
                                </span>
                            </label>                    
                        </div>
                    </div>
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="4f" value="4f">
                                <span>
                                    4F
                                </span>
                            </label>                    
                        </div>
                    </div>
                </div>
            </form>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="$('#floor_selection').submit();">Add</button>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="new_floor_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">New Roof Selection</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="add_floor">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="new_floor" placeholder="name@example.com">
                    <label for="floatingInput">New Material</label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="$('#add_floor').submit();">Add</button>
        </div>
        </div>
    </div>
</div>

<!------->

<div class="modal fade" id="walling_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Walling Selection</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="walling_selection">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="id" placeholder="name@example.com" value="<?php echo $id;?>" readonly>
                    <label for="floatingInput">ID</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="js-example-basic-single form-control form-select-lg" id="select_walling" name="select_walling" required placeholder="Select Property From Taxdec"></select>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="1f" value="1f">
                                <span>
                                    1F
                                </span>
                            </label>                    
                        </div>
                    </div>
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="2f" value="2f">
                                <span>
                                    2F
                                </span>
                            </label>                    
                        </div>
                    </div>
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="3f"  value="3f">
                                <span>
                                    3F
                                </span>
                            </label>                    
                        </div>
                    </div>
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="4f" value="4f">
                                <span>
                                    4F
                                </span>
                            </label>                    
                        </div>
                    </div>
                </div>                                
            </form>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="$('#walling_selection').submit();">Add</button>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="new_walling_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">New Walling Selection</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="add_walling">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="new_walling" placeholder="name@example.com">
                    <label for="floatingInput">New Material</label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="$('#add_walling').submit();">Add</button>
        </div>
        </div>
    </div>
</div>

<!---->

<div class="modal fade" id="foundation_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Foundation Selection</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="foundation_selection">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="id" placeholder="name@example.com" value="<?php echo $id;?>" readonly>
                    <label for="floatingInput">ID</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="js-example-basic-single form-control form-select-lg" id="select_foundation" name="select_foundation" required placeholder="Select Property From Taxdec"></select>
                </div>
            </form>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="$('#foundation_selection').submit();">Add</button>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="new_foundation_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">New Foundation Selection</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="add_foundation">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="new_foundation" placeholder="name@example.com">
                    <label for="floatingInput">New Material</label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="$('#add_foundation').submit();">Add</button>
        </div>
        </div>
    </div>
</div>

<!------->


<div class="modal fade" id="additional_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Additional Selection</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="additional_selection">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="id" placeholder="name@example.com" value="<?php echo $id;?>" readonly>
                    <label for="floatingInput">ID</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="js-example-basic-single form-control form-select-lg" id="select_additional" name="select_additional" required placeholder="Select Property From Taxdec"></select>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="1f" value="1f">
                                <span>
                                    1F
                                </span>
                            </label>                    
                        </div>
                    </div>
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="2f" value="2f">
                                <span>
                                    2F
                                </span>
                            </label>                    
                        </div>
                    </div>
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="3f"  value="3f">
                                <span>
                                    3F
                                </span>
                            </label>                    
                        </div>
                    </div>
                    <div class="col">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input flex-shrink-0" type="checkbox" name="4f" value="4f">
                                <span>
                                    4F
                                </span>
                            </label>                    
                        </div>
                    </div>
                </div>
            </form>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="$('#additional_selection').submit();">Add</button>
        </div>
        </div>
    </div>
</div>

<form id="add_additional_form">
    <div class="modal fade" id="new_additional_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">New Additional Selection</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_additional">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="new_additional" placeholder="name@example.com">
                        <label for="floatingInput">New Material</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </div>
        </div>
    </div>
</form>
<!------->
<form id="submit_property_appraisal">
    <div class="modal fade" id="property_appraisal_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Additional Property Appraisal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                    
                    <div class="row mb-3">                        
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="propertyid_machine" name="propertyid"  placeholder="name@example.com" readonly>
                                <label for="floatingInput">PROPERTY ID</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="date_created_appraisal" name="date_created" value="<?php echo date('Y-m-d');?>" placeholder="name@example.com">
                                <label for="floatingInput">Date Created</label>
                            </div>
                        </div>                    
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="kind_of_machine" name="kind_of_machine"></textarea>
                        <label for="floatingTextarea">Kind of Machinery</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="brand" name="brand" placeholder="name@example.com">
                                <label for="floatingInput">Brand</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="model" name="model" placeholder="name@example.com">
                                <label for="floatingInput">Model</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="capacity" name="capacity" placeholder="name@example.com">
                                <label for="floatingInput">Capacity / HP</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="date_acquired" name="date_acquired" placeholder="name@example.com">
                                <label for="floatingInput">Date Acquired</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="condition_acquired" name="condition_acquired" placeholder="name@example.com">
                                <label for="floatingInput">Condition Acquired</label>
                            </div>
                        </div>                    
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="estimated_life" name="estimated_life" placeholder="name@example.com">
                                <label for="floatingInput">Economic Life (Estimated)</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="remaining_life" name="remaining_life" placeholder="name@example.com">
                                <label for="floatingInput">Economic Life (Remaining)</label>
                            </div>
                        </div>                    
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="year_installed" name="year_installed" placeholder="name@example.com">
                                <label for="floatingInput">Year Installed</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="year_initial_operation" name="year_initial_operation" placeholder="name@example.com">
                                <label for="floatingInput">Year of Initial Operation</label>
                            </div>
                        </div>                    
                    </div>
                    <hr class="horizontal-divider">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating">
                                <input type="float" class="form-control" id="original_cost" name="original_cost" value="0" placeholder="name@example.com">
                                <label for="floatingInput">Original Cost</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="conversion_factor" name="conversion_factor" placeholder="name@example.com">
                                <label for="floatingInput">Conversion Factor</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="no_of_units" name="no_of_units" value="1" placeholder="name@example.com">
                                <label for="floatingInput">NO. OF UNITS</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="rcn" name="rcn" placeholder="name@example.com">
                                <label for="floatingInput">RCN</label>
                            </div>
                        </div>                    
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="rate_of_depreciation" name="rate_of_depreciation" step="0.01" placeholder="name@example.com">
                                <label for="floatingInput">RATE OF DEPRECIATION</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="percentage_depreciation" name="percentage_depreciation" value="0" placeholder="name@example.com">
                                <label for="floatingInput">DEPRECIATION PERCENTAGE</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="number" step="0.01" class="form-control" id="value_depreciation" name="value_depreciation" placeholder="name@example.com">
                                <label for="floatingInput">DEPRECIATION VALUE</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="total_value_depreciation" name="total_value_depreciation" step="0.01" placeholder="name@example.com">
                                <label for="floatingInput">DEPRECIATED VALUE</label>
                            </div>
                        </div>                    
                    </div>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="submit_coowner">
    <div class="modal fade" id="coowner_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Additional Property Appraisal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="id_add" name="id_add" placeholder="id_add" readonly>
                                <label for="floatingInput">ID</label>
                            </div>                   
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="propertyid_add" name="propertyid_add" placeholder="propertyid_add" readonly>
                                <label for="floatingInput">PROPERTY ID</label>
                            </div>                   
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-9">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="ownername_add" name="ownername" style="height:150px;"></textarea>
                                <label for="floatingTextarea">Owner Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ownertin_add" name="ownertin" placeholder="ownertin">
                                    <label for="floatingInput">TIN</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="ownertel_add" name="ownertel" placeholder="ownertel">
                                    <label for="floatingInput">Tel</label>
                                </div>
                            </div>                                
                        </div>                            
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="owneraddress_add" name="owneraddress" placeholder="owneraddress">
                        <label for="floatingInput">Owner Address</label>
                    </div>          
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="submit_new_coowner">
    <div class="modal fade" id="new_coowner_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Additional Property Appraisal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <div class="row mb-2">                        
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="propertyid_new" name="propertyid_new" placeholder="propertyid_add" readonly>
                                <label for="floatingInput">PROPERTY ID</label>
                            </div>                   
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-9">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="ownername_new" name="ownername" style="height:150px;"></textarea>
                                <label for="floatingTextarea">Owner Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ownertin_new" name="ownertin" placeholder="ownertin">
                                    <label for="floatingInput">TIN</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="ownertel_new" name="ownertel" placeholder="ownertel">
                                    <label for="floatingInput">Tel</label>
                                </div>
                            </div>                                
                        </div>                            
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="owneraddress_new" name="owneraddress" placeholder="owneraddress">
                        <label for="floatingInput">Owner Address</label>
                    </div>          
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Add</button>
                </div>
            </div>
        </div>
    </div>
</form>