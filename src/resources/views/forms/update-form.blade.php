<form class="form-horizontal" id="userAdditionalInfo" method="POST" action="{{ route('participant.update', $id) }}"
      enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT')}}
    <div class="formtitle"> To participate in the conference, please fill out the form</div>
    <div class="memberref"><a href="{{ route('participant.index') }}"> All members
            ({{ auth()->check() ? $countAllMembers : $countVisibleMembers}})</a></div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="inputCompany">Company</label>
        <div class="col-md-6">
            <input type="text" id="inputCompany" class="form-control" placeholder="Company" name="company" autofocus>
            @if ($errors->has('company'))
                <span class="help-block">
                                <strong>{{ $errors->first('company') }}</strong>
                            </span>
            @endif
        </div>
        <div class="col-md-3 messages"></div>
    </div>


    <div class="form-group">
        <label class="col-md-3 control-label" for="inputPosition">Position</label>
        <div class="col-md-6">
            <input type="text" id="inputPosition" class="form-control" placeholder="Position" name="position">
            @if ($errors->has('position'))
                <span class="help-block">
                            <strong>{{ $errors->first('position') }}</strong>
                        </span>
            @endif
        </div>
        <div class="col-md-3 messages"></div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="inputAboutMe" class="sr-only">About me</label>
        <div class="col-md-6">
            <textarea id="inputAboutMe" cols="72" rows="4" class="form-control" placeholder="About me"
                      name="aboutme"></textarea>
            @if ($errors->has('aboutme'))
                <span class="help-block">
                            <strong>{{ $errors->first('aboutme') }}</strong>
                        </span>
            @endif
        </div>
        <div class="col-md-3 messages"></div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="uploadFoto" class="sr-only">Photo</label>
        <div class="col-md-6">
             <input type="file" id="uploadPhoto" name="photo" accept="image/jpeg, image/jpg, image/png" onchange="validateImage()"/>              
             <div id="output"></div>
            @if ($errors->has('photo'))
                <span class="help-block">
                            <strong>{{ $errors->first('photo') }}</strong>
                        </span>
            @endif
        </div>
        <div class="col-md-3 messages"></div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <div class="text-right">
                <button id="upload" class="btn btn-primary" type="submit" name="submitAddInfo" value="Upload">Next
                </button>
            </div>
        </div>
    </div>
</form>