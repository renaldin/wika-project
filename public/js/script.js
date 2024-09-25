console.log('MASUKKK');
document.addEventListener('DOMContentLoaded', function () {
    const buttonConfirm = document.querySelectorAll('.btn-confirm');
    buttonConfirm.forEach(button => {
        button.addEventListener('click', function () {
            const title = this.getAttribute('data-title');
            const href = this.getAttribute('data-href');
            const content = this.getAttribute('data-content');
            const buttonColor = this.getAttribute('data-button-color');
            
            const existingModal = document.getElementById('modalConfirm');
            if (existingModal) {
                existingModal.remove();
            }

            const modalHtml = `
                <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="tooltipmodal" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">${title}</h5>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="mt-2">${content}</p>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-bs-dismiss="modal">Tidak</button>
                            <a href="${href}" class="btn ${buttonColor}" type="button">Ya</a>
                          </div>
                        </div>
                      </div>
                </div>
            `;

            document.body.insertAdjacentHTML('beforeend', modalHtml);
            $('#modalConfirm').modal('show');
        });
    });
});

$(document).ready(function() {
  $('.select2').select2();
});

$(function() {
    $("#role").on("change", function() {
        let role = $(this).val();
        const fungsiDiv = document.getElementById('fungsi-div');
        const fungsiLabel = document.getElementById('fungsi-label');
        const fungsiForm = document.getElementById('fungsi-form');
        if (role == 'Head Office') {
          fungsiDiv.style.display = 'block';
          fungsiLabel.style.display = 'block';
          fungsiForm.style.display = 'block';
          fungsiForm.required = true;
        } else {
          fungsiDiv.style.display = 'none';
          fungsiLabel.style.display = 'none';
          fungsiForm.style.display = 'none';
          fungsiForm.required = false;
        }
    });
});

