@extends('layouts.dashboard')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        @if(Auth::user()->roles()->first()->name == "SuperAdmin")
        <a class="btn btn-success" href="{{ route("abilities.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.ability.title_singular') }}
        </a>
        @endif
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.ability.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <?php  $i=1;?>
            <table class=" table table-bordered table-striped table-hover datatable datatable-Ability">
                <thead>
                    <tr>
                         
                        <th>
                            {{ trans('cruds.ability.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ability.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abilities as $key => $ability)
                        <tr data-entry-id="{{ $ability->id }}">
                             
                            <td>
                                {{ $ability->id ?? '' }}
                            </td>
                            <td>
                                {{ $ability->name ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('abilities.show', $ability->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                         @if(Auth::user()->roles()->first()->name == "SuperAdmin")
                                <a class="btn btn-xs btn-info" href="{{ route('abilities.edit', $ability->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                <form action="{{ route('abilities.destroy', $ability->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('abilities.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)

  $.extend(false, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  $('.datatable-Ability:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
