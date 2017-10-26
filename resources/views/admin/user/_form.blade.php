 <!--BEGIN FORM-->
{!!Form::model($model, ['url' => $action, 'class'=>"form-horizontal validations", 'id' => 'form-create'])!!}
    {!!WidgetAlert::show(false)!!}
    <div class="form-body">
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button> You have some form errors. Please check below. 
        </div>
        <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button> Your form validation is successful!
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('name', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                {!! Form::text('name', null,['class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('Username', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                {!! Form::text('username', null,['class'=>'form-control', 'required', 'minlength'=>"2"]) !!}
            </div>
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('password', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                {!!Form::password('password', ['class'=>"form-control"])!!}
            </div>
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('password_confirm', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                {!!Form::password('password_confirm', ['class'=>"form-control"])!!}
            </div>
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('email', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                {!!Form::email('email', null,['class'=>"form-control", 'required'])!!}
            </div>
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('phone', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                {!!Form::text('phone', null,['class'=>"form-control"])!!}
            </div>
        </div>
        <div class="form-group form-md-radios">
            {!!Form::label('gender', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                <div class="md-radio-inline">
                    <div class="md-radio">
                        {!!Form::radio('gender', 1, false,['class'=>"md-radiobtn", 'id'=>"male",])!!}
                        <label for="male">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> Male </label>
                    </div>
                    <div class="md-radio">
                        {!!Form::radio('gender', 2, false,['class'=>"md-radiobtn", 'id'=>"female",])!!}
                        <label for="female">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> Female </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('address', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                {!!Form::text('address', null,['class'=>"form-control"])!!}
            </div>
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('city', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                {!!Form::text('city', null,['class'=>"form-control"])!!}
            </div>
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('people_id', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                {!!Form::number('people_id', null,['class'=>"form-control", 'required'])!!}
            </div>
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('role', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                {!!Form::select('role', array(10 => 'User', 20 => 'Admin'), '', ['class'=>"form-control select2me select2-hidden-accessible", 'required'])!!}
                {{--  {!!Form::text('role', null,['class'=>"form-control"])!!}  --}}
            </div>
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('description', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                {!!Form::text('description', null,['class'=>"form-control"])!!}
            </div>
        </div>
        <div class="form-group form-md-line-input">
            {!!Form::label('image', '', ['class'=>'col-md-2 control-label'])!!}
            <div class="col-md-10">
                <span class="btn btn-default btn-file">
                    <i class="fa fa-upload"></i> Browse {!!Form::file('image',['class'=>"form-control upload-one-file"])!!}
                </span>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-2 col-md-10">
                {!!Form::submit($btnSubmit,['class'=>"btn green"])!!}
                <a href="{{$linkBack}}" title="" class="btn default">Back</a>
            </div>
        </div>
    </div>
{!!Form::close()!!}
<!-- </form> -->
<!-- END FORM