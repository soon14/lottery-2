@extends('admin.public.base')
@section('style')
    <style>
        .result-content {
            width: 50%;
            float: left;
        }

        .result-wrap, .result-one {
            overflow: hidden;
        }

        .licence_pic {
            width: 40%;
            float: left;
            height: 60px;
            text-align: center;
        }

        .licence_pic > div > img {
            /* margin-left:100px;*/

        }

        .licence_pic > div > p {
            text-align: center;
        }
    </style>
@stop
@section('title1')
    角色管理
@stop
@section('title2')
    修改
@stop
@section('content')


    <form id="formid" name="myform" method='post'>
        <div class="result-wrap result-one">
            <div class="result-content">
                <table class="insert-tab" width="100%">
                    <input type="hidden" name="id" class="id"
                           value="{{ $data[0]->id }}"/>
                    <tbody>
                    <tr>
                        <th width="120"><i class="require-red">*</i>角色：</th>
                        <td><input type="text" name="name" value="{{ $data[0]->name }}"
                                   required/></td>
                    </tr>

                    <tr>
                        <th><i class="require-red">*</i>显示名称：</th>
                        <td><input type="text" name="display_name"
                                   value="{{ $data[0]->display_name }}"/></td>
                    </tr>
                    <tr>
                        <th><i class="require-red">*</i>说明：</th>
                        <td><input type="text" name="description"
                                   value="{{ $data[0]->description }}"/></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input class="btn btn-primary btn6 mr10 ws_fb btn-info" value="确认"
                                   type="submit" id="submit"> <input class="btn btn6"
                                                                     onclick="history.go(-1)" value="返回" type="button">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </form>

@stop
@section('js')
    <script>
        $("#submit").click(function () {

            $.post("/index.php/ad_role_save", $("#formid").serialize(), function (data) {
                console.info(data);
                if (data == '1') {
                    window.location.href = "/index.php/ad_role";
                } else if (data == '0') {
                    alert('修改失败！');
                } else {
                    for (var i in data) {
                        $("input[name=" + i + "]").parent("td").children("span").remove();
                        $("input[name=" + i + "]").parent("td").append('<span style="color:red">' + data[i][0] + '</span>');
                        // alert(i);
                    }
                }
            });
            return false;
        });

    </script>
@stop