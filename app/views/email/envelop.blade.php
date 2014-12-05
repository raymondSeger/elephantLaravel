<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','Vere Vita Jaya')</title>
</head>
<body>

<div>
    <table bgcolor="#fff"
           style="font-family:'Helvetica Neue',Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0px;width:100%;margin:0px;padding:0px;background-color:transparent">
        <tbody>
        <tr style="margin:0;padding:0">
            <td style="margin:0;padding:0"></td>
            <td style="display:block;max-width:600px!important;clear:both;margin:0 auto;padding:0">
                <div
                    style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:15px;border-color:#e7e7e7;border-style:solid;border-width:1px 1px 0">
                    <table bgcolor="#fff"
                           style="font-family:'Helvetica Neue',Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0px;width:100%;margin:0px;padding:0px;background-color:transparent">
                        <tbody>
                        <tr style="margin:0;padding:0">
                            <td style="margin:0;padding:0"><img
                                    src="{{ asset('asset/img/email_logo_black.png') }}"
                                    style="max-width:100%;margin:0;padding:0" class="CToWUd"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
            <td style="margin:0;padding:0"></td>
        </tr>
        </tbody>
    </table>


    <table
        style="font-family:'Helvetica Neue',Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0px;width:100%;margin:0px;padding:0px;background-color:transparent"
        bgcolor="transparent">
        <tbody>
        <tr style="margin:0;padding:0">
            <td style="margin:0;padding:0"></td>
            <td style="display:block;max-width:600px!important;clear:both;margin:0 auto;padding:0">
                <div
                    style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:0;border:0 solid #e7e7e7">
                    <table bgcolor="#fff"
                           style="font-family:'Helvetica Neue',Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0px;width:100%;margin:0px;padding:0px;background-color:transparent">
                        <tbody>
                        <tr style="margin:0;padding:0">
                            <td height="4" bgcolor="#eeb211"
                                style="background-color:#25aae1;line-height:4px;font-size:4px;margin:0;padding:0">
                                &nbsp;</td>
                            <td height="4" bgcolor="#d50f25"
                                style="background-color:#1f92c3;line-height:4px;font-size:4px;margin:0;padding:0">
                                &nbsp;</td>
                            <td height="4" bgcolor="#3369E8"
                                style=" background-color:#1d7ca5;line-height:4px;font-size:4px;margin:0;padding:0">
                                &nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
            <td style="margin:0;padding:0"></td>
        </tr>
        </tbody>
    </table>


    <table
        style="font-family:'Helvetica Neue',Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0px;width:100%;margin:0px;padding:0px;background-color:transparent"
        bgcolor="transparent">
        <tbody>
        <tr style="margin:0;padding:0">
            <td style="margin:0;padding:0"></td>
            <td bgcolor="#FFFFFF" style="display:block;max-width:600px!important;clear:both;margin:0 auto;padding:0">
                <div
                    style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:30px 15px;border:1px solid #e7e7e7">
                    <table
                        style="font-family:'Helvetica Neue',Helvetica,Helvetica,Arial,sans-serif;max-width:100%;border-collapse:collapse;border-spacing:0px;width:100%;margin:0px;padding:0px;background-color:transparent"
                        bgcolor="transparent">
                        <tbody>
                        <tr style="margin:0;padding:0">

                             @yield ('contentEmail')

                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
            <td style="margin:0;padding:0"></td>
        </tr>
        </tbody>
    </table>


    <table
        style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;clear:both;background-color:transparent;margin:0 0 60px;padding:0"
        bgcolor="transparent">
        <tbody>
        <tr style="margin:0;padding:0">
            <td style="margin:0;padding:0"></td>
            <td style="display:block;max-width:600px!important;clear:both;margin:0 auto;padding:0">
                <div
                    style="max-width:600px;display:block;border-collapse:collapse;background-color:#f7f7f7;margin:0 auto;padding:20px 15px;border-color:#e7e7e7;border-style:solid;border-width:0 1px 1px">
                    <table width="100%"
                           style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0"
                           bgcolor="transparent">
                        <tbody style="margin:0;padding:0">
                        <tr style="margin:0;padding:0">
                            <td valign="top" width="28" style="margin:0;padding:0 10px 0 0">
                            <td valign="top" style="margin:0;padding:0">
                                <div style="color:#91908e;font-size:10px;line-height:150%;font-weight:normal;margin:0px;padding:0px">
                                    <a rel="nofollow" href="http://www.vitajaya.com" style="color:#25aae1;text-decoration:none;margin:0;padding:0" target="_blank">Vere Vita Jaya</a>.
                                    Copyright &copy; {{ date('Y');}}  / {{ Lang::Get('static.homeFooter_P') }}<br style="margin:0;padding:0">
                                    @if (isset($user_id))
                                    <unsubscribe>{{link_to_action('UserController@unsubscribed', Lang::get('Unsubscribe'), [$user_id] );}}</unsubscribe>
                                    @endif
                                    <br style="margin:0;padding:0">
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
            <td style="margin:0;padding:0"></td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>