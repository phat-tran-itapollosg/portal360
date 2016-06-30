@extends('layouts.master')

@section('title', trans('feedback_index.page_title'))

@section('styles')
        
@stop

@section('content')
    
    <div class="container">
        <div class="block-header">
            <h2>{{ trans('feedback_index.page_title') }}</h2>
        </div>
        
        <div class="card">
            <div class="card-body card-padding overflow-auto">
                <table id="data-table" class="datatable table table-striped table-vmiddle">
                    <thead>
                        <tr>
                            <th>{{ trans('feedback_index.subject') }}</th>
                            <th>{{ trans('feedback_index.type') }}</th>
                            <th>{{ trans('feedback_index.target') }}</th>  
                            <th data-type="timestamp">{{ trans('feedback_index.sent_date') }}</th>
                            <th>{{ trans('feedback_index.status') }}</th>
                            <th>{{ trans('feedback_index.content') }}</th>
                            <th>{{ trans('feedback_index.resolution') }}</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->name }}</td>
                                <td>{{ $types->{$feedback->relate_feedback_list} }}</td>
                                <td>{{ $targets->{$feedback->slc_target?$feedback->slc_target:'-'} }}</td>
                                <td>{{ SugarUtil::formatDate($feedback->date_entered) }}</td>
                                <td>{{ $statuses->{$feedback->status} }}</td>
                                <td>{{ $feedback->description }}</td>
                                <td>{{ $feedback->feedback }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ URL::asset('public/vendors/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/feedback_index.js') }}"></script>

    @if(Session::has('success_message'))
        <script type="text/javascript">
            Notification.notify('{{ Session::get('success_message') }}', 'success');
        </script>
    @endif
    
@stop