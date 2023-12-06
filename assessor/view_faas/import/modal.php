<div class="modal fade" id="roof_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Roof Selection</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="roof_selection">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="id" placeholder="name@example.com" value="<?php echo $id;?>" readonly>
                    <label for="floatingInput">ID</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="js-example-basic-single form-control form-select-lg" id="select_roof" name="select_roof" required placeholder="Select Property From Taxdec"></select>
                </div>
            </form>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="$('#roof_selection').submit();">Add</button>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="new_roof_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">New Roof Selection</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="add_roof">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="new_roof" placeholder="name@example.com">
                    <label for="floatingInput">New Material</label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="$('#add_roof').submit();">Add</button>
        </div>
        </div>
    </div>
</div>

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

<div class="modal fade" id="new_additional_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">New Foundation Selection</h1>
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
            <button type="button" class="btn btn-primary" onclick="$('#add_additional').submit();">Add</button>
        </div>
        </div>
    </div>
</div>

<!------->

<div class="modal fade" id="property_appraisal_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Additional Property Appraisal</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="submit_property_appraisal">
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="faasid" name="faasid" value="<?php echo $id?>" placeholder="name@example.com">
                            <label for="floatingInput">FAAS ID</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="propertyid_machine" name="propertyid"  placeholder="name@example.com">
                            <label for="floatingInput">PROPERTY ID</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="date_created_appraisal" name="date_created" value="<?php echo $date_today;?>" placeholder="name@example.com">
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

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="$('#submit_property_appraisal').submit();">Add</button>
        </div>
        </div>
    </div>
</div>

<!------->