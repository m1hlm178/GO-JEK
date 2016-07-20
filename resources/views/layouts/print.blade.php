<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Print Visitor Tag</title>
    {{ Html::style('assets/css/email.css') }}
</head>
<body>
<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-block">
                                        {{ Html::image('assets/image/login.png', 'Logo', array('class' => 'img-responsive center-block')) }}
                                        <h2 style="COLOR:RED">VISITOR</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tr align="center">
                                                            <h1 align="center">{{$data->name}}</h1>
                                                        </tr>
                                                        <tr class="total">
                                                            <td align="center"><img src="data:image/png;base64,{{$data->barcode}}" alt="barcode" /></td>
                                                            <!-- <td class="alignright" width="80%">Total</td> -->
                                                            <!-- <td class="alignright">$ 36.00</td> -->
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        GO-Jek Company
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div class="footer">
                </div></div>
        </td>
        <td></td>
    </tr>
</table>
</body>
  <script type="text/javascript">
    setTimeout(function () { window.print(); }, 500);
    window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
  </script>
</html>