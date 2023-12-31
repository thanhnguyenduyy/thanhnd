<!DOCTYPE html>
<html>
<head>
    <title>Bảng xếp hạng</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="title-bxh">
            <h1>Bảng xếp hạng</h1>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Ranking</th>
                    <th scope="col">Player</th>
                    <th scope="col">Number of matches</th>
                    <th scope="col">Wins | Losses</th>
                    <th scope="col">TotalPoints </th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                $count = 1;
                @endphp

                @foreach ($members as $members)
                <tr>
                @if ($count == 1)
                        <td scope="row"><span class="rank-icon gold"><i class="fas fa-trophy"></i></span>{{$i++}}</td>
                @elseif ($count == 2)
                        <td scope="row"><span class="rank-icon silver"><i class="fas fa-trophy"></i></span>{{$i++}}</td>
                @elseif ($count == 3)
                        <td scope="row"><span class="rank-icon bronze"><i class="fas fa-trophy"></i></span>{{$i++}}</td>
                @endif

                @if ($count > 3)
                    <td scope="row"><span class="rank-icon"><i class="fas fa-star"></i></span>{{$i++}}</td>
                @endif
                    <td>
                        <img src="{{ asset('uploads/members/'.$members->images) }}" width="70px" height="50px" alt="Image">
                        <div style="float: right; width: 65%; text-align: left;"><span>{{ $members->member_name }}</span></div>
                    </td>
                    <td>{{ $members->match_count }}</td>
                    <td>{{$members->wins}} | {{$members->losses}}</td>
                    <td>{{ $members->total_points }}</td>
                </tr>
                @php
                    $count++;
                @endphp
                @endforeach
            </tbody>
    </div>
    </table>
</body>
</html>