<form method="POST" action="/project_deteils/{{$project->id}}">
    {{ csrf_field() }}
    <div class="modal" id="apply_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
        
            <div class="modal-header">
              <h4 class="modal-title">Apply</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body mx-4">
                  <div class="form-group">
                      <label for="message">Message</label>
                      <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="file">Attach file <small class="text-muted">(Optional)</small></label>
                    <input type="file" class="form-control-file " name="file">
                    <p class="text-muted p-0 m-0">(dox, pdf, txt, jpg, png, img)</p>
                  </div>
            </div>
            
            <div class="modal-footer mx-4">
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
            
          </div>
        </div>
      </div>
</form>