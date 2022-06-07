<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <h2>Tareas del usuario {{$user->name}}</h2>
                <p class="text-center">Lista de tareas</p>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Prioridad</th>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>