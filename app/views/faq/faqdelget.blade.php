<!--
 *
 *Alpha team Mr.tanphat 
 *trantanphat.it@gmail.com
 *
 */
-->
<link rel="stylesheet" href="{{ URL::asset('public/css/css_alphal/css.css' )}}">
<div class='content'>
    @if($faqdelget!=null)
        
    <h1 class="title">
        Các FAQ đã xóa
    </h1>
    @foreach ($faqdelget as $infofaq)   
    <div class="box">
        <table align="center" >
        <tr>
            <div class="question">
                <td>
                    <label>Câu hỏi</label>
                </td>
                <td class='right'>
                        <a href="{{URL::asset('/faq/edit/')}}" <label>{{$infofaq->faqquestion}}</label>
                </td>
            </div>
        </tr>
        <tr>
            <div class="question" >
            <td>
                <label>Câu trả lời</label>
                
            </td>
            <td class='right'>
                <label>{{$infofaq->faqreply}}
            </td>
            </div>
        
        </tr>
        </table>
        <div class="submittable" >
                
                <a class='afaq' href="{{URL::asset('/faq/add')}}">
                   Thêm Câu Hỏi    
                </a>|||
                <a class='afaq' href="{{URL::asset('/faq')}}">
                   Quay lại trang FAQ   
                </a>
        </div>
                
        {!! Form::close() !!}
    </div>
    @endforeach
@else
    <h1 class="title">
        Không có FAQ nào đã xóa
    </h1>

    @endif
</div>