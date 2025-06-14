@extends('name')

@section()

    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="inicio.html" style="color: #5c5b5b;">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: #3d3a3a;">Clientes</li>
        </ol>
    </nav>

    <div style="display: flex; align-items: center; gap: 12px;">
        <img src="IMG/target.gif" alt="clientess" width="150" height="150" style="border-radius: 50%; object-fit: cover;">
        <h5 class="text-big" style="margin: 0;"><strong>Clientes</strong></h5>
    </div>
    

    <div class="col-md-12 text-end" style="margin-top: -50px;">
        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-danger animated-button" data-bs-toggle="modal" data-bs-target="#clienteModal">
            Nuevo
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="clienteModal" tabindex="-1" aria-labelledby="clienteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 550px;">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="clienteModalLabel">Añadir Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <form id="clienteForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombreCompleto" class="form-label">Nombre Completo y Apellidos:</label>
                                <input type="text" class="form-control" placeholder="Nombre Completo y Apellidos" id="nombre" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cedula" class="form-label">Cédula:</label>
                                <input type="text" class="form-control" placeholder="Cédula de Identidad" id="cedula" pattern="[0-9]{7,10}" maxlength="12" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" placeholder="Correo Electrónico" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <input type="text" class="form-control" placeholder="Dirección" id="direccion" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="tel" class="form-control" placeholder="Número Telefónico" id="telefono" pattern="[0-9]{8}" maxlength="8">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="clienteForm" class="btn btn-primary">Guardar</button>
                </div>

            </div>
        </div>
    </div><!--termian el modal-->

    <br>
    <div class="container-buttons">
        <div class="search-filter-container">
            <input type="text" class="form-control" placeholder="Buscar">
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto text-sm text-left text-gray-700">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Cedula</th>
                        <th class="px-6 py-3">Nombre</th>
                        <th class="px-6 py-3">Correo</th>
                        <th class="px-6 py-3">Telefono</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">281-210708-0100QE</td>
                        <td class="px-6 py-4 font-medium text-gray-900">Elizabeth Liseth Guevara Lopez</td>
                        <td class="px-6 py-4">Eliza223@hotmail.com</td>
                        <td class="px-6 py-4">23456789</td>
                        <td class="px-6 py-4 flex justify-center gap-2">
                            <!--Boton de Editar  -->
                            <button type="button" class="bg-green p-2 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen-icon">
                                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                    <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/>
                                </svg>
                            </button>
                            <!-- Boton de Eliminar -->
                            <button type="button" class="bg-red p-2 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon">
                                    <path d="M3 6h18"/>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    <line x1="10" x2="10" y1="11" y2="17"/>
                                    <line x1="14" x2="14" y1="11" y2="17"/>
                                </svg>
                            </button>
                        </td>        
                    </tr>   
                </tbody>
            
            </table>
            <div class="px-6 py-3 text-sm text-gray-600">
                <div class="px-6 py-3 text-sm text-gray-600 d-flex justify-content-end align-items-center gap-2">
                    <button type="button" class="btn btn-danger d-flex align-items-center gap-2 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20">
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    Ver Facturas
                    </button>
                </div>
                <span>Mostrando resultados</span>
                
            </div>
        </div>

    </div>

@endsection