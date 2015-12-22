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
Area.getIssuesTable = function(){
    return $('#issuesTable');
}
Area.getIssues = function(url){
    $.ajax({
        url : url,
        method : 'get',
        success : function (response) {
           Area.getIssuesTable().find('tbody').html(response);
        }
    });
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
