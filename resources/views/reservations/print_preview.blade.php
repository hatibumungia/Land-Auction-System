<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Print Preview</title>

    <style>
        body {
            font-family: "Times New Roman";
        }

        hr {
            border: solid #000 1px;
        }

        .contacts-div {
            background-color: #FF00CC;
            color: #FFF;
            padding: 10px 0 10px 0;
            text-align: center;
            font-size: 15px;
            margin-top: 120px;
        }
        .header-div {
            width: auto;
            height: 120px;
            position: block;
            float: right;
        }

        .header-content-div {
            width: 20%;
            height: 120px;
            float: right;
            position: block;
        }
        .header-content-div1 {
            width: 20%;
            height: 100px;
            position: block;
            float: left;
        }
        .header-content-div2 {
            width: 20%;
            height: 100px;
            position: block;
            float: left;
            padding-left: 45%;
        }
        .photo-date {
            width: 200px;
            height: 180px;
            float: right;
            padding-top: 0.5%;
        }
        .header-content-div-photo {
            width: 120px;
            height: 150px;
            padding-left: 39%;
            padding-top: 0.5%;
        }
         .header-content-div-date {
            width: 200px;
            height: 20px;
            padding-left: 0%;
            text-align: right;
        }
        .uppercase { 
            text-transform: uppercase; 
        }
        .yah-header {
            text-align: center;
        }
    
    </style>

</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="header-div">
                <div class="header-content-div1">
                    <strong>
                        CAPITAL<br>
                        DEVELOPMENT<br>
                        AUTHORITY, <br>
                        P.O.BOX 1 &amp; 913,<br>
                        DODOMA.
                    </strong>
                </div>
                <div class="header-content-div2">
                    <img src="/public/img/logo.png">
                </div>
                <div class="header-content-div">
                    <strong>
                        MAMLAKA <br>
                        YA USTAWISHAJI<br>
                        MAKAO MAKUU<br>
                        S.L.P 1 &amp; 913<br>
                        DODOMA
                    </strong>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-12 text-center contacts-div">
                    Telephone +255 26 2324053/2321569 Fax +255 26 232348/2322650 E-mail: info @cda.go.tz website
                    www.cda.go.tz
                </div>
            </div>
            <div class="photo-date">
                    <div class="col-sm-4 header-content-div-date">
                    Tarehe&nbsp;&nbsp;&nbsp;<strong>{{ date('d/m/Y', strtotime($data[0]->created_at)) }}</strong>
                </div>
                <div class="header-content-div-photo">
                    <img src="../public/img/uploads/avatars/{{ $data[0]->photo }}" height=150 width=120>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-8">
                    <strong>Kumb. Na. CDA/ED/LA-15/</strong>..............................
                </div> 
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    Ndugu&nbsp;&nbsp;<strong>{{ $data[0]->first_name }}&nbsp;&nbsp;{{ $data[0]->middle_name }}&nbsp;&nbsp;{{ $data[0]->last_name }}</strong>
                    <br>
                    S.L.P {{ $data[0]->address }}<br>
                    {{ $data[0]->region }}.
                </div>
            </div>
            <br><br><br>
            <div class="row text-center">
                <div class="col-sm-12 yah-header">
                    <u class="text-uppercase">
                        Yah:&nbsp;KUPEWA KIWANJA NA.&nbsp;
                        <strong>{{ $data[0]->plot_no }}</strong>&nbsp;
                        KITALU&nbsp;<strong>{{ $data[0]->block }}</strong>&nbsp;
                        ENEO LA &nbsp;<strong class="uppercase">{{ $data[0]->location }}</strong>&nbsp;
                        MANISPAA YA DODOMA
                    </u>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <p>
                        Tunachukua fursa hii kukutaarifu kwamba Mamlaka ya Ustawishaji Makao Makuu imekupatia
                        kiwanja
                        kilichotajwa hapo juu kwa masharti yafuatayo
                    </p>
                    <p>
                    <ol>
                        <li>
                            Umefaninikiwa kupewa kiwanja hiki chenye ukubwa wa mita za mraba
                            <strong>{{ $data[0]->size }}</strong>
                            Jumla
                            ya <strong>Tsh {{ number_format($data[0]->total_price) }}</strong> zikiwa ni sawa na Tsh
                            <strong>{{ $data[0]->price }}</strong> kwa kila meta moja ya
                            mraba.
                            Malipo
                            hayo ni kwaajili ya gharama za upimaji wa kiwanja, ada ya kuandaa hati, ada ya
                            michoro pamoja na ufunguaji wa barabara. Malipo haya yanatakiwa kukamilishwa
                            ndani
                            ya miezi sita (<strong>6</strong>) kuanzia tarehe ya barua hii. Malipo yafanywe
                            katika bank ya
                            <strong>CRDB</strong>
                            Akaunti Na. <strong>01J1081511100</strong> . Risiti ya Benki iwasilishwe katika
                            Ofisi Mamlaka kwa
                            ajili
                            ya kukatiwa Stakabadhi.
                        </li>
                        <br>
                        <li>
                            Kwa yeyote atakayeshindwa kukamilisha malipo katika muda uliopangwa fedha yake
                            itarudishwa
                            pungufu asilimia kumi (<strong>10%</strong>). Na kiwanja hicho kitatolewa kwa mtu
                            mwingine bila
                            tarrifa
                            Zaidi
                            kwake.
                        </li>
                        <br>
                        <li>
                            Ukimaliza kulipia gharama zilizotajwa hapo juu utakamilishwa kiwanja hiki rasmi.
                        </li>
                    </ol>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p>
                        Wako,<br>
                        <strong>MAMLAKA YA USTAWISHAJI MAKAO MAKUU</strong><br>
                        ---------------------------------------------<br>
                        Masawika F. Kachenje <br>
                        Kaimu Mkurugenzi wa Milki Ardhi<br>
                        <strong>Kny: <u>MKURUGENZI MKUU</u></strong><br><br>
                        HMS/AIC/an <br>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <hr>
                    <i>Correspondence should be addressed to the Director - General</i>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>