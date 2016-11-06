<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Nama</label>
  <div class="col-md-4">
    <input type="text" name="name" class="form-control" value="{{{ old('name', isset($author) ? $author->name : null) }}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    <input class="btn btn-primary" type="submit" value="Simpan">
  </div>
</div>

