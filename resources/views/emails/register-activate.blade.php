{{--@extends('emails/layouts/default')--}}

{{--@section('content')--}}
{{--<p>Hello {!! $user->first_name !!},</p>--}}

{{--<p>Welcome to @lang('general.site_name')! Please click on the following link to confirm your @lang('general.site_name') account:</p>--}}

{{--<p><a href="{!! $activationUrl !!}">{!! $activationUrl !!}</a></p>--}}

{{--<p>Best regards,</p>--}}

{{--<p>@lang('general.site_name') Team</p>--}}
{{--@stop--}}


<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <!-- NAME: SOFT -->
    <!--[if gte mso 15]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>*|SUBJECT|*</title>

    <style type="text/css">
        p{
            margin:10px 0;
            padding:0;
        }
        table{
            border-collapse:collapse;
        }
        h1,h2,h3,h4,h5,h6{
            display:block;
            margin:0;
            padding:0;
        }
        img,a img{
            border:0;
            height:auto;
            outline:none;
            text-decoration:none;
        }
        body,#bodyTable,#bodyCell{
            height:100%;
            margin:0;
            padding:0;
            width:100%;
        }
        #outlook a{
            padding:0;
        }
        img{
            -ms-interpolation-mode:bicubic;
        }
        table{
            mso-table-lspace:0pt;
            mso-table-rspace:0pt;
        }
        .ReadMsgBody{
            width:100%;
        }
        .ExternalClass{
            width:100%;
        }
        p,a,li,td,blockquote{
            mso-line-height-rule:exactly;
        }
        a[href^=tel],a[href^=sms]{
            color:inherit;
            cursor:default;
            text-decoration:none;
        }
        p,a,li,td,body,table,blockquote{
            -ms-text-size-adjust:100%;
            -webkit-text-size-adjust:100%;
        }
        .ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
            line-height:100%;
        }
        a[x-apple-data-detectors]{
            color:inherit !important;
            text-decoration:none !important;
            font-size:inherit !important;
            font-family:inherit !important;
            font-weight:inherit !important;
            line-height:inherit !important;
        }
        a.mcnButton{
            display:block;
        }
        .mcnImage{
            vertical-align:bottom;
        }
        .mcnTextContent{
            word-break:break-word;
        }
        .mcnTextContent img{
            height:auto !important;
        }
        .mcnDividerBlock{
            table-layout:fixed !important;
        }
        /*
        @tab Page
	@section background style
	@tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
	*/
        body,#bodyTable,#templateFooter{
            /*@editable*/background-color:#EDF1F3;
        }
        /*
        @tab Page
	@section background style
	@tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
	*/
        #bodyCell{
            /*@editable*/border-top:0;
        }
        /*
        @tab Page
	@section heading 1
	@tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
	@style heading 1
	*/
        h1{
            /*@editable*/color:#00535E !important;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:26px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:normal;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            /*@editable*/text-align:left;
        }
        /*
        @tab Page
	@section heading 2
	@tip Set the styling for all second-level headings in your emails.
	@style heading 2
	*/
        h2{
            /*@editable*/color:#404448 !important;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:20px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            /*@editable*/text-align:left;
        }
        /*
        @tab Page
	@section heading 3
	@tip Set the styling for all third-level headings in your emails.
	@style heading 3
	*/
        h3{
            /*@editable*/color:#404448 !important;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:18px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            /*@editable*/text-align:left;
        }
        /*
        @tab Page
	@section heading 4
	@tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
	@style heading 4
	*/
        h4{
            /*@editable*/color:#404448 !important;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:16px;
            /*@editable*/font-style:normal;
            /*@editable*/font-weight:bold;
            /*@editable*/line-height:125%;
            /*@editable*/letter-spacing:normal;
            /*@editable*/text-align:left;
        }
        /*
        @tab Preheader
	@section preheader style
	@tip Set the background color and borders for your email's preheader area.
	*/
        #templatePreheader{
            /*@editable*/background-color:#FFFFFF;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:1px solid #E3E5E6;
        }
        /*
        @tab Preheader
	@section preheader text
	@tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
	*/
        .preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{
            /*@editable*/color:#ABB0B3;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:12px;
            /*@editable*/line-height:125%;
            /*@editable*/text-align:left;
        }
        /*
        @tab Preheader
	@section preheader link
	@tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
	*/
        .preheaderContainer .mcnTextContent a{
            /*@editable*/color:#ABB0B3;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Header
	@section header style
	@tip Set the background color and borders for your email's header area.
	*/
        #templateHeader{
            /*@editable*/background-color:#EDF1F3;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Header
	@section header text
	@tip Set the styling for your email's header text. Choose a size and color that is easy to read.
	*/
        .headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{
            /*@editable*/color:#ABB0B3;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:18px;
            /*@editable*/line-height:150%;
            /*@editable*/text-align:center;
        }
        /*
        @tab Header
	@section header link
	@tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
	*/
        .headerContainer .mcnTextContent a{
            /*@editable*/color:#ABB0B3;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Body
	@section body style
	@tip Set the background color and borders for your email's body area.
	*/
        #templateBody{
            /*@editable*/background-color:#EDF1F3;
            /*@editable*/border-top:0;
            /*@editable*/border-bottom:0;
        }
        /*
        @tab Body
	@section body container
	@tip Set the background color and border radius for your email's body container. [Note: Border radius is not supported in all email clients.]
	*/
        #bodyBackground{
            /*@tab Body
@section body container
@tip Set the background color and border radius for your email's body container. [Note: Border radius is not supported in all email clients.]*/border-collapse:separate !important;
            /*@editable*/background-color:#FFFFFF;
            /*@editable*/border:1px solid #E3E5E6;
            /*@editable*/border-radius:6px;
        }
        /*
        @tab Body
	@section body text
	@tip Set the styling for your email's body text. Choose a size and color that is easy to read.
	*/
        .bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{
            /*@editable*/color:#ABB0B3;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:18px;
            /*@editable*/line-height:150%;
            /*@editable*/text-align:left;
        }
        /*
        @tab Body
	@section body link
	@tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
	*/
        .bodyContainer .mcnTextContent a{
            /*@editable*/color:#404448;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        /*
        @tab Footer
	@section footer text
	@tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
	*/
        .footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{
            /*@editable*/color:#ABB0B3;
            /*@editable*/font-family:Helvetica;
            /*@editable*/font-size:12px;
            /*@editable*/line-height:125%;
            /*@editable*/text-align:center;
        }
        /*
        @tab Footer
	@section footer link
	@tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
	*/
        .footerContainer .mcnTextContent a{
            /*@editable*/color:#ABB0B3;
            /*@editable*/font-weight:normal;
            /*@editable*/text-decoration:underline;
        }
        @media only screen and (max-width: 480px){
            body,table,td,p,a,li,blockquote{
                -webkit-text-size-adjust:none !important;
            }

        }	@media only screen and (max-width: 480px){
            body{
                width:100% !important;
                min-width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            .templateContainer{
                max-width:600px !important;
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnImage{
                height:auto !important;
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnCaptionTopContent,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer{
                max-width:100% !important;
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnBoxedTextContentContainer{
                min-width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnImageGroupContent{
                padding:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
                padding-top:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnImageCardTopImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
                padding-top:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnImageCardBottomImageContent{
                padding-bottom:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnImageGroupBlockInner{
                padding-top:0 !important;
                padding-bottom:0 !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnImageGroupBlockOuter{
                padding-top:9px !important;
                padding-bottom:9px !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnTextContent,.mcnBoxedTextContentColumn{
                padding-right:18px !important;
                padding-left:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
                padding-right:18px !important;
                padding-bottom:0 !important;
                padding-left:18px !important;
            }

        }	@media only screen and (max-width: 480px){
            .mcpreview-image-uploader{
                display:none !important;
                width:100% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
	@section heading 1
	@tip Make the first-level headings larger in size for better readability on small screens.
	*/
            h1{
                /*@editable*/font-size:24px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
	@section heading 2
	@tip Make the second-level headings larger in size for better readability on small screens.
	*/
            h2{
                /*@editable*/font-size:20px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
	@section heading 3
	@tip Make the third-level headings larger in size for better readability on small screens.
	*/
            h3{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
	@section heading 4
	@tip Make the fourth-level headings larger in size for better readability on small screens.
	*/
            h4{
                /*@editable*/font-size:16px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
	@section Boxed Text
	@tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
            .mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
	@section Preheader Visibility
	@tip Set the visibility of the email's preheader on small screens. You can hide it to save space.
	*/
            #templatePreheader{
                /*@editable*/display:block !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
	@section Preheader Text
	@tip Make the preheader text larger in size for better readability on small screens.
	*/
            .preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{
                /*@editable*/font-size:14px !important;
                /*@editable*/line-height:115% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
	@section Header Text
	@tip Make the header text larger in size for better readability on small screens.
	*/
            .headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
	@section Body Text
	@tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
            .bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{
                /*@editable*/font-size:18px !important;
                /*@editable*/line-height:125% !important;
            }

        }	@media only screen and (max-width: 480px){
            /*
            @tab Mobile Styles
	@section footer text
	@tip Make the body content text larger in size for better readability on small screens.
	*/
            .footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{
                /*@editable*/font-size:14px !important;
                /*@editable*/line-height:115% !important;
            }

        }</style></head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
<center>
    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
        <tr>
            <td align="center" valign="top" id="bodyCell">
                <!-- BEGIN TEMPLATE // -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN PREHEADER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templatePreheader">
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer">
                                            <tr>
                                                <td valign="top" class="preheaderContainer" style="padding-top:9px; padding-bottom:9px;"><table class="mcnTextBlock" style="min-width:100%;" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody class="mcnTextBlockOuter">
                                                        <tr>
                                                            <td class="mcnTextBlockInner" valign="top">

                                                                <table class="mcnTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="366">
                                                                    <tbody><tr>

                                                                        <td class="mcnTextContent" style="padding-top:9px; padding-left:18px; padding-bottom:9px; padding-right:0;" valign="top">

                                                                            Use this area to offer a short preview of your email's content.
                                                                        </td>
                                                                    </tr>
                                                                    </tbody></table>

                                                                <table class="mcnTextContentContainer" align="right" border="0" cellpadding="0" cellspacing="0" width="197">
                                                                    <tbody><tr>

                                                                        <td class="mcnTextContent" style="padding-top:9px; padding-right:18px; padding-bottom:9px; padding-left:18px;" valign="top">

                                                                            <a href="*|ARCHIVE|*" target="_blank">View this email in your browser</a>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody></table>

                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END PREHEADER -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN HEADER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader">
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer">
                                            <tr>
                                                <td valign="top" class="headerContainer" style="padding-top:9px; padding-bottom:9px;"><table class="mcnImageBlock" style="min-width:100%;" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody class="mcnImageBlockOuter">
                                                        <tr>
                                                            <td style="padding:9px" class="mcnImageBlockInner" valign="top">
                                                                <table class="mcnImageContentContainer" style="min-width:100%;" align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tbody><tr>
                                                                        <td class="mcnImageContent" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0;" valign="top">


                                                                            <img alt="" src="http://gallery.mailchimp.com/27aac8a65e64c994c4416d6b8/images/yoga_logo.png" style="max-width:185px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage" align="left" width="185">


                                                                        </td>
                                                                    </tr>
                                                                    </tbody></table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END HEADER -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN BODY // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody">
                                <tr>
                                    <td align="center" valign="top" class="mobilePaddingRL5" style="padding-top:9px; padding-bottom:9px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="bodyBackground" class="templateContainer">
                                            <tr>
                                                <td align="center" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td valign="top" class="bodyContainer" style="padding-top:9px; padding-bottom:9px;"><table class="mcnTextBlock" style="min-width:100%;" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tbody class="mcnTextBlockOuter">
                                                                    <tr>
                                                                        <td class="mcnTextBlockInner" valign="top">

                                                                            <table style="min-width:100%;" class="mcnTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                <tbody><tr>

                                                                                    <td class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;" valign="top">

                                                                                        <h1><strong>Test Template</strong></h1>

                                                                                    </td>
                                                                                </tr>
                                                                                </tbody></table>

                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table><table class="mcnTextBlock" style="min-width:100%;" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tbody class="mcnTextBlockOuter">
                                                                    <tr>
                                                                        <td class="mcnTextBlockInner" valign="top">

                                                                            <table style="min-width:100%;" class="mcnTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                <tbody><tr>

                                                                                    <td class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;" valign="top">

                                                                                        Subject of Email (Merge Tag SUBJECT): *|SUBJECT|*<br>
                                                                                        Email of Email (Merge Tag EMAIL): *|EMAIL|*<br>
                                                                                        Email Name of Email (Merge Tag EMAILNAME): *|EMAILNAME|* <br>

                                                                                        Nick Name (Merge Tag NNAME): *|NNAME|*<br>
                                                                                        First Name (Merge Tag FNAME): *|FNAME|*<br>
                                                                                        Last Name (Merge Tag LNAME): *|LNAME|*<br>
                                                                                        <br>
                                                                                        Login Count (Merge Tag LOGINCOUNT): *|LOGINCOUNT|*<br>
                                                                                        Password reset link (Merge Tag PASSRESET): *|PASSRESET|*<br>
                                                                                        Password reset validity (Merge Tag RESETVALID): *|RESETVALID|*<br>
                                                                                        <br>
                                                                                        Download Credits (Merge Tag DCREDITS): *|DCREDITS|*<br>
                                                                                        Event Credits (Merge Tag ECREDITS): *|ECREDITS|*<br>
                                                                                        <br>
                                                                                        Account Type (Merge Tag ACCTYPE): *|ACCTYPE|*<br>
                                                                                        Plan Renewal Date (Merge Tag RENEWDATE): *|RENEWDATE|*<br>
                                                                                        <br>
                                                                                        Some Free Text to pass on to Mandrill (Merge Tag FREETEXT): *|FREETEXT|*
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody></table>

                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table><table class="mcnImageBlock" style="min-width:100%;" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tbody class="mcnImageBlockOuter">
                                                                    <tr>
                                                                        <td style="padding:0px" class="mcnImageBlockInner" valign="top">
                                                                            <table class="mcnImageContentContainer" style="min-width:100%;" align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                <tbody><tr>
                                                                                    <td class="mcnImageContent" style="padding-right: 0px; padding-left: 0px; padding-top: 0; padding-bottom: 0; text-align:center;" valign="top">


                                                                                        <img alt="" src="http://gallery.mailchimp.com/27aac8a65e64c994c4416d6b8/images/yogapose.1.jpg" style="max-width:600px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage" align="middle" width="598">


                                                                                    </td>
                                                                                </tr>
                                                                                </tbody></table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table><table class="mcnTextBlock" style="min-width:100%;" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tbody class="mcnTextBlockOuter">
                                                                    <tr>
                                                                        <td class="mcnTextBlockInner" valign="top">

                                                                            <table style="min-width:100%;" class="mcnTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                <tbody><tr>

                                                                                    <td class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;" valign="top">

                                                                                        <strong>A new year means a new you.</strong> Start if off right; don't miss out on all our yoga options—half off for one month only.
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody></table>

                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table><table class="mcnButtonBlock" style="min-width:100%;" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tbody class="mcnButtonBlockOuter">
                                                                    <tr>
                                                                        <td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" class="mcnButtonBlockInner" align="left" valign="top">
                                                                            <table class="mcnButtonContentContainer" style="border-collapse: separate ! important;border-radius: 3px;background-color: #A1CEC4;" border="0" cellpadding="0" cellspacing="0">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td style="font-family: Arial; font-size: 12px; padding: 12px;" class="mcnButtonContent" align="center" valign="middle">
                                                                                        <a class="mcnButton " title="SIGN UP NOW" href="http://" target="_self" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">SIGN UP NOW</a>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table><table class="mcnDividerBlock" style="min-width:100%;" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tbody class="mcnDividerBlockOuter">
                                                                    <tr>
                                                                        <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 18px 18px 36px;">
                                                                            <table class="mcnDividerContent" style="min-width: 100%;border-top: 1px solid #E3E5E6;" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                <tbody><tr>
                                                                                    <td>
                                                                                        <span></span>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody></table>
                                                                            <!--
                                                                                            <td class="mcnDividerBlockInner" style="padding: 18px;">
                                                                                            <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
                                                                            -->
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END BODY -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top" style="padding-bottom:40px;">
                            <!-- BEGIN FOOTER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter">
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer">
                                            <tr>
                                                <td valign="top" class="footerContainer" style="padding-top:9px; padding-bottom:9px;"><table class="mcnTextBlock" style="min-width:100%;" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody class="mcnTextBlockOuter">
                                                        <tr>
                                                            <td class="mcnTextBlockInner" valign="top">

                                                                <table style="min-width:100%;" class="mcnTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tbody><tr>

                                                                        <td class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;" valign="top">

                                                                            <em>Copyright © *|CURRENT_YEAR|* *|LIST:COMPANY|*, All rights reserved.</em>
                                                                            <br>
                                                                            *|IFNOT:ARCHIVE_PAGE|*
                                                                            *|LIST:DESCRIPTION|*
                                                                            <br>
                                                                            <br>
                                                                            <strong>Our mailing address is:</strong>
                                                                            <br>
                                                                            *|HTML:LIST_ADDRESS_HTML|* *|END:IF|*
                                                                            <br>
                                                                            <br>
                                                                            Want to change how you receive these emails?<br>
                                                                            You can <a href="*|UPDATE_PROFILE|*">update your preferences</a> or <a href="*|UNSUB|*">unsubscribe from this list</a>
                                                                            <br>
                                                                            <br>
                                                                            *|IF:REWARDS|* *|HTML:REWARDS|*
                                                                            *|END:IF|*
                                                                        </td>
                                                                    </tr>
                                                                    </tbody></table>

                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END FOOTER -->
                        </td>
                    </tr>
                </table>
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>