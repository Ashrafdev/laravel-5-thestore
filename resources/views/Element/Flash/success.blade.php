@if (session('success'))
    <div class="alert alert-success alert-block fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>
        <h4>
            <i class="fa fa-check" aria-hidden="true"></i>
            Success!
        </h4>
        <p>{{ session('success') }}</p>
    </div>
@endif