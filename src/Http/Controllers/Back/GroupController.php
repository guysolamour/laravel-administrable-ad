<?php

namespace Guysolamour\Administrable\Extensions\Ad\Http\Controllers\Back;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Traits\FormBuilderTrait;
use Guysolamour\Administrable\Http\Controllers\BaseController;


class GroupController extends BaseController
{
    use FormBuilderTrait;

    public function index()
    {
        $groups = config('administrable-ad.models.group')::with('type')->get();

        return view('administrable-ad::' . Str::lower(config('administrable.back_namespace')) . '.groups.index', compact('groups'));
    }

    public function create()
    {
        $form = $this->getForm(new (config('administrable-ad.models.group')), config('administrable-ad.forms.back.group'));

        return view('administrable-ad::' . Str::lower(config('administrable.back_namespace')) . '.groups.create', compact('form'));
    }

    public function store(Request $request)
    {
        $form = $this->getForm(new (config('administrable-ad.models.group')), config('administrable-ad.forms.back.group'));

        $form->redirectIfNotValid();

        config('administrable-ad.models.group')::create($request->all());

        flashy('L\' élément a bien été ajouté');

        return redirect_backroute('extensions.ads.group.index');
    }

    public function show(int $id)
    {
        $group = config('administrable-ad.models.group')::findOrFail($id);

        return view('administrable-ad::' . Str::lower(config('administrable.back_namespace')) . '.groups.show', compact('group'));
    }

    public function edit(int $id)
    {
        $group = config('administrable-ad.models.group')::findOrFail($id);

        $form = $this->getForm($group, config('administrable-ad.forms.back.group'));

        return view('administrable-ad::' . Str::lower(config('administrable.back_namespace')) . '.groups.edit', compact('group', 'form'));
    }

    public function update(Request $request, int $id)
    {
        $group = config('administrable-ad.models.group')::findOrFail($id);

        $form = $this->getForm($group, config('administrable-ad.forms.back.group'));
        $form->redirectIfNotValid();

        $group->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect_backroute('extensions.ads.group.index');
    }

    public function destroy(int $id)
    {
        $group = config('administrable-ad.models.group')::findOrFail($id);

        $group->delete();

        flashy('L\' élément a bien été supprimé');

        return redirect_backroute('extensions.ads.group.index');
    }
}
