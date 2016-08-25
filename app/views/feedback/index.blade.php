@extends('layouts.master')

@section('title', trans('feedback_index.page_title'))

@section('styles')
        
@stop

@section('content')
    <div class="row">
    <div class="col-lg-12">
        <section class="panel panel-default">  
        <header class="panel-heading" style="border-radius:0">
            <b>{{ trans('feedback_index.page_title') }}</b>
        </header>
        <div class="panel-body">                  
                <table class="table table-striped table-bordered table-hover" style="border-collapse:inherit">
                    <thead>
                        <tr>
                            <th><b>{{ trans('feedback_index.subject') }}</b></th>
                            <th><b>{{ trans('feedback_index.type') }}</b></th>
                            <th><b>{{ trans('feedback_index.receiver') }}</b></th>  
                            <th data-type="timedate"><b>{{ trans('feedback_index.sent_date') }}</b></th>
                            <th><b>{{ trans('feedback_index.status') }}</b></th>
                            <th><b>{{ trans('feedback_index.content') }}</b></th>
                            <th><b>{{ trans('feedback_index.resolution') }}</b></th>
                            <th data-type="timedate"><b>{{ trans('feedback_index.resolved_date') }}</b></th>
                            
                        </tr>
                    </thead>
                  <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->name }}</td>
                                <td>{{ $types->{$feedback->relate_feedback_list} }}</td>
                                <td>{{ $feedback->receiver }}</td>
                                <td>{{ SugarUtil::formatDate($feedback->date_entered) }}</td>
                                <td>{{ isset($statuses->{$feedback->status})?$statuses->{$feedback->status}:$feedback->status }}</td>
                                <td>{{ $feedback->description }}</td>
                                <td>{{ $feedback->feedback }}</td>
                                 <td>{{ SugarUtil::formatDate($feedback->resolved_date) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
              </table>
            </div>
        </div>
        </section>
    </div>
    </div>
@stop

@section('scripts')

    <script src="{{ URL::asset('public/vendors/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/datatabel.js') }}"></script>

    @if(Session::has('success_message'))
        <script type="text/javascript">
            Notification.notify('{{ Session::get('success_message') }}', 'success');
        </script>
    @endif
    
@stop