<form action="{{ route('save') }}" method="POST">
  @csrf

  @if(isset($estudiante))
    <input type="hidden" name="id" value="{{ $estudiante->id }}">
  @endif
  <label>Nombre</label>
  <input type="text" name="student[name]" value="{{ @$estudiante->name }}">

  <label>Email</label>
  <input type="text" name="student[email]" value="{{ @$estudiante->email }}">

  <label>Grupo</label>
  <input type="text" name="detail[grupo]" value="{{ @$estudiante->group }}">

  <label>Idioma</label>
  <input type="text" name="detail[idioma]" value="{{ @$estudiante->language }}">

  <a href="{{ url('') }}">Cancelar</a>
  <button type="submit">Salvar</button>
</form>
