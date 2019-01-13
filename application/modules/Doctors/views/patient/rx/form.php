<form method="post">
        <div class="col-md-5 col-sm-4 col-xs-6">
        <div class='form-group'>
            <label>Rx</label>
                <select required class='form-control select2' style='width:100%;' data-select='Products OR Services' name='products' id='name' >
            </select>
        </div>
        </div>
        <div class="col-md-2  col-sm-2 col-xs-4">
            <div class="form-group">
              <label for="qty">Qty</label>
              <input required type="number" class="form-control" name="qty" id="qty" aria-describedby="helpId" placeholder="">
              
            </div>
        </div>
        <div class="col-md-2  col-sm-2 col-xs-4">
            <div class="form-group">
              <label for="qty">Prd</label>
              <input required type="number" class="form-control" name="prd" id="qty" aria-describedby="helpId" placeholder="">
              
            </div>
        </div>
        <div class="col-md-2  col-sm-2 col-xs-4">
            <div class="form-group">
              <label for="qty">Rate</label>
              <input required type="text" class="form-control" name="rate" id="qty" aria-describedby="helpId" placeholder="1x2">
              
            </div>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
            <div class="form-group">
              <label for="qty">&nbsp</label>
              <button required type="submit" class="form-control btn-success"><i class="fa fa-plus"></i></button>
              
            </div>
        </div>
    </form>
    