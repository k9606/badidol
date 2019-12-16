@extends('layouts.app')

@section('title', isset($category) ? $category->name : '坏偶像社区')

@section('content')
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md8">
            <div class="fly-panel" style="margin-bottom: 0;">
                <div class="fly-panel-title fly-filter">
                    <a href="{{ Request::url() }}?order=default"
                       class="{{ active_class( ! if_query('order', 'recent')) ? 'layui-this' : '' }}">最后回复</a>
                    <span class="fly-mid"></span>
                    <a href="{{ Request::url() }}?order=recent"
                       class="{{ active_class(if_query('order', 'recent')) ? 'layui-this' : '' }}">最新发布</a>
                </div>
                <div class="card-body">
                    @include('topics._topic_list', ['topics' => $topics])
                    <div id="laravel-layui-page" style="text-align: center"></div>
                </div>
            </div>
        </div>
        <div class="layui-col-md4">
            @include('topics._sidebar')
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        layui.use('laypage', function () {
            var laypage = layui.laypage;

            var oldParam = window.location.search.slice(1).split('&');
            var newParam = '';
            for (key in oldParam) {
                if (!oldParam[key].includes('page=')) {
                    newParam += oldParam[key] + '&';
                }
            }
            newParam = newParam.slice(0, -1);

            laypage.render({
                elem: 'laravel-layui-page'
                , count: "{{ $topics->total() }}"
                , limit: "{{ $topics->perPage() }}"
                , curr: "{{ $topics->currentPage() }}"
                , jump: function (obj, first) {
                    if (!first) {
                        window.location.href = '?' + (newParam ? newParam + '&' : '') + 'page=' + obj.curr;
                    }
                }
            });
        });
    </script>
@stop
