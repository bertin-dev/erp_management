$(document).ready(function () {



    // ------------------------------------------------------- //

    // Custom Scrollbar

    // ------------------------------------------------------ //



    if ($(window).outerWidth() > 992) {

        $("nav.side-navbar").mCustomScrollbar({

            scrollInertia: 200

        });

    }



    // Main Template Color

    var brandPrimary = '#33b35a';



    // ------------------------------------------------------- //

    // Side Navbar Functionality

    // ------------------------------------------------------ //

    $('#toggle-btn').on('click', function (e) {



        e.preventDefault();



        if ($(window).outerWidth() > 1194) {

            $('nav.side-navbar').toggleClass('shrink');

            $('.page').toggleClass('active');

        } else {

            $('nav.side-navbar').toggleClass('show-sm');

            $('.page').toggleClass('active-sm');

        }

    });



    // ------------------------------------------------------- //

    // Tooltips init

    // ------------------------------------------------------ //    



    $('[data-toggle="tooltip"]').tooltip()



    // ------------------------------------------------------- //

    // Universal Form Validation

    // ------------------------------------------------------ //



    $('.form-validate').each(function() {  

        $(this).validate({

            errorElement: "div",

            errorClass: 'is-invalid',

            validClass: 'is-valid',

            ignore: ':hidden:not(.summernote),.note-editable.card-block',

            errorPlacement: function (error, element) {

                // Add the `invalid-feedback` class to the error element

                error.addClass("invalid-feedback");

                //console.log(element);

                if (element.prop("type") === "checkbox") {

                    error.insertAfter(element.siblings("label"));

                } 

                else {

                    error.insertAfter(element);

                }

            }

        });

    });

    // ------------------------------------------------------- //

    // Material Inputs

    // ------------------------------------------------------ //



    var materialInputs = $('input.input-material');



    // activate labels for prefilled values

    materialInputs.filter(function () {

        return $(this).val() !== "";

    }).siblings('.label-material').addClass('active');



    // move label on focus

    materialInputs.on('focus', function () {

        $(this).siblings('.label-material').addClass('active');

    });



    // remove/keep label on blur

    materialInputs.on('blur', function () {

        $(this).siblings('.label-material').removeClass('active');



        if ($(this).val() !== '') {

            $(this).siblings('.label-material').addClass('active');

        } else {

            $(this).siblings('.label-material').removeClass('active');

        }

    });



    // ------------------------------------------------------- //

    // Jquery Progress Circle

    // ------------------------------------------------------ //

    var progress_circle = $("#progress-circle").gmpc({

        color: brandPrimary,

        line_width: 5,

        percent: 80

    });

    progress_circle.gmpc('animate', 80, 3000);



    // ------------------------------------------------------- //

    // External links to new window

    // ------------------------------------------------------ //



    $('.external').on('click', function (e) {



        e.preventDefault();

        window.open($(this).attr("href"));

    });



    // ------------------------------------------------------ //

    // For demo purposes, can be deleted

    // ------------------------------------------------------ //



    var stylesheet = $('link#theme-stylesheet');

    $("<link id='new-stylesheet' rel='stylesheet'>").insertAfter(stylesheet);

    var alternateColour = $('link#new-stylesheet');



    if ($.cookie("theme_csspath")) {

        alternateColour.attr("href", $.cookie("theme_csspath"));

    }



    $("#colour").change(function () {



        if ($(this).val() !== '') {



            var theme_csspath = 'css/style.' + $(this).val() + '.css';



            alternateColour.attr("href", theme_csspath);



            $.cookie("theme_csspath", theme_csspath, {

                expires: 365,

                path: document.URL.substr(0, document.URL.lastIndexOf('/'))

            });



        }



        return false;

    });

     // ------------------------------------------------------ //

    // script name role

    // ------------------------------------------------------ //

    $('#role_name_add').keyup(function(e){

        e.preventDefault();

        var str = $("#role_name_add").val();

        str = str.replace(/\W+(?!$)/g, '-').toLowerCase();

        $('#role_slug_add').val(str);

        $('#role_slug_add').attr('placeholder', str);

    });



    // ------------------------------------------------------ //

    // script delete role

    // ------------------------------------------------------ //



    $('#liste_des_roles').on('click','#role_delete', function(e){
        e.preventDefault();
        var token = $('#liste_des_roles').attr('token');
        $.ajax({

            url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/role/'+$(this).attr('data-roleid'),

            method: 'DELETE',
            dataType: 'json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', token);
            },
            data: {}
        }).done(function(data){
            console.log(data);
            window.reload();
        });

    });





        var liste_des_roles = $("#liste_des_roles");

        var bloc_de_permissions = $('#bloc_de_permissions');

        var liste_des_permissions_cochable = $("#liste_des_permissions_cochable");

        bloc_de_permissions.hide();

        liste_des_roles.on("change", function(){

            var role = $(this).find(':selected');

            var role_id = role.data('role-id');

            var token = liste_des_roles.attr('token');

            var role_slug = role.data('role-slug');



            $.ajax({

                url: "https://webservice.domaineteste.space.smopaye.fr/public/api/particulier/create",

                method: "GET",

                dataType: 'json',

                beforeSend: function (xhr) {

                    xhr.setRequestHeader('Authorization', token);

                },

                data:{

                    role_id: role_id,

                    role_slug: role_slug

                }

            }).done(function(data){

                bloc_de_permissions.show();

                liste_des_permissions_cochable.empty();

                $.each(data, function(index, element){

                    $(liste_des_permissions_cochable).append(

                        '<div class="custom-control custom-checkbox">'+

                            '<input class="custom-control-input cb" type="checkbox" name="permissions[]" id="'+element.slug+'" value="'+element.id+'">'+

                            '<label class="custom-control-label" for="'+element.slug+'">'+element.name+'</label>'+

                        '</div>'

                    );

                }); 

            })

        });



        $('#liste_des_staffs').on('click','#staff_delete', function(e){

            e.preventDefault();

            var token = $(this).attr('token');

            $.ajax({

                url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/particulier/'+$(this).attr('data-staffid'),

                method: 'DELETE',

                beforeSend: function (xhr) {

                    xhr.setRequestHeader('Authorization', token);

                },

                data: {},

                success: function (response) {

                    location.href = '/smopaye/personnel';

                 },

                error: function (error) { 

                        console.error(error);

                    }

            })

        });



        $('#liste_des_tarifs').on('click','#tarif_delete', function(e){

            e.preventDefault();

            var token = $(this).attr('token');

            $.ajax({

                url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/tarif/'+$(this).attr('data-tarifid'),

                method: 'DELETE',

                beforeSend: function (xhr) {

                    xhr.setRequestHeader('Authorization', token);

                },

                data: {},

                success: function (response) {

                    location.href = '/tarif';

                 },

                error: function (error) { 

                        console.error(error);

                    }

            })

        });



        $('#liste_des_devices').on('click','#device_delete', function(e){

            e.preventDefault();

            var token = $(this).attr('token');

            $.ajax({

                url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/device/'+$(this).attr('data-deviceid'),

                method: 'DELETE',

                beforeSend: function (xhr) {

                    xhr.setRequestHeader('Authorization', token);

                },

                data: {},

                success: function (response) {

                    location.href = '/device';

                 },

                error: function (error) { 

                        console.error(error);

                    }

            })

        });



        $('#searchTransactionCarte').on('change','.transaction', function(e){

            e.preventDefault();

            var token = $('#searchTransactionCarte').attr('token');

            $.ajax({

                url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/transaction/filter/carte',

                method: 'POST',

                beforeSend: function (xhr) {

                    xhr.setRequestHeader('Authorization', token);

                },

                data: {

                    starting_date: $("#starting_date").val(),

                    end_date: $("#end_date").val(),

                    type: $("#type").val(),

                    carte: $("#carte").val(), 

                    phone: $("#phone").val()

                },

                success: function (response) {

                    let array = response.data;

                    $('#liste_des_transactions_de_la_carte').html('');

                    for (let index = 0; index < array.length; index++) {

                        let destinataire = null;
                        let emetteur = null;
                        window.console.log(array[index].destinataire);
                        window.console.log(array[index].emetteur);
                        if(!(array[index].destinataire.lastname == undefined)){
                            destinataire = array[index].destinataire.lastname+' '+array[index].destinataire.firstname;
                        }else{   
                            destinataire = array[index].destinataire.raison_social;
                        }
                        if(!(array[index].emetteur.lastname == undefined)){
                            emetteur = array[index].emetteur.lastname+' '+array[index].emetteur.firstname;
                        }else{
                            emetteur = array[index].emetteur.raison_social;
                        }
                        
                        $('#liste_des_transactions_de_la_carte').prepend('<tr>'+

                                            '<td>'+array[index].transaction_number+'</td>'+

                                            '<td>'+array[index].starting_date+'</td>'+

                                            '<td class="text-muted btn-warning"><span style="color:white"><i class="fa fa-user"><b> '+emetteur+'</b></i></span></td>'+

                                            '<td class="text-muted btn-success"><span style="color:white"><i class="fa fa-user"><b> '+destinataire+'</b></i></span></td>'+

                                            '<td>'+array[index].amount+' FCFA</td>'+

                                            '<td>'+array[index].transaction_type+'</td>'+

                                            '<td>'+array[index].servicecharge+' FCFA</td>'+

                                            '<td>'+array[index].state+'</td>'+

                                        '</tr>');

                        

                    }

                 },

                error: function (error) { 

                        console.error(error);

                    }

            })

        });



        $('#searchTransaction').on('change','.transaction', function(e){

            e.preventDefault();

            var token = $('#searchTransaction').attr('token');

            $.ajax({

                url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/transaction/filter/compte',

                method: 'POST',

                beforeSend: function (xhr) {

                    xhr.setRequestHeader('Authorization', token);

                },

                data: {

                    starting_date: $("#starting_date").val(),

                    end_date: $("#end_date").val(),

                    type: $("#type").val(),

                    compte: $("#compte").val(),

                    phone: $("#phone").val()

                },

                success: function (response) {

                    let array = response.data;

                    $('#liste_des_transactions_du_compte').html('');

                    for (let index = 0; index < array.length; index++) {

                        $('#liste_des_transactions_du_compte').prepend('<tr>'+

                                            '<td>'+array[index].transaction_number+'</td>'+

                                            '<td>'+array[index].starting_date+'</td>'+

                                            '<td> inconnu </td>'+

                                            '<td> inconnu </td>'+

                                            '<td>'+array[index].amount+'</td>'+

                                            '<td>'+array[index].transaction_type+'</td>'+

                                            '<td>'+array[index].servicecharge+' fcfa</td>'+

                                            '<td>'+array[index].state+'</td>'+

                                        '</tr>');

                        

                    }

                 },

                error: function (error) { 

                        console.error(error);

                    }

            })

        });



});





$('#desattribution_entreprise_device').on('click','#desattribution', function(e){

    e.preventDefault();    

    var raison = $(this).attr('raison');

    var id = $(this).attr('id_entreprise');

    var mobile = $(this).attr('mobile');

    var serial_number = $(this).attr('serial_number');

    var id_device = $(this).attr('id_device');





    $("#id_entreprise").val(raison);

    $("#id_entreprise").attr('id_entreprise',id);

    

    $("#device_id").val(serial_number+' - '+mobile);

    $("#device_id").attr('device',id_device); 

});





$("#categorieTarifaire").on('click','#saveCategorie', function(e){

    e.preventDefault();

    var token = $('#liste_des_categories').attr('token');

    var name = $('#nameCategorie').val();

    var role_id = $('#role_id').val();

    $.ajax({

        url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/categorie',

        method: 'POST',

        beforeSend: function (xhr) {

            xhr.setRequestHeader('Authorization', token);

        },

        data: {

            role_id: role_id,

            name: name

        },

        success: function (response) {

            $('#liste_des_categories').prepend(

                '<tr>'+

                '<td>'+response.data.id+'</td>'+

                '<td>'+response.data.name+'</td>'+

                '<td>'+

                    '<a href="/categorie/{{ $categorie->id }}/edit" id="tarif_view" class="btn btn-warning"><i class="fa fa-edit"></i></a>'+

                    '<button id="categorie_delete" token="{{Session::get("access_token")}}" type="button" class="btn btn-danger" data-categorieid="{{$categorie->id}}"><i class="fa fa-trash"></i></button>'+

                '</td>'+

                '</tr>'

            );

         },

        error: function (error) { 

            console.error(error);

        }

    });



});



$('#post_entreprise_device').on('click','#postDesattribution', function(e){

    e.preventDefault();

    var token = $('#myModal1').attr('token');

    var id_device = $("#device_id").attr('device');

    var id_entreprise = $("#id_entreprise").attr('id_entreprise');

    $.ajax({

        url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/user_device/desattribuer',

        method: 'POST',

        beforeSend: function (xhr) {

            xhr.setRequestHeader('Authorization', token);

        },

        data: {

            user_id: id_entreprise,

            device_id: id_device

        },

        success: function (response) {

            location.href = "/public/enterprise/"+id_entreprise;

         },

        error: function (error) { 

            console.error(error);

        }

    });

});



$('#form_entreprise_device').on('click','#attribution', function(e){

    e.preventDefault();

    var raison = $(this).attr('raison');

    var id = $(this).attr('id_entreprise');

    $("#id_entreprise").val(raison);

    $("#id_entreprise").attr('id_entreprise',id);

    $('#typeahead3').val('');    

});



$('#post_entreprise_device').on('click','#postAttribution', function(e){

    e.preventDefault();

    var token = $('#typeahead3').attr('token');

    var id_entreprise = $("#id_entreprise").attr('id_entreprise');

    var id_device = $('#typeahead3').attr('id_device');

    $.ajax({

        url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/user_device',

        method: 'POST',

        beforeSend: function (xhr) {

            xhr.setRequestHeader('Authorization', token);

        },

        data: {

            starting_possession: $("#starting_date").val(),

            end_possession: $("#end_date").val(),

            user_id: id_entreprise,

            device_id: id_device

        },

        success: function (response) {

            Swal.fire({

                position: 'top-center',

                icon: 'success',

                title: response.message,

                showConfirmButton: false,

                timer: 3000

              })

         },

        error: function (error) { 
            alert(error.reponseText.message);
        }

    })    

});





$('#typeahead3').typeahead({

    displayText: function (item) {

    return item.device_type + ' ' + item.serial_number + ', ' + item.mobile

    },

    afterSelect: function (item) {

    this.$element[0].value = item.serial_number

    $('#typeahead3').attr('id_device',item.id)

    },

    source: function (query, result){

        var token = $('#typeahead3').attr('token');

        $.ajax({

            url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/device/attribution/libre',

            method: 'GET',

            beforeSend: function (xhr) {

                xhr.setRequestHeader('Authorization', token);

            },

            success: function (response) {

               result($.map(response.data, function(item){

                   return item;

               }));

             },

            error: function (error) { 

                    console.error(error);

                }

        })

    }

});



$("#debloquerCarte").click(function(e){

    e.preventDefault();

    card_id = $(this).attr('card_id');

    user_id = $(this).attr('user_id');

    token = $("#token").attr('token');

    

    const swalWithBootstrapButtons = Swal.mixin({

        customClass: {

          confirmButton: 'btn btn-success',

          cancelButton: 'btn btn-danger'

        },

        buttonsStyling: false

      })

      

      swalWithBootstrapButtons.fire({

        title: 'Êtes-vous sûr?',

        text: "Vous ne pourrez pas annuler cela!",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonText: 'Oui, debloquer la carte!',

        cancelButtonText: 'Non, Annuler l\'opération!',

        reverseButtons: true

      }).then((result) => {

        if (result.value) {

            $.ajax({

                url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/card/'+card_id+'/activation',

                method: 'POST',

                beforeSend: function (xhr) {

                    xhr.setRequestHeader('Authorization', token);

                },

                data: {

                    card_state: "activer"

                },

                success: function (response) {

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: response.message,

                        showConfirmButton: false,

                        timer: 3000

                      })

                      location.reload();

                 },

                error: function (error) { 

                    swalWithBootstrapButtons.fire(

                        'Annulé',

                        'Echec de l\'opération :)',

                        'error'

                      )

                }

            })

        } else if (

          /* Read more about handling dismissals below */

          result.dismiss === Swal.DismissReason.cancel

        ) {

          swalWithBootstrapButtons.fire(

            'Annulé',

            'Vos données sont en sécurité :)',

            'error'

          )

        }

      })      

});



$("#bloquerCarte").click(function(e){

    e.preventDefault();

    card_id = $(this).attr('card_id');

    user_id = $(this).attr('user_id');

    token = $("#token").attr('token');

    

    const swalWithBootstrapButtons = Swal.mixin({

        customClass: {

          confirmButton: 'btn btn-success',

          cancelButton: 'btn btn-danger'

        },

        buttonsStyling: false

      })

      

      swalWithBootstrapButtons.fire({

        title: 'Êtes-vous sûr?',

        text: "Vous ne pourrez pas annuler cela!",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonText: 'Oui, bloquer la carte!',

        cancelButtonText: 'Non, Annuler l\'opération!',

        reverseButtons: true

      }).then((result) => {

        if (result.value) {

            $.ajax({

                url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/card/'+card_id+'/activation',

                method: 'POST',

                headers: {

                    'Access-Control-Allow-Origin': '*'

                },

                crossDomain: true,

                beforeSend: function (xhr) {

                    xhr.setRequestHeader('Authorization', token);

                },

                data: {

                    card_state: "desactiver"

                },

                success: function (response) {

                    Swal.fire({

                        position: 'top-center',

                        icon: 'success',

                        title: response.message,

                        showConfirmButton: false,

                        timer: 3000

                      })

                      location.reload();

                 },

                error: function (error) { 

                    swalWithBootstrapButtons.fire(

                        'Annulé',

                        'Echec de l\'opération :)',

                        'error'

                      )

                }

            })

        } else if (

          /* Read more about handling dismissals below */

          result.dismiss === Swal.DismissReason.cancel

        ) {

          swalWithBootstrapButtons.fire(

            'Annulé',

            'Vos données sont en sécurité :)',

            'error'

          )

        }

      })      

});



$("#carte_libre_attribuer").on('click','#AttributionCarte', function(e){

    e.preventDefault();

    var token = $('#typeahead4').attr('token');

    var code_number = $('#code_number').val();

    var id_user = $('#typeahead4').attr('id_user');

    $.ajax({

        url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/user/'+id_user+'/card/attribute',

        method: 'POST',

        beforeSend: function (xhr) {

            xhr.setRequestHeader('Authorization', token);

        },

        data: {

            id: id_user,

            card_number: code_number

        },

        success: function (response) {

            Swal.fire({

                position: 'top-center',

                icon: 'success',

                title: response.message,

                showConfirmButton: false,

                timer: 50000

              })

            location.href('/card/');

         },

        error: function (error) { 

            Swal.fire(

                'Cancelled',

                'Your imaginary file is safe :)',

                'error'

              )

        }

    })    

});



$("#carte_libre_attribuer").on('click','#postattribuer', function(e){

    e.preventDefault();

    $('#code_number').val($(this).attr('code_number'));

});



$('#typeahead4').typeahead({

    displayText: function (item) {

            return item.address+ ', ' + item.phone

    },

    afterSelect: function (item) {

            this.$element[0].value = item.address+ ', ' + item.phone

    $('#typeahead4').attr('id_user',item.id)

    },

    source: function (query, result){

        var token = $('#typeahead4').attr('token');

        $.ajax({

            url: 'https://webservice.domaineteste.space.smopaye.fr/public/api/user',

            method: 'GET',

            beforeSend: function (xhr) {

                xhr.setRequestHeader('Authorization', token);

            },

            success: function (response) {

               result($.map(response.data, function(item){

                   return item;

               }));

             },

            error: function (error) { 

                    console.error(error); 

                }

        })

    }

});