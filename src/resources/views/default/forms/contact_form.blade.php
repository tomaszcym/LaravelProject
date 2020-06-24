
<form class="contact-form">
    @csrf


    <div class="form-group">
        <label for="name">Imię i nazwisko</label>
        <input id="name" name="name" type="text" placeholder="Podaj imię i nazwisko"
               class="form-control">
        <span class="invalid-feedback">
        </span>
    </div>

    <div class="form-group">
        <label for="phone_number">Telefon kontaktowy</label>
        <input id="phone_number" name="phone_number" type="text" placeholder="Podaj telefon kontaktowy"
               class="form-control">
        <span class="invalid-feedback">
        </span>
    </div>

    <div class="form-group">
        <label for="email">Adres email</label>
        <input id="email" name="email" type="text" placeholder="Podaj adres email"
               class="form-control">
        <span class="invalid-feedback">
        </span>
    </div>

    <div class="form-group">
        <label for="message">Tekst</label>
        <textarea name="message" id="message" rows="5" placeholder="Tekst"
                  class="form-control ckeditor"></textarea>
            <span class="invalid-feedback">
            </span>
    </div>



    <div class="form-group">
        <div class="form-check">
            <input type="checkbox" id="rodo" name="rodo" placeholder="Status"
                   class="form-check-input">
            <label for="rodo" class="form-check-label"><small>Zgadzam się na przetwarzanie moich informacji osobowych (RODO)</small></label>
            <span class="invalid-feedback">
            </span>
        </div>
    </div>


    <p class="text-success" style="display: none;">Wiadomość została wysłana. Dziękujemy za wypełnienie formularza!</p>
    <p class="text-danger" style="display: none">Coś poszło nie tak, przepraszamy!</p>


    <button type="submit" class="button-blue">Wyślij</button>
</form>


<script>
    $(document).ready(function () {
        $('.contact-form').submit(function (e) {
            e.preventDefault();

            const fields = $(this).serializeArray();

            $.post('{{route('api.contact-form')}}', fields)
                .done(function (data) {
                    if(data['status'] === 'ok') {
                        $('.contact-form').find("input[type=text], textarea").val("");
                        $('.contact-form input[type=checkbox]').prop('checked', false)
                        $('.contact-form .text-success').toggle();
                        return;
                    }


                    $('.contact-form input').removeClass('is-invalid');
                    $('.contact-form textarea').removeClass('is-invalid');
                    $('.contact-form .invalid-feedback').text('');

                    const errors = data['errors'];
                    const values = data['values'];

                    for(let error in errors) {
                        let input = $('.contact-form input[name='+ error +']');
                        if($(input).length === 0) {
                            input = $('.contact-form textarea[name='+ error +']');
                        }
                        $(input).addClass('is-invalid');
                        let feedbackField = $(input).closest('.form-group').find('.invalid-feedback');
                        $(feedbackField).text(errors[error][0]);
                    }
                })
                .fail(function (jqXHR, status, error) {
                    $('.contact-form input').removeClass('is-invalid');
                    $('.contact-form textarea').removeClass('is-invalid');
                    $('.contact-form .invalid-feedback').text('');
                    console.log(jqXHR);
                    console.log(status);
                    console.log(error);
                    $('.contact-form .text-danger').toggle();
                });

        });
    });
</script>
