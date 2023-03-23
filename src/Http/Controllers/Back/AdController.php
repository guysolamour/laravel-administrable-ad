<?php

namespace Guysolamour\Administrable\Extensions\Ad\Http\Controllers\Back;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Traits\FormBuilderTrait;
use Guysolamour\Administrable\Http\Controllers\BaseController;


class AdController extends BaseController
{
    use FormBuilderTrait;

    public function index()
    {
        $ads = config('administrable-ad.models.ad')::with(['type', 'group'])->latest()->get();

        return view('administrable-ad::' . Str::lower(config('administrable.back_namespace')) . '.ads.index', compact('ads'));
    }

    public function create()
    {
        $form = $this->getForm(new (config('administrable-ad.models.ad')), config('administrable-ad.forms.back.ad'));

        return view('administrable-ad::'. Str::lower(config('administrable.back_namespace')) .'.ads.create', compact('form'));
    }

    public function store(Request $request)
    {
        $form = $this->getForm(new (config('administrable-ad.models.ad')), config('administrable-ad.forms.back.ad'));

        $form->redirectIfNotValid();

        config('administrable-ad.models.ad')::create($request->all());

        flashy('L\' élément a bien été ajouté');

        return redirect_backroute('extensions.ads.ad.index');
    }

    public function show(int $id)
    {
        $ad = config('administrable-ad.models.ad')::findOrFail($id);

        return view('administrable-ad::' . Str::lower(config('administrable.back_namespace')) . '.ads.show', compact('ad'));

    }


    public function edit(int $id)
    {
        $ad   = config('administrable-ad.models.ad')::findOrFail($id);
        $form = $this->getForm($ad, config('administrable-ad.forms.back.ad'));

        return view('administrable-ad::' . Str::lower(config('administrable.back_namespace')) . '.ads.edit', compact('ad', 'form'));
    }

    public function update(Request $request, int $id)
    {
        $ad   = config('administrable-ad.models.ad')::findOrFail($id);

        $form = $this->getForm($ad, config('administrable-ad.forms.back.ad'));
        $form->redirectIfNotValid();

        $ad->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect_backroute('extensions.ads.ad.index');
    }

    public function destroy(int $id)
    {
        $ad = config('administrable-ad.models.ad')::findOrFail($id);

        $ad->delete();

        flashy('L\' élément a bien été supprimé');

        return redirect_backroute('extensions.ads.ad.index');
    }
}
