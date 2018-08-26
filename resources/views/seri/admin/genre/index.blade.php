@extends('layouts.index')

@section('content')

    <form method="post">

    {{ csrf_field() }}

    <div class="table-responsive">
        <table class="table table-hover" id="customFields">
            <thead>
                <tr>
                    <th width="50" class="text-center">ID</th>
                    <th>Genre</th>
                    <th width="50">
                        <button class="btn btn-primary btn-submit edit-form" type="button" name="updateOrCreate">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i><span></span>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($genres as $item)
                    <tr>
                        <td class="text-center">
                            <div class="form-number">
                                {{ $item->id }}
                                <input type="hidden" disabled class="form-control" name="row[{{ $item->id }}][id]" value="{{ $item->id }}">
                            </div>
                        </td>
                        <td>
                            <input type="text" disabled class="form-control" name="row[{{ $item->id }}][genre]" id="genre{{ $item->id }}" value="{{ $item->genre }}">
                        </td>
                        {{-- <td class="edit-form-single-row">
                            <input type="hidden" disabled class="form-control" id="delete" name="row[{{ $item->id }}][delete]" value="yes">
                            <button type="button" class="btn btn-primary btn-submit" name="deleteRow">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                        </td> --}}
                        <td class="edit-form-index">

                        </td>
                        <td class="edit-form-show">
                            <input type="hidden" disabled class="form-control" id="delete" name="row[{{ $item->id }}][delete]" value="yes">
                            <button type="button" class="btn btn-primary btn-submit" name="deleteRow">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                <tr class="add_table_row">
                    <td></td>
                    <td>
                        <input type="text" class="form-control" name="row[0][genre]">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-submit" name="updateOrCreate">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
        </table>
    </form>

@endsection
