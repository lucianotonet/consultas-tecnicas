// public/js/controllers/ContactController.js

angular.module('ContactController', [])

// inject the Contact service into our controller
.controller('ContactController', function($scope, $http, Contact) {
    // object to hold all the data for the new contact form
    $scope.contacts             = {};
    $scope.contactsattached     = {};
    $scope.contactsunattached   = {};    


    // loading variable to show the spinning loading icon
    $scope.loading = true;



    // get all the contacts first and bind it to the $scope.contacts object
    // use the function we created in our service
    // GET ALL CONTACTS ==============
    Contact.get()
        .success(function(data) {
            $scope.contacts = data;
            $scope.loading = false;
        });

    Contact.getAttached()
        .success(function(data) {
            $scope.contactsattached  = data;
            $scope.loading           = false;
        });   

    Contact.getUnattached()
        .success(function(data) {
            $scope.contactsunattached  = data;
            $scope.loading             = false;
        });   
  
    // function to handle submitting the form
    // SAVE A COMMENT ================
    $scope.submitContact = function() {
        $scope.loading = true;

        // save the contact. pass in contact data from the form
        // use the function we created in our service
        Contact.save($scope.contacts)
            .success(function(data) {

                // if successful, we'll need to refresh the contact list
                Contact.get()
                    .success(function(getData) {
                        $scope.contacts = getData;
                        $scope.loading = false;
                    });

            })
            .error(function(data) {
                console.log(data);
            });
    };

    // function to handle deleting a contact
    // DELETE A COMMENT ====================================================
    $scope.deleteContact = function(id) {
        
        $scope.loading = true; 

        // use the function we created in our service
        Contact.destroy(id)
            .success(function(data) {

                // if successful, we'll need to refresh the contact list
                Contact.get()
                    .success(function(getData) {
                        $scope.contacts = getData;
                        $scope.loading = false;
                    });

            });
    };


    $scope.attachContacts = function(data) {       

        $scope.loading = true; 

        console.log(data);

        // use the function we dettach in our service
        Contact.attach(  )
            .success(function(data) {

                // if successful, we'll need to refresh the contact list
                Contact.get()
                    .success(function(getData) {
                        $scope.contacts = getData;
                        $scope.loading = false;
                    });

            });
    }



    $scope.dettachContact = function (contact_id) {
        $scope.loading = true; 

        // use the function we dettach in our service
        Contact.dettach(id)
            .success(function(data) {

                // if successful, we'll need to refresh the contact list
                Contact.get()
                    .success(function(getData) {
                        $scope.contacts = getData;
                        $scope.loading = false;
                    });

            });
    }

});