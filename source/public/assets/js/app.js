(function ($) {})(jQuery);
$.wait = function (callback, seconds) {
    return window.setTimeout(callback, seconds * 1000);
};
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$( document ).ajaxSend(function() {
    $('body').addClass('loading');
});
$( document ).ajaxComplete(function() {
    $('body').removeClass('loading');
});
var App = App || {};
App.generateID = function () {
    var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz'.split('');
    if (!length) {
        length = Math.floor(Math.random() * chars.length);
    }
    var str = '';
    for (var i = 0; i < length; i++) {
        str += chars[Math.floor(Math.random() * chars.length)];
    }
    return 'id-' + str;
};
App.showSuccessMessage = function (message, dom) {
    var html = $('#ajax-notification-success-template').html();
    var id = App.generateID();
    html = html.replace(/\[ID\]/, id);
    html = html.replace(/\[MESSAGE\]/, message);
    dom = typeof dom !== 'undefined' ? dom : '#ajax-notification';
    $(dom).append(html);
    $.wait(function () {
        $.wait(function () {
            $('#' + id).remove();
        },4);
    }, 2);
};
App.showErrorMessage = function (message, dom) {
    var html = $('#ajax-notification-error-template').html();
    var id = App.generateID();
    html = html.replace(/\[ID\]/, id);
    html = html.replace(/\[MESSAGE\]/, message);
    dom = typeof dom !== 'undefined' ? dom : '#ajax-notification';
    $(dom).append(html);
    $.wait(function () {
        $.wait(function () {
            $('#' + id).remove();
        },4);
    }, 2);
};

var Area = Area || {};
Area.getIssuesWrapper = function(){
    return $('#issuesListWrapper');
};
Area.getissueDetailDom = function(){
    return $('#issueDetail');
};
Area.getIssues = function(url){
    $.ajax({
        url : url,
        method : 'get',
        success : function (response) {
           Area.getIssuesWrapper().html(response);
        }
    });
};
Area.updateIssuesList = function(areaFormDom,areaID){
    var html = $('#trIssuesTableTemplate').html();
    //console.log(html);
    html = html.replace(/\%7Bid\%7D/,areaID);
    html = html.replace(/\[OWNER_COMMENT\]/,"No comment yet");
    // check if current area is  area that is uploading image
    var currentDom = $('#issuesTable[data-areaID="'+areaID+'"]');
    if(currentDom.length){ //current
        currentDom.find('tbody').append(html);
        $.wait(function(){
            Area.updateIssuesNumber(areaFormDom);
        },1);
    }else{
        var url = baseUrl + 'issues/?areaID='+areaID;
        $.ajax({
            url : url,
            method : 'get',
            success : function (response) {
               Area.getIssuesWrapper().html(response);
               $.wait(function(){
                  // Area.updateIssuesNumber(areaFormDom);
               },1);
            }
        });
    }

};
Area.updateIssuesNumber = function(formID){
    var numberIssue = $(formID).find('.number-isuees').text();
    //console.log(formID);
    //console.log(numberIssue);
    var currentNumber = 0;
    if(numberIssue){
        currentNumber = parseInt(numberIssue) + 1;
        $(formID).find('.number-isuees').text(currentNumber);
    }else{
        currentNumber = 1;
        $(formID).append('<label class="number-isuees">'+currentNumber+'</label>');
    }
};
Area.update = function(form){
    var url = $(form).attr('action');
    var data = $(form).serialize();
    $.post(url,data,function(res){
        if(res.state === -1){
            Area.getIssuesWrapper().find('table td[data-id="'+res.ID+'"]').parents('tr').remove();
        }else{
            Area.getIssuesWrapper().find('table td[data-id="'+res.ID+'"]').text(res.ownerComment);
        }
        App.showSuccessMessage("The issues has been updated success");
    });
};
Area.hideIssueForm = function(){
    Area.getissueDetailDom().html('');
};
var Issue = Issue || {};
Issue.getDetailDom  = function(){
    return $('#issueDetail');
};

Issue.getDetail = function(dom,url){
    $.ajax({
        url : url,
        method : 'get',
        success : function (response) {
            Issue.getDetailDom().html(response);
        }
    });
};

Issue.delete = function (url) {
    $.ajax({
        url : url,
        method : 'post',
        data : {
            _method : 'delete'
        },
        success : function (response) {
            App.showSuccessMessage("The issues has been deleted");
            Issue.updateIssueListAfterDelete(response.ID);
            Area.hideIssueForm();
        }
    });
};

Issue.updateIssueListAfterDelete = function (id) {
    var dom = Area.getIssuesWrapper().find('table td[data-id="'+id+'"]').parents('tr');
    dom.remove();
}
