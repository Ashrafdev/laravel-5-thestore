<form class="form-horizontal" role="form" method="POST" action="{{ url("/profile/{$users->id}") }}" accept-charset="UTF-8">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name"
                   value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email"
                   value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Birthday</label>

        <div class="col-md-6">
            <input id="dob" type="date" class="form-control" name="dob" required>

            @if ($errors->has('dob'))
                <span class="help-block">
                    <strong>{{ $errors->first('dob') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Gender</label>

        <div class="col-md-6">
            <select name="gender" id="gender" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            @if ($errors->has('gender'))
                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
        <label for="country" class="col-md-4 control-label">Country</label>

        <div class="col-md-6">

            <select name="country_id" id="country" class="form-control" required>
                <option value="1">Malaysia</option>
                <option value="2">Thailand</option>
                <option value="3">Vietnam</option>
                <option value="BRN">Brunei</option>
                <option value="ID">Indonesia</option>
            </select>

            @if ($errors->has('country_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('country_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }}">
        <label for="country" class="col-md-4 control-label">State</label>

        <div class="col-md-6">

            <select name="state_id" id="country" class="form-control" required>
                <option value="1">Kuala Lumpur</option>
                <option value="2">Others</option>
            </select>

            @if ($errors->has('state_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('state_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Mobile</label>

        <div class="col-md-6">
            <input type="number" name="mobile" id="mobile" class="form-control" required>

            @if ($errors->has('mobile'))
                <span class="help-block">
                    <strong>{{ $errors->first('mobile') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>
</form>