@extends('emails/layouts/default')

@section('content')
{{--<p>Hello {!! $user->first_name !!},</p>--}}

{{--<p>Welcome to @lang('general.site_name')! Please click on the following link to confirm your @lang('general.site_name') account:</p>--}}

{{--<p><a href="{!! $activationUrl !!}">{!! $activationUrl !!}</a></p>--}}

{{--<p>Best regards,</p>--}}

{{--<p>@lang('general.site_name') Team</p>--}}
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
                                                                                    <a class="mcnButton " title="SIGN UP NOW" href="{!! $deleteUrl !!}">{!! $deleteUrl !!} target="_self" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">SIGN UP NOW</a>
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
@stop
