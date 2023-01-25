$(function (){
    $('.toast').toast('show');
    $('.trumbowyg').trumbowyg({
            svgPath: $('base').attr('href') + "/node_modules/trumbowyg/dist/ui/icons.svg"
    });
    // $('.trumbowyg').trumbowyg({
    //     btns: [['strong', 'em',], ['insertImage']],
    //     autogrow: true
    // });
    $('#image').change(function (e){

        let files = e.target.files;

        $('#img-preview').html('');

        for (let file of files){
            let fr = new FileReader();
            fr.readAsDataURL(file);
            fr.onload = function(ev){
                $('#img-preview').append('<div class="col-md-4 mt-3"> <img src="'+ ev.target.result+'" class="img-container img-thumbnail img-fluid"> </div>');
            }

        }

    });

    let i = 0;

    $('#addMore').click(function (){

        // console.log('addOrderColumn')
        ++i;
        $('#addOrderColumn').append('<div class="row" id="sass">' +
            '<div class="col-md-2">  <input type="text" name="addMoreInputFields[0][sku]" id="sku" class="form-control"> </div> ' +
            '<div class="col-md-2"> <select name="addMoreInputFields[0][name]" id="productname" class="form-control"> </select> </div>' +
            ' <div class="col-md-2"> <input type="number" name="addMoreInputFields['+ i +'][qty]" id="qty" placeholder="enter your  qty" class="form-control"> </div> ' +
            '<div class="col-md-2"> <input type="number" name="addMoreInputFields['+ i +'][rate]" id="rate" placeholder="enter your  product rate" class="form-control"> </div> ' +
            '<div class="col-md-2"> <input type="text" name="addMoreInputFields['+ i +'][address]" id="address" class="form-control"></div>' +
            ' <div class="col-md-2"><button type="button" class="btn btn-outline-danger remove">Delete</button></div> ' +
            '</div>');
        // console.log('')
    });

    $(document).on('click','.remove', function() {
        $(this).parents('#sass').remove();
    });


    $('#productsku').change(function () {
            let sku =  jQuery(this).val();
            jQuery.ajax({
                url: '/khanatime/api/product-sku',
                type: 'get',
                data: 'sku= '+ sku,
                success:  function(result){
                    console.log(result)
                    jQuery('#productname').val(result);
                }
            });
    });
});
