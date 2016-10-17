(function($){

    var getData = function(url, success, error){
        $.ajax({
            url: url,
            method: "GET",
            success: function(data){
                if( typeof success == 'function'){
                    success(data);
                }
            },
            error: function(){
                if( typeof error == 'function'){
                    error();
                }
            }
        });
    }

    var showModel = function(content){
        $modal = $('#content-modal')
        $modal.find('.modal-body').html(content);
        $modal.modal('show');
    }


    $.fn.setAction = function (){
        $(this).on('click', function(e){
            e.preventDefault();
            var url = $(this).attr('href');

            getData(url, function(content){
                showModel(content);
            });
        });
        return this;
    };


    $('a.show-credentials').setAction();

})(jQuery)

