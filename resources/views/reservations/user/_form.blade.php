<h3 class="text-center">Taarifa Binafsi</h3>
<div class="form-group">
    <label for="first_name" class="col-sm-3 control-label">Jina la Kwanza * </label>
    <div class="col-sm-5">
        {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Mfano. Hatibu']) !!}
    </div>
</div>
<div class="form-group">
    <label for="middle_name" class="col-sm-3 control-label">Jina la kati</label>
    <div class="col-sm-5">
        {!! Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => 'Mfano. Mungia']) !!}
    </div>
</div>
<div class="form-group">
    <label for="last_name" class="col-sm-3 control-label">Jina la Ukoo * </label>
    <div class="col-sm-5">
        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Mfano. Hatibu']) !!}
    </div>
</div>
@if($user_detail->photo == null)
    <div class="form-group">
        <label for="photo" class="col-sm-3 control-label">Picha</label>
        <div class="col-sm-5">
            <input type="file" name="photo" value="{{ $user_detail->photo }}">
        </div>
    </div>
@else
    {!! Form::hidden('photo') !!}
    <div class="form-group">
        <label for="photo" class="col-sm-3 control-label">Picha * </label>
        <div class="col-sm-3">
            <div class="thumbnail">
                <img src="/img/uploads/avatars/{{ $user_detail->photo }}" class="img-responsive" height="280"
                     width="200"
                     alt="{{ $user_detail->first_name }}&nbsp;{{ $user_detail->middle_name }}&nbsp;{{ $user_detail->last_name }}">
            </div>
        </div>
    </div>
@endif

<br><br>

<h3 class="text-center">Taarifa za Mawasiliano</h3>
<div class="form-group">

    <label for="phone_number" class="col-sm-3 control-label">Namba ya Simu</label>
    <div class="col-sm-5">
        {!! Form::text('phone_number', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
    </div>
</div>
<div class="form-group">
    <label for="email_address" class="col-sm-3 control-label">Barua Pepe</label>
    <div class="col-sm-5">
        {!! Form::email('email_address', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
    </div>
</div>
<div class="form-group">
    <label for="address" class="col-sm-3 control-label">Anuani</label>
    <div class="col-sm-5">
        <div class="input-group">
            <div class="input-group-addon">S.L.P *</div>
            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Mfano. 259']) !!}
        </div>
    </div>
</div>

<br><br>

<h3 class="text-center">Mahali Unapoishi</h3>
<div class="form-group">
    <label for="region" class="col-sm-3 control-label">Mkoa * </label>
    <div class="col-sm-5">
        {!! Form::text('region',null, ['class' => 'form-control', 'placeholder' => 'Mfano. Dodoma']) !!}
    </div>
</div>
<div class="form-group">
    <label for="district" class="col-sm-3 control-label">Wilaya * </label>
    <div class="col-sm-5">
        {!! Form::text('district',null, ['class' => 'form-control', 'placeholder' => 'Mfano. Dodoma Mjini']) !!}
    </div>
</div>
<div class="form-group">
    <label for="ward" class="col-sm-3 control-label">Kata * </label>
    <div class="col-sm-5">
        {!! Form::text('ward', null, ['class' => 'form-control', 'placeholder' => 'Mfano. Kisasa']) !!}
    </div>
</div>
<div class="form-group">
    <label for="house_number" class="col-sm-3 control-label">Namba ya Nyumba * </label>
    <div class="col-sm-5">
        {!! Form::text('house_number', null, ['class' => 'form-control', 'placeholder' => 'Mfano. 357']) !!}
    </div>
</div>

<br><br>