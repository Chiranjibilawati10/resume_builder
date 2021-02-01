@extends('layouts.app')


@section('content')
<div class="container">
    <form action="{{ route('themes.store') }}" method="POST">
        @csrf
        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
        <table class="table table-bordered" id="dynamicAddRemove">  
            <tr>
            <th>Theme Name</th>
            <th>Theme Type</th>
            <th>Action</th>
            </tr>
            <tr>  
            <td><input type="text" name="moreFields[0][name]" placeholder="Enter Theme Name" class="form-control" /></td>  
            <td><input type="text" name="moreFields[0][type]" placeholder="Enter Theme Type" class="form-control" /></td>  
            <td><button type="button" name="add" id="addBtn" class="btn btn-success">Add Theme More</button></td>  
            </tr>  
        </table> 
        <button type="submit" class="btn btn-success">Save</button>
        </form>

</div>
@endsection
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
    var i = 0;
    $("#addBtn").click(function(){
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields['+i+'][name]" placeholder="Enter Theme Name" class="form-control" /></td><td><input type="text" name="moreFields['+i+'][type]" placeholder="Enter Theme Type" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        });
    $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
    }); 
}); 
</script>