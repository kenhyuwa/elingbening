<form method="POST" action="#" id="form" class="form-horizontal">
{{ csrf_field() }}
  <div id="modalsb" class="modal modal-info fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div id="modals" class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div id="callback" style="display: none;">
            <center><strong id="message"></strong></center>
          </div>
          <center><h4 class="confirm">Apakah anda yakin ?</h4></center>
          @yield('modal')
        </div>
        <div class="modal-footer">
          <button type="button" id="btn-cancel" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <button type="button" onclick="save()" id="btn-save" class="btn btn-outline"></button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</form>