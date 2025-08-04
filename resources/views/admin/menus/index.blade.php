@extends('adminlte::page')

@section('title', 'Manage Menus')

@section('content_header')
    <h1 class="text-primary">Menus</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-success float-right">Add New Menu</a>
@stop

@section('content')
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Position</th>
                <th>Order</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->title }}</td>
                    <td>{{ ucfirst(str_replace('-', ' ', $menu->position)) }}</td>
                    <td>{{ $menu->order }}</td>
                    <td>
                        <button class="btn btn-sm toggle-status-btn {{ $menu->status ? 'btn-success' : 'btn-danger' }}" data-id="{{ $menu->id }}">
                            {{ $menu->status ? 'Active' : 'Inactive' }}
                        </button>
                    </td>
                    <td>
                        <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this menu?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@push('js')
<script>
    $('.toggle-status-btn').click(function() {
        var btn = $(this);
        var id = btn.data('id');

        $.post("{{ url('admin/menus') }}/" + id + "/toggle-status", {_token: '{{ csrf_token() }}'}, function(response){
            if(response.status === 'success'){
                if(response.new_status){
                    btn.removeClass('btn-danger').addClass('btn-success').text('Active');
                } else {
                    btn.removeClass('btn-success').addClass('btn-danger').text('Inactive');
                }
            }
        });
    });
</script>
@endpush
