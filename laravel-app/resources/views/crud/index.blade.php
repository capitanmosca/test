<a href="{{ route('add') }}">Nuevo</a>

<table>
  <tr>
    <td>Nombre</td>
    <td>E-mail</td>
    <td>Grupo</td>
    <td>Idioma</td>
    <td>Acciones</td>
  </tr>
  @foreach($estudiantes as $estudiante)
    <tr>
      <td>{{ $estudiante['name'] }}</td>
      <td>{{ $estudiante['email'] }}</td>
      <td>{{ $estudiante['group'] }}</td>
      <td>{{ $estudiante['language'] }}</td>
      <td>
        <a href="{{ route('edit', $estudiante['student_id']) }}">editar</a>
        <a href="{{ route('delete', $estudiante['student_id']) }}">eliminar</a>
      </td>
    </tr>
  @endforeach
</table>
