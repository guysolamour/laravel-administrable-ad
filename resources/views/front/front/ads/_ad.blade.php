@php
    if (!empty($ad_key)){
        $ad = config('administrable-ad.models.ad')::with('type')->find($ad_key);
    }
@endphp

@if($ad)
    {!! $ad->render($ad_attrs ?? []) !!}
@endif
