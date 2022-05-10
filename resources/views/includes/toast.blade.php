<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="position: absolute; top: 20px; right: 20px;z-index: 10;">
  <div class="toast-header">
    <strong class="mr-auto">Info</strong>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
  @if(\Session::has('success'))
  {!! \Session::get('success') !!}
  @endif
  </div>
</div>