class Notification {

    success(){
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Successfully done',
            timeout:1000,
            
        }).show();
    }

    alert(){
        new Noty({
            type: 'alert',
            layout: 'topRight',
            text: 'Successfully done',
            timeout:1000,
            
        }).show();

    }
    error(){
        new Noty({
            type: 'alert',
            layout: 'topRight',
            text: 'error happenend',
            timeout:1000,
            
        }).show();
    }
    warning(){
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Something Wrong',
            timeout:1000,
            
        }).show();
    }
    image_validation(){
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: 'upload image less than 3MB',
            timeout:1000,
            
        }).show();
    }
    cart_success(){
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Successfully Added',
            timeout:1000,
            
        }).show();
    }
    cart_remove(){
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Successfully Deleted',
            timeout:1000,
            
        }).show();
    }

}

export default Notification = new Notification();
