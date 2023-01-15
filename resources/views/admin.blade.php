<?php
/**
 * @var string $token
 */
?>

@extends('admin_layout')

@section('page-content')
    <div class="card" id="images-list-card">
        <div class="card-header">
            <h5 class="card-title text-center mb-1">
                {{ trans('admin.images.card_header') }}
            </h5>
        </div>
        <div class="card-body p-0">
            <table
                id="images-list"
                class="table table-bordered table-hover table-striped m-0"
            >
            <thead>
                <tr>
                    <th data-orderable="false" data-name="url" data-data="url">
                        {{ trans('admin.images.table.image') }}
                    </th>
                    <th data-orderable="false" data-name="decision" data-data="decision">
                        {{ trans('admin.images.table.decision') }}
                    </th>
                    <th data-orderable="false" data-name="created_at" data-data="created_at">
                        {{ trans('admin.images.table.created_at') }}
                    </th>
                    <th data-orderable="false" data-name="id" data-data="id">
                        {{ trans('admin.images.table.actions') }}
                    </th>
                </tr>
            </thead>
            </table>
        </div>
    </div>
    <script type="text/html" id="delete-button-tpl">
        <button
            type="button"
            class="btn btn-danger delete-image"
            data-confirm="{{ trans('admin.images.table.delete_confirm') }}"
        >
            {{ trans('admin.images.table.delete') }}
        </button>
    </script>
    <script type="application/javascript">
        $(function () {
            initImagesList('{{ $token }}');
        })
    </script>
@endsection


