@extends(back_view_path('layouts.base'))

@section('title', 'Groupes')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1>Groupes</h1> --}}
                </div>
                <div class="col-sm-6">
                    <div class='float-sm-right'>
                         <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route(Str::lower(config('administrable.guard')) . '.dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{ back_route('extensions.ads.ad.index') }}">Publicités</a></li>
                            <li class="breadcrumb-item active">Groupes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Réduire">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class='row'>
                    <div class="col-md-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Groupes</h3>
                                        <div class="btn-group float-right">
                                            <a href="{{ back_route('extensions.ads.group.create') }}" class="btn  btn-primary"> <i
                                                    class="fa fa-plus"></i> Ajouter</a>
                                            <a href="#" class="btn btn-danger d-none" data-model="{{ config('administrable-ad.models.group') }}"
                                                id="delete-all"> <i class="fa fa-trash"></i> Tous supprimer</a>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped" id="list">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="check-all">
                                                                <label class="custom-control-label"
                                                                    for="check-all"></label>
                                                            </div>
                                                        </th>
                                                        <th>Code</th>
                                                        <th>Nom</th>
                                                        <th>Type</th>
                                                        <th>Pubs visible</th>
                                                        <th>Largeur</th>
                                                        <th>Hauteur</th>
                                                        <th>Date ajout</th>
                                                        <th>Actions</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($groups as $group)
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" data-check
                                                                    class="custom-control-input"
                                                                    data-id="{{ $group->getKey() }}"
                                                                    id="check-{{ $group->getKey() }}">
                                                                <label class="custom-control-label"
                                                                    for="check-{{ $group->getKey() }}"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{ $group->getKey() }}</td>
                                                        <td>{{ $group->name }}</td>
                                                        <td>
                                                            {{ $group->type->label }}
                                                        </td>
                                                        <td>{{ $group->visible_ads == 0 ? 'Toutes' : $group->visible_ads }}</td>
                                                        <td>{{ $group->width }}</td>
                                                        <td>{{ $group->height }}</td>

                                                        <td>{{ $group->created_at->format('d/m/Y h:i') }}</td>
                                                        {{-- add values here --}}
                                                        <td>
                                                            <div class="btn-group" role="group">

                                                                <a href="{{ back_route('extensions.ads.group.edit', $group) }}"
                                                                    class="btn btn-info" data-toggle="tooltip"
                                                                    data-placement="top" title="Editer"><i
                                                                        class="fas fa-edit"></i></a>

                                                                <a href="{{ back_route('extensions.ads.group.destroy', $group) }}"
                                                                    data-method="delete"
                                                                    data-confirm="Etes vous sûr de bien vouloir procéder à la suppression ?"
                                                                    class="btn btn-danger" data-toggle="tooltip"
                                                                    data-placement="top" title="Supprimer"><i
                                                                        class="fas fa-trash"></i></a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.mail-box-messages -->
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<x-administrable::datatable />

@deleteAll()
@endsection
