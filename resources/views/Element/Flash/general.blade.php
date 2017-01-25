@if (session('status'))
    <div class="alert alert-info fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>
        <strong>Heads up!</strong> {{ session('status') }}
    </div>
@endif