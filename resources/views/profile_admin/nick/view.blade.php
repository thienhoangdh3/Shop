
<div class="modal fade" id="view" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="id_nick"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-3 text-md-right font-weight-bold" >ID : </label>
                    <span class="col-md-8" id="id"></span>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 text-md-right font-weight-bold" >Ingame : </label>
                    <span class="col-md-8" id="ingame"></span>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 text-md-right font-weight-bold" >Level : </label>
                    <span class="col-md-8" id="level"></span>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 text-md-right font-weight-bold" >Class : </label>
                    <span class="col-md-8" id="class_nick"></span>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 text-md-right font-weight-bold" >Server : </label>
                    <span class="col-md-8" id="sv_nick"></span>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 text-md-right font-weight-bold" >TTGT : </label>
                    <span class="col-md-8" id="ttgt"></span>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 text-md-right font-weight-bold" >Giá : </label>
                    <span class="col-md-8" id="price"></span>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 text-md-right font-weight-bold" >Username : </label>
                    <span class="col-md-8" id="username"></span>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 text-md-right font-weight-bold" >Password : </label>
                    <span class="col-md-8" id="password"></span>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 text-md-right font-weight-bold" >Ghi chú : </label>
                    <span class="col-md-8" id="notes"></span>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 text-md-right font-weight-bold" >Ảnh : </label>
                  <span class="col-md-8" id="images">
                    {{-- <img src="../../storage/nick/67680.jpg" alt="bvnbvn"> --}}
                  </span>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                @if (isset($data))
                  <a href="{{ route('nick.edit', $data->id) }}" class="btn btn-primary">Sửa</a>
                @endif
                
              </div>
            </div>
          </div>
        </div>
</div>
