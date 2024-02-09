@extends('adminlte::page')

@section('template_title')
    Procedimientos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Procedimientos') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('procedimientos.create') }}" class="btn btn-light btn-lg float-right"
                                   data-placement="left">
                                    <i class="fa fa-fw fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Procedimiento</th>
                                    <th>descripción</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach ($procedimientos as $procedimiento)
                                    <tr>
                                        <td>{{ $i++ }}</td>

                                        <td>{{ $procedimiento['procedimiento'] }}</td>
                                        <td>{{ $procedimiento['descripcion'] ?? '' }}</td>

                                        <td>
                                            <form action="{{ route('procedimientos.destroy', $procedimiento['id'] ) }}"
                                                  method="POST">
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('procedimientos.edit', $procedimiento['id'] ) }}"><i
                                                        class="fa fa-fw fa-edit"></i></a>
                                                <button class="btn btn-sm btn-danger"
                                                        type="submit"><i
                                                        class="fa fa-fw fa-trash"></i></button>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">
                                @if ($procedimiento->links())
                                    <nav>
                                        <ul class="pagination">
                                            {{-- Previous Page Link --}}
                                            @if ($procedimiento->onFirstPage())
                                                <li class="page-item disabled" aria-disabled="true">
                                                    <span class="page-link">@lang('pagination.previous')</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $procedimiento->previousPageUrl() }}"
                                                       rel="prev">@lang('pagination.previous')</a>
                                                </li>
                                            @endif

                                            {{-- Next Page Link --}}
                                            @if ($alergias->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $procedimiento->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                                                </li>
                                            @else
                                                <li class="page-item disabled" aria-disabled="true">
                                                    <span class="page-link">@lang('pagination.next')</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </nav>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
