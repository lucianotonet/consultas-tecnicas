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
        get : function(  ) {
            return $http.get( window.location.protocol + '//' + window.location.hostname + '/api/contacts' );
        },

        // get only the ATTACHED to current resource
        getAttached : function(  ) {
            return $http.get( url );
        },

        // get only the ATTACHED to current resource
        getUnattached : function(  ) {
            $allcontacts        = $http.get( window.location.protocol + '//' + window.location.hostname + '/api/contacts' );
            $attachedcontacts   = $http.get( url );

            $unattached = {};
            
            $allcontacts.forEach(function(contact, index){                
                
            });
        },

        // save a contact (pass in contact data)
        save : function( contactData ) {
            return $http({
                method: 'POST',
                url: url,
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(contactData)
            });
        },

        // destroy a contact
        destroy : function( id ) {
            return $http.delete( url + '/' + id);
        },

        // attach a contact
        attach : function( contact_id ) {    

            return $http({
                method: 'GET',
                url:  window.location.protocol + '//' + window.location.hostname + '/api' + pathname + '/attach' + '/contact/' + contact_id,
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: contact_id
            });
        },

        // dettach a contact
        dettach : function( contact_id ) {
            return $http.get( url + '/' + contact_id + '/dettach');
        }
    }

});