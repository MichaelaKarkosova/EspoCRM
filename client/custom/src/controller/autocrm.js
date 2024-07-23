define('custom:controllers/autocrm', 'controller', function (Dep) {
​    return Dep.extend({

        // default action
        actionIndex: function (options) {  
            // make Ajax call to retrieve the custom page content from the back end
            let payload = {userId: this.getUser().get('id')}; // define here input values for the Ajax call - for example the User id
            Espo.Ajax.getRequest('autocrm/action/actionCheckEmails', {
                options: payload
            }).then(
                (response) => {
                    // display the back-end content in the main section of the screen
                    let myHtml = "<div>"+response+"</div>";
                    $('#main').html(myHtml);
                }.bind(this)
            );                        
        }​​
    });
});