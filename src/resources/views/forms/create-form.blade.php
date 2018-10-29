<form id="userRegistrationData" class="form-horizontal" method="POST" action="{{ route('participant.store') }}">
    {{ csrf_field() }}
    <div class="formtitle"> To participate in the conference, please fill out the form</div>
    <div class="memberref"><a href="{{ route('participant.index') }}"> All members
            ({{ auth()->check() ? $countAllMembers : $countVisibleMembers}}) </a></div>

    <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
        <label for="firstname" class="col-md-3 control-label">First Name</label>

        <div class="col-md-6">
            <input id="firstname" type="text" class="form-control" placeholder="FirstName" name="firstname"
                   value="{{ old('firstname') }}" autofocus>

            @if ($errors->has('firstname'))
                <span class="help-block">
                            <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
            @endif
        </div>
        <div class="col-md-3 messages"></div>
    </div>

    <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}">
        <label for="lastname" class="col-md-3 control-label">Last Name</label>

        <div class="col-md-6">
            <input id="lastname" type="text" class="form-control" placeholder="LastName" name="lastname"
                   value="{{ old('lastname') }}">

            @if ($errors->has('lastname'))
                <span class="help-block">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
            @endif
        </div>
        <div class="col-md-3 messages"></div>
    </div>

    <div class="form-group {{ $errors->has('birthdate') ? ' has-error' : '' }}">
        <label class="col-md-3 control-label" for="birthdate">BirthDate</label>

        <div class="col-md-6 ">
            <input type="text" id="birthdate" class="form-control" placeholder="DD / MM / YYYY" name="birthdate">
            @if ($errors->has('birthdate'))
                <span class="help-block">
                            <strong>{{ $errors->first('birthdate') }}</strong>
                        </span>
            @endif
        </div>
        <div class="col-md-3 messages"></div>
    </div>

    <div class="form-group {{ $errors->has('reportsubject') ? ' has-error' : '' }}">
        <label for="reportsubject" class="col-md-3 control-label">Report of Subject</label>

        <div class="col-md-6">
            <input type="text" id="reportsubject" class="form-control" placeholder="Report of Subject"
                   name="reportsubject">
            @if ($errors->has('reportsubject'))
                <span class="help-block">
                            <strong>{{ $errors->first('reportsubject') }}</strong>
                        </span>
            @endif
        </div>
        <div class="col-md-3 messages"></div>
    </div>

    <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
        <label for="country" class="col-md-3 control-label">Country</label>

        <div class="col-md-6">
            <select name="country" id="country" class="form-control">

            </select>

            @if ($errors->has('country'))
                <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
            @endif
        </div>
        <div class="col-md-3 messages"></div>
    </div>

    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone" class="col-md-3 control-label">Phone</label>

        <div class="col-md-6">
            <input type="text" id="phone" class="form-control" placeholder="" name="phone">
            @if ($errors->has('phone'))
                <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
            @endif
        </div>
        <div class="col-md-3 messages"></div>
    </div>


    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-3 control-label">E-Mail</label>

        <div class="col-md-6">
            <input type="text" id="email" class="form-control" name="email" placeholder="Email"
                   value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
            @endif
        </div>
        <div class="col-md-3 messages"></div>
    </div>


    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <div class="text-right">
                <button class="btn btn-primary " type="submit" name="submitRegData">Next</button>
            </div>
        </div>
    </div>
</form>