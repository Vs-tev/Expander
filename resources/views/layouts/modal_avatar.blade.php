<form action="/index/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
 {{ csrf_field() }}
    <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        
        
        <!-- Modal body -->
        <div class="modal-body">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" class="form-control-file">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Save</button>
        </div>
        
      </div>
    </div>
  </div>
</form>