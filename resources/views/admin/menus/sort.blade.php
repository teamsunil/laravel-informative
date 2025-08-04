@extends('adminlte::page')

@section('title', 'Sort Menus')

@section('content_header')
    <h1 class="text-primary">Sort Menus (Drag & Drop)</h1>
@stop

@section('content')
    @foreach($menus as $position => $menuItems)
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                {{ ucfirst(str_replace('-', ' ', $position)) }} Menus
            </div>
            <div class="card-body">
                <ul class="list-group sortable-menu" data-position="{{ $position }}">
                    @foreach($menuItems as $menu)
                        <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $menu->id }}">
                            <div class="d-flex align-items-center">
                                <input type="text" name="title[{{ $menu->id }}]" class="form-control form-control-sm d-inline w-50" value="{{ $menu->title }}">
                                <input type="text" name="url[{{ $menu->id }}]" class="form-control form-control-sm d-inline w-50 ml-2" value="{{ $menu->url }}">
                            </div>
                            <span class="badge badge-primary">{{ $menu->order }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach

    <button id="saveOrder" class="btn btn-success">Save Order</button>
@stop

@push('js')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function () {
        $(".sortable-menu").sortable({
            placeholder: "ui-state-highlight"
        }).disableSelection();

        $('#saveOrder').click(function () {
            var orderData = [];
            var titles = {};
            var urls = {};

            $('.sortable-menu').each(function(){
                $(this).children('li').each(function(){
                    var id = $(this).data('id');
                    orderData.push(id);
                    titles[id] = $(this).find('input[name="title[' + id + ']"]').val();
                    urls[id] = $(this).find('input[name="url[' + id + ']"]').val();
                });
            });

            $.ajax({
                url: "{{ route('menus.updateOrder') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    order: orderData,
                    titles: titles,
                    urls: urls
                },
                success: function (res) {
                    if(res.status === 'success'){
                        alert('Menus Updated Successfully!');
                        location.reload();
                    }
                }
            });
        });
    });
</script>
@endpush

@push('css')
<style>
    .ui-state-highlight { height: 2.5em; background-color: #d4edda; }
</style>
@endpush
