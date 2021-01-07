@props(['name','type'=>'text', 'value'=>null])
<div class="form-outline mb-4">
    <input type="{{$type}}" name="{{$name}}" class="form-control" value="{{$value}}"/>
    <label class="form-label">{{ucfirst($name)}}</label>
</div>