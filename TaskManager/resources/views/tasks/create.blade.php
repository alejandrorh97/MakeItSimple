<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <h2 class="text-center">Crear tarea</h2>
                <form action="">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Comprar pollo">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                    </div>
                    <select class="form-select" aria-label="Prioridad">
                        <option selected>Selecciona un prioridad</option>
                        <option value="Baja">Baja</option>
                        <option value="Media">Media</option>
                        <option value="Alta">Alta</option>
                    </select>
                    <br>
                    <a class="btn btn-primary fa fa-eye" role="button" aria-disabled="true" >Guardar tarea</a>
                    <a class="btn btn-primary fa fa-eye" role="button" aria-disabled="true" href="{{ url('/tasks/'.$id) }}">Ver tareas</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>