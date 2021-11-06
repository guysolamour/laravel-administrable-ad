@extends(back_view_path('layouts.base'))

@section('title', 'Edition ' . $group->name)

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route(config('administrable.guard') . '.dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                             <li class="breadcrumb-item"><a href="{{ back_route('extensions.ads.ad.index') }}">Publicités</a></li>
                            <li class="breadcrumb-item"><a href="{{ back_route('extensions.ads.group.index') }}">Groupes</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ $group->name }}</a></li>
                            <li class="breadcrumb-item active">Edition</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Edition</h3>
                        <div class="btn-group float-right">
                            <a href="{{ back_route('extensions.ads.group.destroy', $group) }}" class="btn btn-danger" data-method="delete"
                                data-confirm="Etes vous sûr de bien vouloir procéder à la suppression ?">
                                <i class="fas fa-trash"></i> Supprimer</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class='col-md-12'>
                                @include('administrable-ad::' . Str::lower(config('administrable.back_namespace')) . '.groups._form', ['edit' => true])
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection





