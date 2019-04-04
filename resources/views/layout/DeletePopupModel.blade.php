<div class="modal fade" id="DeleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Confirm Delete Action</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               Are you sure to delete this Record ?
           </div>
           <div class="modal-footer">
	            <form id="DeleteModelForm" name="DeleteModelForm" method="post" action="admin/delete">
		            @method('DELETE')
	                @csrf()
	                <input type="hidden" name="form_table" id="form_table" value="">
	                <input type="hidden" name="form_field" id="form_field" value="">
	                <input type="hidden" name="form_id" id="form_id" value="">

	               <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
	               <input type="submit" class="btn btn-primary" value="Yes">
	            </form>
           </div>
       </div>
   </div>
</div>