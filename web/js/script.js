$("#browser_notice").change(function()
{
    value = $("#browser_notice").prop('checked');
    value ? OneSignal.sendTag("disabled_user", $('#browser_notice').prop('checked')): OneSignal.deleteTag("disabled_user");
});