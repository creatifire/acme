@extends('base')

@section('browsertitle')
    {{$browser_title}}
@stop

@section('content')
    @if ((Acme\Auth\LoggedIn::user()) && (Acme\Auth\LoggedIn::user()->access_level == 2))
        <form action="/admin/page/edit" method="post" id="editpage" name="editpage">
            <article class="editablecontent" id="editablecontent" itemprop="description" style="width:100%; line-height: 2em;">
                {!! $page_content !!}
            </article>
            <article class="admin-hidden">
                <a href="#!" class="btn btn-primary" onclick="saveEditedPage()">Save</a>
                <a href="#!" class="btn btn-info" onclick="turnOffEditing()">Cancel</a>
                @if($page_id == 0)
                    <br>
                    <br>
                    <input type="text" name="browser_title" placeholder="Enter browser title">
                @endif
            </article>
            <input type="hidden" name="thedata" id="thedata">
            <input type="hidden" name="old" id="old">
            <input type="hidden" name="page_id" value="{!! $page_id !!}">
        </form>
    @else
        {!! $page_content !!}
    @endif
@stop

@section('bottomjs')
<script>
    @if ((Acme\Auth\LoggedIn::user()) && (Acme\Auth\LoggedIn::user()->access_level == 2))

        var editor;

        function makePageEditable(item){
            if (($(".editablecontent").length != 0) || ($(".editable").length != 0)) {
                $(".admin-hidden").addClass('admin-display').removeClass('admin-hidden');
                $(item).attr("onclick","turnOffEditing(this)");
                $(item).html("Turn off editing");
                $(".editablecontent").attr("contenteditable","true");
                $(".editablecontent").addClass("outlined");
                $("#old").val($("#editablecontent").html());

                var editoroptions = {
                    allowedContent: true,
                    floatSpaceDockedOffsetX: 150
                }

                var elements = document.getElementsByClassName( 'editablecontent' );

                for ( var i = 0; i < elements.length; ++i ) {
                    CKEDITOR.inline( elements[ i ], editoroptions );
                }
                CKEDITOR.on( 'instanceLoaded', function(event) {
                        editor = event.editor;
                });
            } else {
                alert ('No editable content on page!');
            }
        }

        function turnOffEditing(item) {
            for (name in CKEDITOR.instances) {
                CKEDITOR.instances[name].destroy()
            }
            $(".admin-display").addClass('admin-hidden').removeClass('admin-display');
            $(".menu-item").attr("onclick","makePageEditable(this)");
            $(".menu-item").html("Edit content");
            $(".editablecontent").attr("contenteditable","false");
            $(".editablecontent").removeClass("outlined");
            if ($('#old').val() != ''){
                $(".editablecontent").html($("#old").val());
            }
        }

        function saveEditedPage() {
            // get the data from ckeditor
            var pagedata = editor.getData();
            // save this data
            $("#thedata").val(pagedata);
            var options = { success: showResponse };
            $("#editpage").unbind('submit').ajaxSubmit(options);
            return false;
        }

        function showResponse(responseText, statusText, xhr, $form)
        {
            if (responseText == "OK") {
                $("#old").val('');
                turnOffEditing();
            } else {
                alert(responseText);
            }
        }
    @endif
</script>
@stop
