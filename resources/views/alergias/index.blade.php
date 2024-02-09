@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Alergias') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('alergias.create') }}" class="btn btn-light btn-lg float-right"
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
                                    <th>Nombre de alergias</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach ($alergias as $alergia)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $alergia['alergia'] }}</td>
                                        <td>
                                            <form action="{{ route('alergias.destroy', $alergia['id']) }}"
                                                  method="POST">
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('alergias.edit', $alergia['id']) }}"><i
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
                            @if ($alergias->links())
                                <nav>
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($alergias->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true">
                                                <span class="page-link">@lang('pagination.previous')</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $alergias->previousPageUrl() }}"
                                                   rel="prev">@lang('pagination.previous')</a>
                                            </li>
                                        @endif

                                        {{-- Next Page Link --}}
                                        @if ($alergias->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $alergias->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
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
    </div>
@endsection
