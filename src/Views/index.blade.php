<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Tahoma, sans-serif;
        }
        .wrapper{
            width: 85%;
            margin: 50px auto;
            /*background-color: #d6d6d6;*/
        }
        form{
            margin: 30px auto;
            width: 50%;
            display: flex;
            justify-content: space-between;
        }
        input[type=text]{
            width: 80%;
            height: 30px;
            border-radius: 3px;
            border: transparent;
            padding-left: 5px;
            background-color: #e0e0e0;
        }
        input[type=submit]{
            /*margin-left: auto;*/
            width: 15%;
            border-radius: 3px;
            font-size: 14px;
            color: #fff;
            background: #6c7ae0;
            border-color: transparent;
            cursor: pointer;
        }
        table{
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
            table-layout: fixed;
            word-break: break-word;
        }
        /*th:not(:last-child){*/
        /*border-right: 1px solid #ffffff;*/
        /*}*/
        table{
            width: 100%;
            border-radius: 4px;
            box-shadow: 0 0 30px #999;
        }
        thead{
            background-color: #6c7ae0;
            color: white;
            font-size: 13px;
            text-align: left;
        }
        tr{
            height: 50px;
        }
        tr > th:first-child, td:first-child{
            padding-left: 5px;
            width: 5%;
            text-align: center;
        }
        tr > th:nth-child(2){
            width: 15%;
            text-align: left;
        }
        tr > th, td{
            width: calc(80%/9);
            padding-left: 5px;
            padding-right: 5px;
        }
        tr > td {
            color: #808080;
            font-size: 12px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        tbody > tr:nth-child(2n){
            background-color: #f8f6ff;
        }
        tbody > tr:hover{
            background-color: #dcdae2;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <form action="{{ route('searchPath') }}" method="post">
        @csrf
        <input type="text" placeholder="Please enter your path" name="pathPage" required>
        <input type="submit" value="Submit">
    </form>
    <table>
        <thead>
        <tr>
            <th>
                STT
            </th>
            <th>
                Page
            </th>
            <th>
                Page views
            </th>
            <th>
                Unique page views
            </th>
            <th>
                Time on site
            </th>
            <th>
                Number of visit
            </th>
            <th>
                Exit rate
            </th>
            <th>
                Exit
            </th>
            <th>
                Page value
            </th>
        </tr>
        </thead>
        <tbody>
        @if(count($rows) > 0)
            @foreach($rows as $key =>$row)
                <tr>
                    <td>
                        {{$key + 1}}
                    </td>
                    <td width="15%">
                        {{ $row['page_path'] }}
                    </td>
                    <td>
                        {{ $row['page_view'] }}
                    </td>
                    <td>
                        {{ $row['unique_page_view'] }}
                    </td>
                    <td>
                        {{ $row['time_page'] }}
                    </td>
                    <td>
                        {{ $row['entrance'] }}
                    </td>
                    <td>
                        {{ $row['exit_rate'] }}
                    </td>
                    <td>
                        {{ $row['exits'] }}
                    </td>
                    <td>
                        {{ $row['page_value'] }}
                    </td>

                </tr>
            @endforeach
            @else
            <tr><td style="text-align: center" colspan="9">Data is not found </td></tr>
        @endif
        </tbody>
    </table>
</div>
</body>
</html>