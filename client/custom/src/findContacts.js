define('custom:findContacts', ['action-handler', 'view', 'ui'], function (Dep, View, Ui) {
    return class extends Dep {

        initTest() {}

        findContacts(data, e) {
            Espo.Ajax.getRequest('Lead/' + this.view.model.id)
                .then(response => {
                    if (!response.emailAddress) {
                        return;
                    }
                    const postData = {
                        email: response.emailAddress
                    };
                    Espo.Ajax.postRequest('AutoCRM/action/CheckEmails', postData)
                        .then(postResponse => {
                            this.showPopup(postResponse);
                        })
                        .catch(error => {
                            console.error('Post request error:', error);
                        });
                })
                .catch(error => {
                    console.error('Lead request error:', error);
                });
        }

        isTestVisible() {
            return !['Converted', 'Dead', 'Recycled'].includes(this.view.model.get('status'));
        }

        showPopup(result) {
            var message = '<b>Nalezení uživatelé</b><ul>';
            result.forEach(function (user) {
                message += '<a href="#Contact/view/'+user.id+'"><li>' + user.firstName + ' ' + user.lastName + '</a></li>';
            });
            message += '</ul>';
            Espo.Ui.notify(message, 'info');
        }
    }
});
