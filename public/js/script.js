(function() {
    
    var mainApp = angular.module('mainApp', ['infinite-scroll']);

    
    mainApp.controller('TechnicalConsultsController', function($scope, TechnicalConsults){
        $scope.TechnicalConsults = new TechnicalConsults();
    }).config(['$httpProvider', function($httpProvider) {
        $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
    }]);

    mainApp.factory('TechnicalConsults', function($http){        

        var TechnicalConsults = function () {
            this.items = [];
            this.busy = false;
            this.page = 1;
        }

        TechnicalConsults.prototype.nextPage = function() {
            var url = 'consultas_tecnicas?page='+this.page;

            if( this.busy ) return;
            this.busy = true;

            $http.get(url).success(function (data) {

                for (var i = 0; i < data.length; i++) {

                    console.log( this.items );

                    var urlemails = 'consultas_tecnicas/'+data[i].id+'/emails';                 
                    this.items.push(data[i]);

                    $http.get(urlemails).success(function (dataemails) {
                        
                        
                        
                    });

                };
                this.page = this.page++;
                this.busy = false;
            }.bind(this));
        };

        return TechnicalConsults;
    })


}).call(this);


    
(function() {

    'use strict';

    angular        
        .module('mainApp', ['ContactController', 'ContactService'])        
        .controller('ProjectStagesController', ProjectStagesController)
        .config(['$httpProvider', function($httpProvider) {
            $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
        }]);

    function ProjectStagesController( $scope, $http ) {

        $scope.ProjectStagesController = this;

        this.items  = [];
        this.busy   = false;      
        this.page   = 1;

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
        var url         = window.location.protocol + '//' + window.location.hostname + '/api' + pathname + hash;

        $http.get( url )
            .success(function(response){
               
                for (var i = 0; i < response.length; i++) { 
                    var item = response[i];
                    $http.get( url + '/' + response[i].id + '/technical_consults' )
                        .success(function( response_tc ){
                            item.technical_consults = response_tc;
                            console.log( response_tc );
                        });
                    this.items.push( item );
                };

            }.bind(this));
    };

})();


/**
 * jQuery Plugin: Sticky Tabs
 *
 * @author Aidan Lister <aidan@php.net>
 * @version 1.2.0
 */
(function ( $ ) {
    $.fn.stickyTabs = function( options ) {
        var context = this

        var settings = $.extend({
            getHashCallback: function(hash, btn) { return hash }
        }, options );

        // Show the tab corresponding with the hash in the URL, or the first tab.
        var showTabFromHash = function() {
          var hash = window.location.hash;
          var selector = hash ? 'a[href="' + hash + '"]' : 'li.active > a';
          $(selector, context).tab('show');
        }

        // We use pushState if it's available so the page won't jump, otherwise a shim.
        var changeHash = function(hash) {
          if (history && history.pushState) {
            history.pushState(null, null, '#' + hash);
          } else {
            scrollV = document.body.scrollTop;
            scrollH = document.body.scrollLeft;
            window.location.hash = hash;
            document.body.scrollTop = scrollV;
            document.body.scrollLeft = scrollH;
          }
        }

        // Set the correct tab when the page loads
        showTabFromHash(context)

        // Set the correct tab when a user uses their back/forward button
        $(window).on('hashchange', showTabFromHash);

        // Change the URL when tabs are clicked
        $('a', context).on('click', function(e) {
          var hash = this.href.split('#')[1];
          var adjustedhash = settings.getHashCallback(hash, this);
          changeHash(adjustedhash);
        });

        return this;
    };
}( jQuery ));


(function() {
    
    $('.nav.nav-tabs').stickyTabs();

    $('.selectpicker').selectpicker();

}( jQuery ));