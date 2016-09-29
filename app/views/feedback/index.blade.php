@extends('layouts.master')

@section('title', trans('feedback_index.page_title'))

@section('styles')
<style>
  @media 
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {
    td:nth-of-type(1):before { content: '{{trans('feedback_index.subject')}} : '; } 
    td:nth-of-type(2):before { content: '{{trans('feedback_index.type')}} : '; } 
    td:nth-of-type(3):before { content: '{{trans('feedback_index.receiver')}} : '; }
    td:nth-of-type(4):before { content: '{{trans('feedback_index.sent_date')}} : '; }
    td:nth-of-type(5):before { content: '{{trans('feedback_index.status')}} : '; }
    td:nth-of-type(6):before { content: '{{trans('feedback_index.content')}} : '; }
    td:nth-of-type(7):before { content: '{{trans('feedback_index.resolution')}} : '; }
    td:nth-of-type(8):before { content: '{{trans('feedback_index.resolved_date')}} : '; }
  }
  </style>
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
                            <th><b>{{ trans('feedback_index.receiver') }}</b></th>  
                            <th data-type="timedate"><b>{{ trans('feedback_index.sent_date') }}</b></th>
                            <th><b>{{ trans('feedback_index.status') }}</b></th>
                            <th><b>{{ trans('feedback_index.content') }}</b></th>
                            <th><b>{{ trans('feedback_index.resolution') }}</b></th>
                            <th data-type="timedate"><b>{{ trans('feedback_index.resolved_date') }}</b></th>
                            
                        </tr>
                    </thead>

<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
                  <tbody>
<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->name }}</td>
                                <td>{{ $types->{$feedback->relate_feedback_list} }}</td>
                                <td>{{ $feedback->receiver }}</td>
                                <td>{{ SugarUtil::formatDate($feedback->date_entered) }}</td>
                                <td>{{ isset($statuses->{$feedback->status})?$statuses->{$feedback->status}:$feedback->status }}</td>
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
                                <td>{{ $feedback->description }}</td>
                                <td>{{ $feedback->feedback }}</td>

<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
                                 <td>{{ SugarUtil::formatDate($feedback->resolved_date) }}</td>
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