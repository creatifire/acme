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
