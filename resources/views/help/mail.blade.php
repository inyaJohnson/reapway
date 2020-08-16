<html>

<body
    style="background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;"
>

<table
    border="0"
    cellpadding="0"
    cellspacing="0"
    style="border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%;
        background-color: #f6f6f6;"
>

    <tr>
        <td
            style="font-family: sans-serif;
            font-size: 14px;
            vertical-align: top;"
        >&nbsp;
        </td>

        <td
            style="font-family: sans-serif;
            font-size: 14px;
            vertical-align: top;
            display: block;
            margin: 0 auto;
            max-width: 880px;
            padding: 10px;
            width: 680px;"
        >

            <div
                style="box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 880px;
            padding: 10px;"
            >

                <!-- START CENTERED WHITE CONTAINER -->
                <span
                    style="color: transparent;
                display: none; height: 0;
                max-height: 0; max-width: 0;
                opacity: 0; overflow: hidden;
                mso-hide: all;
                visibility: hidden;
                width: 0;">
                <!-- Sales Ruby Header Text  -->
            </span>

                <table
                    style="border-collapse: separate;
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
                width: 100%;
                background: #ffffff;
                border-radius: 3px;"
                >

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td
                            style="
                    font-family: Verdana;
                    font-size: 14px;
                    vertical-align: top;
                    box-sizing: border-box;
                    padding: 50px;"
                        >

                            <table
                                border="0"
                                cellpadding="0"
                                cellspacing="0"
                                style="border-collapse: separate;
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                    width: 100%;"
                            >

                                <tr>
                                    <td
                                        style="font-family: Verdana;
                        font-size: 14px;
                        vertical-align: top;"
                                    >
                                        <p
                                            style="
                            font-family: Arial;
                            font-style: italic;
                            font-size: 12px;
                            text-align: center;
                            font-weight: 600;
                            margin: 0;
                            margin-bottom: 50px;
                            "
                                        ><img src="{{asset('template/images/mail/logo.png')}}" class="logo"
                                              style=" width: 150px;
                                            margin-left: auto;
                                            margin-right: auto;
                                            padding: 0 0 10px;
                                            display: block;"
                                            >Your search for quality stops right here
                                        </p>
                                        <h4 style="font-family: Verdana;
                            font-size: 14px;
                            font-weight: bold;
                            margin: 0;
                            margin-bottom: 15px;">Mail Subject - {{$data['subject']}}</h4>
                                        <p style="font-family: Verdana;
                            font-size: 14px;
                            font-weight: normal;
                            margin: 0;
                            margin-bottom: 15px;">{{$data['message']}}</p>
                                        <p
                                            style="font-family: Verdana;
                            font-size: 14px;
                            font-weight: normal;
                            margin: 0; margin-bottom: 15px;"
                                        >
                                            This message was sent by {{$data['name']}}  <br />
                                            with email <a href="mailto:{{$data['email']}}">{{$data['email']}}</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>
                <!-- START FOOTER -->
                <div
                    style="
                clear: both;
                /*margin-top: 50px;  */
                padding: 30px 0;
                text-align: center;
                width: 100%;
                background: #1a1a1a;
                border-radius: 3px
                ;"
                >
                    <table
                        border="0"
                        cellpadding="0"
                        cellspacing="0"
                        style="border-collapse: separate;
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
                width: 100%;"
                    >
                        <tr>
                            <td
                                style="
                    font-family: Verdana;
                    vertical-align: top;
                    padding-bottom: 10px;
                    padding-top: 10px;
                    font-size: 12px;
                    color: #aaaaaa;
                    text-align: center
                    ;">

                    <span
                        style="color: #aaaaaa;
                        font-size: 12px;
                        text-align: center;
                        "
                    >
			 Oregun, Ikeja, Lagos State, Nigeria.
                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="
                    font-family: Verdana;
                    vertical-align: top;
                    padding-bottom: 10px;
                    font-size: 12px;
                    color: #aaaaaa;
                    text-align: center;">
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="
                    font-family: Verdana;
                    /*justify-content: center;*/
                    text-align: center;
                    padding-top: 20px;
                    padding-bottom: 10px;
                    font-size: 12px; ">

                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END FOOTER -->

                <!-- END CENTERED WHITE CONTAINER -->
            </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
    </tr>
</table>
</body>
</html>
