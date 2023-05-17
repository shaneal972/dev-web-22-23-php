(function(){

    let correspondance = [
        ['Pas de choix', 'Pas de choix'],
        ['do', 'C'],
        ['re', 'D'],
        ['mi', 'E'],
        ['fa', 'F'],
        ['sol', 'G'],
        ['la', 'A'],
        ['si', 'B'],
        ['do', 'C']
    ];
    
    console.log(correspondance);

    window.addEventListener('load', function(event){
        let form = document.createElement('form');
        form.setAttribute('name', 'notation-musique');
        form.setAttribute('method', 'GET');
        form.setAttribute('action', '#');

        // Créer l'element select
        let select = document.createElement('select');
        select.setAttribute('id', 'correspondance');
        // Créer les options du select à l'aide du tableau correspondance
        let option = '';
        correspondance.forEach(element => {
            option = new Option(element[0], element[1]);
            select.appendChild(option);
        });
        // Ajout du select au formulaire 'notation-musique'
        form.appendChild(select);

        // Ajout du formulaire au body
        this.document.body.appendChild(form);
        console.log(form);

        let selectCorrespondance = document.querySelector('#correspondance');
        // console.log(sel);
        selectCorrespondance.addEventListener('change', function(event){
            
            let notationAmericaine = this.value;
            let notationClassique = this.options[select.selectedIndex].text;

            alert("La notation américaine pour la note " + notationClassique + " est " + notationAmericaine);
        })

    });

})();