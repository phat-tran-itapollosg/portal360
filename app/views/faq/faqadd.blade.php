<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
<link rel="stylesheet" href="{{ URL::asset('public/css/css.css' )}}">

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
                </td>
            </div>
        </tr>
        <tr>
            <td>
                    <label>Danh mục category</label>
                    
                    <!--{!! Form::label(' Câu hỏi  ') !!} -->
            </td>
            <td  class='right'>
                <select name="idcate">
                    @foreach($cate as $cates)
                        <option value="{{$cates->cid}}">{{$cates->ccontent}}</option>
                    @endforeach
                </select>
                <a class='afaq' href="{{URL::asset('/category/get')}}">
                    Thêm Category
                </a>
            </td>
        </tr>
        <tr>
            <div class="question" >
            <td>
                <label>Câu trả  lời </label>
                <!--{!! Form::label(' Câu trả  ') !!}-->
                
            </td>
            <td class='right'>
                <textarea class="textarear" cols="1" required name="txtr" id ="txtr">
                </textarea>
                <!--{!! Form::textarea('txtr', null , ['id' => 'txtr']) !!}-->
            </td>
            </div>
        </tr>    
        </table>
        <div class="submittable" >
                <input type="submit" value='Lưu lại FAQ'><br>
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
   -->