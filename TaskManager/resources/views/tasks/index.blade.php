<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <h2>Tareas del usuario {{$user->name}}</h2>
                <a class="btn btn-primary fa fa-eye" role="button" aria-disabled="true" href="{{ url('/tasks/create/'.$user->id) }}">Agregar tarea</a>
                <p class="text-center">Lista de tareas</p>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Prioridad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->titulo }}</td>
                            <td>{{ $task->descripcion }}</td>
                            <td>@if ($task->estado === 1)
                                Completado
                                @else
                                Pendiente
                                @endif</td>
                            <td>{{ $task->prioridad }}</td>
                            <td>
                                <a class="btn btn-warning fa fa-eye" role="button" aria-disabled="true" >Modificar</a>
                                <a class="btn btn-danger fa fa-eye" role="button" aria-disabled="true" >Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>