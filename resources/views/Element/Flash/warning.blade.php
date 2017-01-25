@if (session('warning'))
    <div class="alert alert-warning fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>
        <strong>Warning!</strong> {{ session('warning') }}
    </div>
@endif