// public/js/services/ContactService.js

angular.module('ContactService', [])

.factory('Contact', function($http) {

    function tranlsate( word ) {                
        word = word.replace("#", "/");
        word = word.replace("obras", "projects");
        word = word.replace("clientes", "clients");
        word = word.replace("contatos", "contacts");
        word = word.replace("consultas-tecnicas", "technical_consults");
        word = word.replace("etapas", "stages");
        word = word.replace("dicsiplinas", "disciplines");
        return word;
    }

    var pathname    = tranlsate( window.location.pathname );
    var hash        = tranlsate( window.location.hash );
    var url         = window.location.protocol + '//' + window.location.hostname + '/api' + pathname + '/contacts';    

    return {
        // get all the contacts
        get : function() {
            return $http.get( url );
        },

        // save a contact (pass in contact data)
        save : function(contactData) {
            return $http({
                method: 'POST',
                url: url,
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(contactData)
            });
        },

        // destroy a contact
        destroy : function(id) {
            return $http.delete( url + '/' + id);
        },

        // dettach a contact
        dettach : function(contact_id) {
            return $http.get( url + '/' + contact_id + '/dettach');
        }
    }

});