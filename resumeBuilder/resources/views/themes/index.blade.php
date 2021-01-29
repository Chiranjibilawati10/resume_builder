@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Themes</h2>
            </div>
            <div class="pull-right">
                @can('theme-create')
                <a class="btn btn-success" href="{{ route('themes.create') }}"> Create New Theme</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Type</th>
            <th width="280px">Action</th>
        </tr>

	    @foreach ($themes as $theme)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $theme->name }}</td>
	        <td>{{ $theme->type }}</td>
	        <td>

                <form action="{{ route('themes.destroy',$theme->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('themes.show',$theme->id) }}">Show</a>
                    @can('theme-edit')
                    <a class="btn btn-primary" href="{{ route('themes.edit',$theme->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('theme-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach

    </table>

    {!! $themes->links() !!}

@endsection