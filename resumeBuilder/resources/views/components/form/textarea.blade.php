@props(['name','type'=>'text','value'=>null])
<div class="form-outline mb-4">
    <textarea name="{{$name}}" cols="30" rows="4" class="form-control" >{{$value}}</textarea>
    <label class="form-label" >{{$name}}</label>
</div>