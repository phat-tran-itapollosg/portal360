@extends('layouts.master')

@section('title', trans('feedback_index.page_title'))

@section('styles')
        
@stop

@section('content')


<!-- 1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
    <div class="row">
    <div class="col-lg-12">
        <section class="panel panel-default">  
        <header class="panel-heading" style="border-radius:0">
            <b>{{ trans('feedback_index.page_title') }}</b>
        </header>
        <div class="panel-body">                  
                <table class="table table-striped table-bordered table-hover" style="border-collapse:inherit">

<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
                    <thead>
                        <tr>
                            <th><b>{{ trans('feedback_index.subject') }}</b></th>
                            <th ><b>{{ trans('feedback_index.type') }}</b></th>
                            <th class=".visible-xs-block, hidden-xs"><b>{{ trans('feedback_index.receiver') }}</b></th>  
                            <th data-type="timedate"><b>{{ trans('feedback_index.sent_date') }}</b></th>
                            <th class=".visible-xs-block, hidden-xs"><b>{{ trans('feedback_index.status') }}</b></th>
                            <th class=".visible-xs-block, hidden-xs"><b>{{ trans('feedback_index.content') }}</b></th>
                            <th class=".visible-xs-block, hidden-xs"><b>{{ trans('feedback_index.resolution') }}</b></th>
                            <th class=".visible-xs-block, hidden-xs" data-type="timedate"><b>{{ trans('feedback_index.resolved_date') }}</b></th>
                            
                        </tr>
                    </thead>

<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
                  <tbody>
<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->name }}</td>
                                <td>{{ $types->{$feedback->relate_feedback_list} }}</td>
                                <td class=".visible-xs-block, hidden-xs">{{ $feedback->receiver }}</td>
                                <td>{{ SugarUtil::formatDate($feedback->date_entered) }}</td>
                                <td class=".visible-xs-block, hidden-xs">{{ isset($statuses->{$feedback->status})?$statuses->{$feedback->status}:$feedback->status }}</td>
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
                                <td class=".visible-xs-block, hidden-xs">{{ $feedback->description }}</td>
                                <td class=".visible-xs-block, hidden-xs">{{ $feedback->feedback }}</td>

<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
                                 <td class=".visible-xs-block, hidden-xs">{{ SugarUtil::formatDate($feedback->resolved_date) }}</td>
                            </tr>
                        @endforeach
                    </tbody>

<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
              </table>
            </div>
        </div>
        </section>
    </div>
    </div>


<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->

@stop

@section('scripts')

    <script src="{{ URL::asset('public/vendors/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/datatabel.js') }}"></script>

    @if(Session::has('success_message'))
        <script type="text/javascript">

//   1e1413e10f011dfebcc6b900cffce8e8da2906d0
            Notification.notify('{{ Session::get('success_message') }}', 'success');
//   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) |

        </script>
    @endif
    
@stop