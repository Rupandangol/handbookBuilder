@extends('Backend.master')
@section('heading')
    <div class="row">
        <div class="col-md-9"><h1 ><i class="fa fa-history"></i> Log: <span id="total_records"></span></h1></div>
        <div class="col-md-3">
            <form class="form-inline">
                <input class="form-control mr-sm-2" id="searchInput" type="search" placeholder="Search"
                       aria-label="Search">
                {{--<button class="btn btn-outline-success my-2 my-sm-0" id="searchBtn" type="submit">Search</button>--}}
            </form>
        </div>
    </div>
@endsection
@section('content')

    <div class="container" style="background-color: whitesmoke">
        <table id="logTable" class="table table-hover">
            <tbody>
            </tbody>
        </table>
    </div>

@endsection
@section('my-footer')
    <script>
        $(function () {

            searchFetchData();
            function searchFetchData(query) {
                var base_url = window.location.origin;
                $.ajax({
                    url: base_url + "/@admin@/api/searchLog",
                    data: {'myQuery': query},
                    cache: false,
                    success: function (data) {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $('#searchInput').on('keyup', function () {
                var query = $('#searchInput').val();
                searchFetchData(query);
            })
        })
    </script>
@endsection