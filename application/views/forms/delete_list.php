<!-- Modal -->
<div id="delete-list-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">      
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Delete this list</h2>
            </div>
            <div class="modal-body">
                <form action="<?php  echo base_url() . 'index.php/pcdb/delete_list/' . $this->uri->segment(3); ?>" enctype="multipart/form-data" method="post">
                     <div class="form-group">
                        <p id="confirm-message">Are you sure you want to delete this list?</p>
                    </div>
                    <div class="form-group" id="submit-container">             
                        <input type="submit" value="Yes" name="delete-yes" id="delete-yes" />
                        <input type="button" value="No" id="delete-no" class="close" data-dismiss="modal" />
                    </div>
                </form>
            </div>                
        </div>
    </div>
</div>