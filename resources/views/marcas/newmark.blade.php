<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Marcas</th>
      <th colspan="2">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($marcas as $marca)
    <tr class="odd gradeX">
      <td>{{$marca->marca}}</td>
      <td>
        {!! Form::open(["route"=>["Marcas.destroy",$marca->id],"method"=>"POST"]) !!}
          @csrf
          @method('DELETE')
          {!! Form::submit("Eliminar",["class"=>"btn btn-danger"]) !!}
        {!! Form::close() !!}
        <a href="{{  url('destroy', [$marca->id])}}" class="btn btn-danger" data-method="delete" data-confirm="Are you sure?">Delete</a>
      </td>
      <td>{!! link_to_route("Marcas.edit", "Modificar",["id"=>$marca->id],["class"=>"btn btn-warning"]) !!}</td>
    </tr>
  @endforeach
</tbody>
</table>