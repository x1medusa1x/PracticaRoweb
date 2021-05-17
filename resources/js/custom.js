//CUSTOM JS
$('#userEditModal').on('shown.bs.modal', function(event) {
    let button = $(event.relatedTarget); // Button that triggered the modal
    let user = button.data('user');

    let modal = $(this);

    modal.find('#userEditId').val(user.id);
    modal.find('#userEditName').text(user.name);
    modal.find('#userEditRole').val(user.role);
});

$('#userEditModalAjax').on('shown.bs.modal', function(event) {
    let button = $(event.relatedTarget); // Button that triggered the modal
    let user = button.data('user');

    let modal = $(this);

    modal.find('#userEditIdAjax').val(user.id);
    modal.find('#userEditNameAjax').text(user.name);
    modal.find('#userEditRoleAjax').val(user.role);
});

$('#userDeleteModal').on('shown.bs.modal', function(event) {
    let button = $(event.relatedTarget); // Button that triggered the modal
    let user = button.data('user');

    let modal = $(this);

    modal.find('#userDeleteId').val(user.id);
    modal.find('#userDeleteName').text(user.name);
});

$('#boardEditModal').on('shown.bs.modal', function(event){
  let button = $(event.relatedTarget); // Button that triggered the modal
  let board = button.data('board');

  let modal = $(this);

  modal.find('#boardEditId').val(board.id);
  modal.find('#boardEditName').text(board.name);
});

$('#boardDeleteModal').on('shown.bs.modal', function(event){
  let button = $(event.relatedTarget); // Button that triggered the modal
  let board = button.data('board');

  let modal = $(this);

  modal.find('#boardDeleteId').val(board.id);
  modal.find('#boardDeleteName').text(board.name);
});


/**
 * Update user using ajax
 */
$(document).ready(function() {

  /*$(".js-example-theme-multiple").select2({
    theme: "classic"
  });*/


    $('#userEditButtonAjax').on('click', function() {
        $('#userEditAlert').addClass('hidden');

        let id = $('#userEditIdAjax').val();
        let role = $('#userEditRoleAjax').val();

        $.ajax({
            method: 'POST',
            url: '/user-update/' + id,
            data: {role: role}
        }).done(function(response) {
            if (response.error !== '') {
                $('#userEditAlert').text(response.error).removeClass('hidden');
            } else {
                window.location.reload();
            }
        });
    });

    $('#userDeleteButton').on('click', function() {
        $('#userDeleteAlert').addClass('hidden');
        let id = $('#userDeleteId').val();

        $.ajax({
            method: 'POST',
            url: '/user/delete/' + id
        }).done(function(response) {
            if (response.error !== '') {
                $('#userDeleteAlert').text(response.error).removeClass('hidden');
            } else {
                window.location.reload();
            }
        });
    });

    let id = $('#boardEditId').val();
    $('.js-example-theme-multiple').select2({
      theme: "classic",
      ajax:{
        method:"GET",
        url: '{{ route("boards.cbu") }}',
        dataType: 'json',
        data:{
          id: id
        },
        processResults: function(response){
          return{
            results:response
          };
        },
        cache:true
      }
    });


    $('#boardEditButton').on('click', function(){
      $('#boardEditAlert').addClass('hidden');
      let id = $('#boardEditId').val();
      $.ajax({
        mehtod:'POST',
        url: '/board/update/'+id,
        data:{
          boardEditName: $('#boardEditName').val()
        }
      }).done(function(response) {
          if (response.error !== '') {
              $('#boardEditAlert').text(response.error).removeClass('hidden');
          } else {
              window.location.reload();
          }
      });
    });

    $('#boardDeleteButton').on('click', function(){
      $('#boardDeleteAlert').addClass('hidden');
      let id = $('#boardDeleteId').val();
      $.ajax({
        method: 'POST',
        url: '/board/delete/' + id,
      }).done(function(response) {
          if (response.error !== '') {
              $('#boardDeleteAlert').text(response.error).removeClass('hidden');
          } else {
              window.location.reload();
          }
      });
    });

    $('#changeBoard').on('change', function() {
        let id = $(this).val();

        window.location.href = '/board/' + id;
    });
});
