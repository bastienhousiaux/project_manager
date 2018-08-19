var utils=utils || {};

utils.get=function(url,success,error){
    var request = new XMLHttpRequest();
    request.open('GET', url, true);

    request.onload = function() {
        if (request.status >= 200 && request.status < 400) {
            if(success)success(JSON.parse(request.responseText));
        } else {
            // We reached our target server, but it returned an error
            if(error)error(request);
        }
    };

    request.onerror = function() {
        // There was a connection error of some sort
        if(error)error(request);
    };

    request.send();
}

utils.post=function(url,data,success,error){
    data=data||{};
    var request = new XMLHttpRequest();
    request.open('POST', url, true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.onload = function() {
        if (request.status >= 200 && request.status < 400) {
            if(success)success(JSON.parse(request.responseText));
        } else {
            // We reached our target server, but it returned an error
            if(error)error(request);
        }
    };

    request.onerror = function() {
        // There was a connection error of some sort
        if(error)error(request);
    };
    request.send(data);
}