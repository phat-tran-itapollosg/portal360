<!--
 *
 *Alpha team Mr.tanphat 
 *trantanphat.it@gmail.com
 *
 */
-->
<link rel="stylesheet" href="{{ URL::asset('public/css/css_alphal/css.css' )}}">

<div class='content'>
   
    <h1 class="title">
        Hỏi Đáp FAQ thêm câu hỏi mới
    </h1>
   <div class="box" >
        <table align="center" >
        <form action="{{URL::asset('/faq/add/data')}}" method="post">
        <!-- {!! Form::open(array('url' => '/faq/add/data', 'method' => 'post'))!!} -->
        <tr>
            <div class="question">
                <td>
                    <label>Câu hỏi</label>
                    <!--{!! Form::label(' Câu hỏi  ') !!} -->
                </td>
                <td class='right'>
                        <input type="text" name="txtq" id ="txtq"><br>
                         <!--{!! Form::text('txtq',null,['id' => 'txtq']) !!}-->
                </td>
            </div>
        </tr>
        <tr>
            <div class="question" >
            <td>
                <label>Câu trả  lời </label>
                <!--{!! Form::label(' Câu trả  ') !!}-->
                
            </td>
            <td class='right'>
                <input type="text" name="txtr" id ="txtr"><br>
                <!--{!! Form::textarea('txtr', null , ['id' => 'txtr']) !!}-->
            </td>
            </div>
        </tr>    
        </table>
        <div class="submittable" >
                <input type="submit" name='Lưu lại FAQ'><br>
                <!--{!! Form::submit(' Lưu lại FAQ ')!!}-->
                ||
                <a class='afaq' href="{{URL::asset('/faq/add')}}">
                   Thêm Câu Hỏi    
                </a>|||
                <a class='afaq' href="{{URL::asset('/faq')}}">
                   Quay lại trang FAQ   
                </a>
        </div>
        </form>
        <!--{!! Form::close() !!}-->
    </div>
</div>
   
   <!--
   
   <div style='margin:auto, margin-lef:1000px, float:left'>
   {!! Form::open(array('url' => 'foo/bar')) !!}
      {!! Form::label('qaddlb', 'Câu hỏi thêm vào')!!}
         {!!Form::text('qadd',null,['id'=>'qadd'])!!}<br>
      {!!Form::label('qaddlb', 'Câu trả lời')!!}
         {!!Form::text('readd',null,['id'=>'redd'])!!}
      {!! Form::close() !!}
   </div>
   -->