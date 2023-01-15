<?php
/**
 * @var array $images
 */

?>

@extends('layout')

@section('page-content')
    <div class="card" id="image-picker-card">
        <div class="card-header">
            <h5 class="card-title text-center mb-1">
                {{ trans('frontend.picker_page.card_title') }}
            </h5>
        </div>
        <img
            src=""
            alt="{{ trans('frontend.picker_page.no_image') }}"
            class="img-fluid"
            id="image-picker-image"
            width="600"
            height="500"
        />
        <div class="card-footer d-flex flex-row align-items-center justify-content-center">
            <button
                type="button"
                class="btn btn-danger ms-2 me-2"
                id="image-picker-reject"
            >
                {{ trans('frontend.picker_page.reject') }}
            </button>
            <button
                type="button"
                class="btn btn-success ms-2 me-2"
                id="image-picker-accept"
            >
                {{ trans('frontend.picker_page.accept') }}
            </button>
        </div>
    </div>
    <script type="application/javascript">
        $(function () {
            initImagesPicker({!! json_encode($images) !!});
        })
    </script>
@endsection
