$(document).ready(function(){

    $('.servicii_block__grid_item').click(function(){
        let textNumber = $(this).data('text-number');
        let innerText;

        if (textNumber == '1') {
            innerText = text_1;
        } else if (textNumber == '2') {
            innerText = text_2;
        } else if (textNumber == '3') {
            innerText = text_3;
        } else if (textNumber == '4') {
            innerText = text_4;
        } else if (textNumber == '5') {
            innerText = text_5;
        } else if (textNumber == '6') {
            innerText = text_6;
        } else if (textNumber == '7') {
            innerText = text_7;
        } else if (textNumber == '8') {
            innerText = text_8;
        } else if (textNumber == '9') {
            innerText = text_9;
        }

        let textBlock = $('#modalTextBlock');

        textBlock.html(innerText);

    });

    $('.footer_btn').click(function(){
        var formType = $(this).data('form-type');
        $('#modalContactForm__formType').val(formType);
    });

    $('#modalContactForm__button').click(function(){
        var formType = $('#modalContactForm__formType').val();
        var name = $('#modalContactForm__name').val();
        var phone = $('#modalContactForm__phone').val();

        if (name == '') {
            alert('Introdu numele tau');
            return false;
        } else if (phone == '') {
            alert('Introdu numarul tau de telefon');
            return false;
        }

        $.ajax ({
            url: 'ajax/mail.php',
            type: 'POST',
            cache: false,
            data: {
                'name': name, 'phone': phone, 'formType': formType
            },
            dataType: 'html',
            beforeSend: function () {
                $("#modalContactForm__button").prop("disabled", true);
            },
            success: function (data){
                if(!data)
                    alert("Были ошибки, сообщение не отправлено");
                else
                    $("#modalContactForm").trigger("reset");
                    alert("Am primit comanda!");
                    $("#modalContactForm__button").prop("disabled", false);
                    $("#modalForm").modal('hide');
            },
        });

    });

    $('#contactForm__button').click(function(){
        var name = $('#contactForm__name').val();
        var phone = $('#contactForm__phone').val();

        if (name == '') {
            alert('Introdu numele tau');
            return false;
        } else if (phone == '') {
            alert('Introdu numarul tau de telefon');
            return false;
        }

        $.ajax ({
            url: 'ajax/contact-mail.php',
            type: 'POST',
            cache: false,
            data: {
                'name': name, 'phone': phone
            },
            dataType: 'html',
            beforeSend: function () {
                $("#contactForm__button").prop("disabled", true);
            },
            success: function (data){
                if(!data)
                    alert("Были ошибки, сообщение не отправлено");
                else
                    $("#contactForm").trigger("reset");
                    alert("Am primit comanda!");
                    $("#contactForm__button").prop("disabled", false);
            },
        });

    });

    let text_1 = '<p class="text">E un serviciu necesar oricărei afaceri şi nu doar. Acesta constă în menţinerea şi verificarea actelor importante ale companiei. Ele sunt apreciate şi analizate în conformitate cu legislaţia în vigoare. De asemenea, sunt anticipate posibilele riscuri ce pot surveni în companie şi duce la anumite pagube.</p><p class="text_header">Un audit juridic înseamnă controlul:</p><ul><li>Executării, redactării contractelor, transparenţei şi a altor anexe suplimentare, acte sau cereri de primire a unor servicii, bunuri, lucrări etc.</li><li>Documentelor şi relaţiilor dintre angajaţi, angajaţi şi angajator;</li><li>Evoluţiei şi dezvoltării economice a companiei;</li><li>Relaţiei companiei cu actorii din cadrul oragenlor de stat autorizate;</li><li>Procedurilor de executare, litigiilor şi creanţelor;</li></ul><p class="text_header">Avantajele unui audit juridic:</p><ul><li>Asigurarea confidenţialităţii din partea juristului;</li><li>Controlul perfomanţelor din activitatea angajaţilor;</li><li>Opţiunea de a încheia un abonament de prestări de servicii juridice pentru o perioadă avantajoasă;</li><li>Identificarea şi fixarea unor erori depistate în baza recomandărilor menţionate, într-un raport detaliat oferit de jurist privind activitatea companiei;</li><li>Oferirea datelor privind dezvoltarea şi activitatea companiei în raport cu normele legale în vigoare;</li></ul>';    
    let text_2 = '<p class="text">Succesul unei afaceri se bazează şi pe o echipă de angajaţi profesionişti. Fiecare profesionist e din domenii diferite, inclusiv cel juridic. Rolul unui jurist într-o companie reprezintă un binom de manager şi jurist, fapt ce permite să fie ajustat în mod eficient activitatea departamentului juridic.</p><p class="text">Este unul foarte important, mai ales în corporaţii sau acolo unde numărul de angajaţi este unul numeros.</p><p class="text_header">Managementul juridic implică:</p><ul><li>Verificarea şi controlul eficienţei departamentului juridic;</li><li>Verificarea şi controlul calităţii departamentului juridic;</li><li>Verificarea actelor elaborate;</li><li>Elaborarea strategiei a securităţii juridice, economice şi fiscale;</li><li>Optimizarea sistemului juridic al afacerii;</li></ul>';
    let text_3 = '<p class="text">Există opţiunea unui abonament ce include suportul, consultanţa şi consilierea juridică a companiei sau organizaţiei. Serviciul vine să anticipeze unele riscuri finaciare şi de ordin juridic, dar şi să gestioneze potenţialele situaţii ce necesită implicarea juristului.</p><p class="text_header"> De ce e necesar acest tip de abonament?</p><ul><li>Clientul are garanţia suportului juridic profesionist, conform unor termeni şi a unei taxe de abonament;</li><li>Servicii de consultări scrise sau verbale;</li><li>Analiza şi expertizarea contractelor oferite de client şi formularea unor recomandări;</li><li>Reprezentarea intereselor şi drepturilor companiei atunci când e supusă unor controale de stat sau fiscale;</li><li>Furnizarea şi elaborarea unor documente cu caracter juridic;</li><li>Implicarea şi participarea în procesul de negocieri cu diverşi actori (clienţi, parteneri etc.);</li><li>Oferirea suportului informativ privind ultimele modificări ale legislaţie;</li></ul>';
    let text_4 ='<p class="text">Este necesară pentru a asigura accesibilitatea şi eficienţa remunerării echitabile, integrale, conform unor termeni prestabiliţi. Respectarea achitării impozitelor şi altor taxe. Asistenţa fiscală e un suport venit să ajute antreprenorul să aibă o activitate transparentă, inclusiv în raport cu obligaţiile faţă de legile fiscale, dar şi în calitatea sa de contribuabil.</p><p class="text_header">Asistenţa respectivă poate avea mai multe forme:</p><ul><li>Oferirea unui răspuns la o întrebare (verbală sau scrisă);</li><li>Verificarea şi analiza riscurilor fiscale, inclusiv a actelor oferite de client;</li><li>Reprezentarea drepturilor şi interesului în cadrul unui control fiscal, litigiilor fiscale, vizitei inspectorilor fiscali etc.</li><li>Oferirea unor rapoarte în baza informaţiilor colectate, interpretate şi structurate;</li></ul>';
    let text_5 = '<p class="text">Antreprenorul are suportul juridic al expertului în elaborarea şi întocmirea actelor juridice, inclusiv a contractelor cu parteneri şi clienţi. Orice act juridic care stă la baza oricărei tranzacţii din cadrul companiei este atent verificat de jurist. Tipul, conţinutul şi modalitatea de încheiere a contractului sau al oricărui act ce poate crea unele riscuri, dar şi obligaţii este întocmit conform normelor legale, dar şi a interesului nemijlocit al antreprenorului.</p><p class="text_header">Misiunea juristului este de a:</p><ul><li>Anticipa şi reduce potenţialele riscuri;</li><li>Oferi soluţii pentru potenţialele neînţelegeri de ordin juridic şi extrajuridic;</li><li>Înregistra relaţii de drept civil;</li><li>Gestiona corect rapoartele de muncă;</li><li>Oferi informaţii la cerere;</li></ul>';
    let text_6 = '<p class="text">aici trebuie sa fie text</p>';
    let text_7 = '<p class="text">Gama serviciilor Cabinetului Avocatului Ludmila Goncearenco cuprinde un arial extins de expertiză în sfera juridică. Sunt deschisă în faţa solicitărilor legate de orice problemă de ordin juridic!</p><p class="text">Cu o experienţă de 10 ani în domeniul justiţiei, stagiere şi activitate în instituţii- cheie ale domeniului justiţiar, prestez servicii bazate pe litera legii, ofer soluţii individuale fiecărui caz, consultanţă şi suport.</p><p class="text">Mereu am ca premisă în munca mea, litera legii!</p>';
    let text_8 = '<p class="text">Conform legislaţiei în vigoare, activitatea de antreprenoriat poate fi desfăşurată după  mai multe forme organizatorico-juridice. Misiunea unui jurist în bunul mers al lucrurilor al acestei activităţi este să prevadă şi să elimine potenţialele riscuri, pierderi ce pot apărea în urma unei întocmiri defectuoase a setului de acte necesare lansării şi funcţionării afacerii.</p>';
    let text_9 = '<p class="text">Acesta include tot setul de activităţi juridice înaintate cu scopul de a respecta drepturile şi interesele contribuabilului, dar şi de a oferi argumente de ordin juridic privind poziţia companiei.</p><p class="text_header">În cadrul asistenţei sunt incluse următoarele servicii:</p><ul><li>Oferirea suportului şi consilierei la procesul de calculare a obligaţiei fiscale suplimentare;</li><li>Oferirea suportului şi consilierei la acţiuni de executare silită;</li><li>Elaborarea unor rapoarte privind respectarea regulilor de conduită atunci când sunt controale sau se examinează un dezacord, o contestaţie sau au loc unele confiscări;</li><li>Elaborarea şi întocmirea dezacordului şi prezenţa la examinarea acestuia, inclusiv la elaborarea şi întocmirea dezacordului;</li><li>Prezenţa la examinarea contestaţiei;</li><li>Analiza juridică a indicaţiilor şi observaţiilor apărute după controlul inspectorilor;</li><li>Pregătirea informaţiie solicitată de către inspectori;</li><li>Verificarea şi analiza controalelor fiscale şi elaborarea raportului ce ulterior poate fi prezentat în Instanţă;</li></ul>';
});