<meta charset="UTF-8">
<link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
<style>
    * {box-sizing: border-box;}
    html {height: 100%;}
    body {
        position: relative;
        height: 100%;
        font-weight: 300;
        font-size: 17px;
        color:#000;
    }
    button, select, input {
        font-family: 'Roboto', sans-serif;
        font-size: 17px;
    }
    .pdf {
        position: absolute;
        left:0; right:0;
        /* top: 10px; */
        margin: auto;
        /* width: 600px; */
        border-radius: 4px;
        background: #fff;
        overflow: hidden;
    }
    .pdf-header {
        padding: 20px 15px;
        text-align:center;
        position: relative;
    }
    .pdf-title {
        padding: 0px 40px;
        text-align: left;
        font-size: 36px;
    }
    .pdf-body {
        background-color: #f9f9f9;
    }
    .pdf-row {
        margin:0;
        padding: 7px 40px;
        list-style: none;
    }
    .profile-column {
        background-color: #cacaca;
        margin-bottom: 15px; 
    }
    .pdf-row:after {
        content: '';
        display: table;
        clear:both;
    }
    .pdf-row li {
        display:inline-block;
        vertical-align: middle;
        float: left;
    }
    .report-header {
        color: #FFF;
        background-color: #838282;
        text-align: center;
        padding: 20px 40px;
    }
    .column-offset{
        width: 10%;
    }
    .report-header-track {
        color: #fff;
        min-width: 54px;
        text-align: left;
        margin-left: 20%;
        width: 60%;
    }
    .report-header-title {
        font-weight: bold;
        text-align: left;
        margin-left: 1%;
        width: 20%;
        min-width: 80px;
    }
    .profile-title{
        color: #000;
        font-size: 26px;
        min-width: 54px;
        text-align: center;
        width: 15%;
    }
    .profile-fields {
        width: 18%;
        min-width: 160px;
        font-size: 18px;
        font-weight: normal;
        padding-top: 3px;
    }
    .guiz-awards-subtitle {
        color: #333;
        font-size: 14px;
        font-weight: 300;
    }
    .report-header-track {
        width: 22%;
        min-width: 80px;
    }
</style>
<div class="pdf">
    <div class="pdf-header">
        <div class="pdf-title">Report {{$report->id_report}}</div>
    </div>
    <div class="pdf-body">
        <div class="gui-window">
            <ul class="pdf-row report-header">
                <li class="report-header-title">Title:</li>
                <li class="report-header-track">{{$report->title}}</li>
            </ul>
            <ul class="pdf-row report-header">
                <li class="report-header-title">Description:</li>
                <li class="report-header-track">{{$report->description}}</li>
            </ul>
            <ul class="pdf-row">
                <li class="profile-title">Profiles</li>
                <li class="profile-fields">&nbsp;</li>
                <li class="profile-fields">&nbsp;</li>
                <li class="profile-fields">&nbsp;</li>
                <li class="profile-fields">&nbsp;</li>
            </ul>
            <ul class="pdf-row">
                <li class="column-offset">&nbsp;</li>
                <li class="profile-fields">
                    First Name
                </li>
                <li class="profile-fields">
                    Last Name
                </li>
                <li class="profile-fields">
                    Gender
                </li>
                <li class="profile-fields">
                    Date Of Birth
                </li>
            </ul>
            {{dd($report->profiles)}}
            @foreach($report->profiles as $profile)
            <ul class="pdf-row">
                <li class="column-offset">&nbsp;</li>
                <li class="profile-fields">
                    <div class="guiz-awards-subtitle">
                        {{$profile->first_name}}
                    </div>
                </li>
                <li class="profile-fields">
                    <div class="guiz-awards-subtitle">
                        {{$profile->last_name}}
                    </div>
                </li>
                <li class="profile-fields">
                    <div class="guiz-awards-subtitle">
                        {{$profile->dbo}}
                    </div>
                </li>
                <li class="profile-fields">
                    <div class="guiz-awards-subtitle">
                        {{$profile->gender_name}}
                    </div>
                </li>
            </ul>
            @endforeach
        </div>
    </div>
</div>
