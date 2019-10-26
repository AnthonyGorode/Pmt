const templateSectionParametre = () => {
    return `
        <div id="section-carre" class="section_carre d-flex justify-content-between">
            <div class="section_carre_element" onclick="toggleCarreParameter('formation',1)">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img class="section_carre_element_logo" src="img/Cap.png" alt="Photo de cog"/>
                    <h1 class="section_carre_element_title">FORMATION SESSION</h1>
                </div>
                <br>
                <span class="span_blue">(2)</span>
            </div>

            <div class="section_carre_element" onclick="toggleCarreParameter('stagiaires',2)">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img class="section_carre_element_logo" src="img/people.png" alt="Photo de cog"/>
                    <h1 class="section_carre_element_title">STAGIAIRES</h1>
                </div>
                <br>
                <span class="span_blue">(2)</span>
            </div>

            <div class="section_carre_element" onclick="toggleCarreParameter('modalites',3)">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img class="section_carre_element_logo" src="img/list_blue.png" alt="Photo de cog"/>
                    <h1 class="section_carre_element_title">MODALITES PMT</h1>
                </div>
                <br>
                <span class="span_blue">(2)</span>
            </div>

            <div class="section_carre_element" onclick="toggleCarreParameter('hebdo',4)">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img class="section_carre_element_logo" src="img/clock.png" alt="Photo de cog"/>
                    <h1 class="section_carre_element_title">RYTHME HEBDOMADAIRE</h1>
                </div>
                <br>
                <span class="span_blue">(2)</span>
            </div>

            <div class="section_carre_element" onclick="toggleCarreParameter('fermeture',5)">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img class="section_carre_element_logo" src="img/sun.png" alt="Photo de cog"/>
                    <h1 class="section_carre_element_title">JOURS DE FERMETURE EXCEPTIONNELLE</h1>
                </div>
                <br>
                <span class="span_blue">(2)</span>
            </div>
        </div>

        <div id="absolute-section-accueil" class="d-flex justify-content-between">
            <div id="carre-parameter-1" class="absolute_section_accueil_element" ishow=""></div>
            <div id="carre-parameter-2" class="absolute_section_accueil_element" ishow=""></div>
            <div id="carre-parameter-3" class="absolute_section_accueil_element" ishow=""></div>
            <div id="carre-parameter-4" class="absolute_section_accueil_element" ishow=""></div>
            <div id="carre-parameter-5" class="absolute_section_accueil_element" ishow=""></div>
        </div>

        <div id="section-under-carre" class="section_carre_parameter_element d-flex justify-content-between"></div>
    `
}

const templateFormationSession = () => {
    return `
        <div id="section-formation-session">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img class="section_carre_element_logo" src="img/Cap.png" alt="Photo de cog"/>
                <h1 class="section_carre_element_title">FORMATION SESSION</h1>
            </div>
            <br>
            <span class="span_blue">(2)</span>
        </div>
    `
}

const templateStagiaires = () => {
    return `
    <div id="section-formation-session">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img class="section_carre_element_logo" src="img/people.png" alt="Photo de cog"/>
            <h1 class="section_carre_element_title">STAGIAIRES</h1>
        </div>
        <br>
        <span class="span_blue">(2)</span>
    </div>
    `
}

const templateModalitePmt = () => {
    return `
    <div id="section-formation-session">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img class="section_carre_element_logo" src="img/list_blue.png" alt="Photo de cog"/>
            <h1 class="section_carre_element_title">MODALITES PMT</h1>
        </div>
        <br>
        <span class="span_blue">(2)</span>
    </div>
    `
}

const templateRythmeHebdo = () => {
    return `
    <div id="section-formation-session">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img class="section_carre_element_logo" src="img/clock.png" alt="Photo de cog"/>
            <h1 class="section_carre_element_title">RYTHME HEBDOMADAIRE</h1>
        </div>
        <br>
        <span class="span_blue">(2)</span>
    </div>
    `
}

const templateFermetureExceptionnelle = () => {
    return `
    <div id="section-formation-session">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img class="section_carre_element_logo" src="img/sun.png" alt="Photo de cog"/>
            <h1 class="section_carre_element_title">JOURS DE FERMETURE EXCEPTIONNELLE</h1>
        </div>
        <br>
        <span class="span_blue">(2)</span>
    </div>
    `
}