{{--<div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--    <strong>{{session('status')}}</strong>--}}
{{--    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--        <span aria-hidden="true">&times;</span>--}}
{{--    </button>--}}
{{--</div>--}}

@if (Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        @elseif(Session::get('status'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session('status')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
@endif
