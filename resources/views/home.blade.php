<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="icon" type="images/x-ico" href="https://png.pngtree.com/element_our/sm/20180524/sm_5b072f1c21cb2.png" />
    <title>Twitty | User Profile</title>

    <!-- Bootstrap Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Jquery Link -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <style>
        body {
            overflow-x: hidden;
        }
        .hide {
            display: none;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <a class="link text-white" style="text-decoration:none;" href="https://shivamv12.github.io/" target="_blank"><i class="fa fa-spinner fa-spin"></i> Shivam V.</a>
        <!-- <a class="navbar-brand" href="{{route('home')}}">Aflog.in</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            
        </div>
    </nav>
    <div class="row mt-4 text-center">
        @if($service == 'facebook')
            <div class="col-md-10 offset-md-1">
                <img style="border-radius: 50%;" src="{{ $details->avatar }}" class="img img-circle">
            </div>
            <div class="col-md-10 offset-md-1 mt-5">
                <div class="row">
                    <div class="col-md-6 text-left text-secondary">
                        <div class="title m-b-md h5">
                            Warm Welcome from Twitty <sup><img height="20px;" src="https://media.giphy.com/media/sQq7yFgt5O8tW/giphy.gif"></sup><br/>
                        </div>
                        <i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;{{ $details->user['name']}} <br/> <i class="fa fa-envelope"></i>&nbsp;&nbsp;{{ $details->user['email'] }}
                    </div>
                    <div class="col-md-5 mt-3">
                        <input type="text" class="form-control" placeholder="Enter key to Search." id="twitterSeaarch">
                    </div>
                    <div class="col-md-1 mt-3">
                        <div id="searchBtn" class="btn btn-secondary"><i class="fa fa-search"></i></div>
                    </div>
                </div>
            </div>
        @endif
    </div><hr />
    <div class="row">
        <div class="col-md-10 hide offset-md-1 table-responsive">
            <table class="table table-hover table-striped">
                <thead><tr><th>Tweet</th><th>Tweet By</th><th>Sentiments</th></tr></thead>
                <tbody id="tweetData"></tbody>
            </table>
        </div>
    </div>
</body>

<script>
    $(document).ready(function () {
        $('#searchBtn').on('click', function () {
            var key = $('#twitterSeaarch').val();
            $.ajax({
                url : '{{ route("tweet") }}',
                type : 'get',
                data : {
                    "_token" : '{{ csrf_token() }}',
                    "key" : key
                },
                success : function (res) {
                    let row;
                    let complete = JSON.parse(res);
                    complete.forEach(data => {
                        row += '<tr><td style="width: 75%;">' + data.text + '</td><td style="width: 40%;"><div class="row"><div class="col-md-2"><img src="' +data.user['profile_image_url']+ '" height="30px"></div><div class="col-md-10">' + data.user['name'] + '</div></td><td style="width: 10%;">'; // + data.sentims + '</td></tr>';
                        if(data.sentims == 'positive') {
                            row += '<i class="fa fa-smile-o fa-2x text-success"></i><br/>' + data.sentims;
                        } else if(data.sentims == 'negative') {
                            row += '<i class="fa fa-frown-o fa-2x text-danger"></i><br/>' + data.sentims;
                        } else if(data.sentims == 'neutral') {
                            row += '<i class="fa fa-meh-o fa-2x text-warning"></i><br/>' + data.sentims;
                        }
                        row +=  '</td></tr>';
                    });
                    $('.hide').css('display','inline');
                    $('#tweetData').html(row);
                }
            });
        });
    });
</script>
</html>

