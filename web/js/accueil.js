const CSS = {
    show_border_under_section: {
        "border": "1px solid #7fc241"
    },
    hide_border_under_section: {
        "border": "1px solid transparent"
    },
    show_carre_absolute: {
        "border":"1px solid #7fc241",
        "border-top-color": "#fff",
        "border-bottom-color": "#fff",
        "background": "white"
    },
    hide_carre_absolute: {
        "border":"1px solid transparent",
        "border-top-color": "transparent",
        "border-bottom-color": "transparent",
        "background": "transparent"
    },
    show_carre_parameter_absolute: {
        "border": "1px solid #7fc241",
	    "border-top": "1px solid transparent",
        "border-bottom": "1px solid transparent",
        "background": "#fff"
    },
    border_for_absolute_section_accueil: {
        "border-left": "1px solid #7fc241",
        "border-right": "1px solid #7fc241"
    }
}

const toggleCarre = (targetSection, numIdCarre) => {
    let showIsTrue = false
    $("#absolute-section").children().map(function() {
        let element = $(this).attr('id')
        let ishow = $(this).attr('ishow')

        if(element == `carre-${numIdCarre}` && !ishow){
            $(this).attr('ishow','true')
            $(`#${element}`).css(CSS.show_carre_absolute)
        }
        else {
            $(this).attr('ishow','')
            $(`#${element}`).css(CSS.hide_carre_absolute)
        }
    })

    $("#absolute-section").children().map(function() {
        let ishow = $(this).attr('ishow')
        if(ishow == "true"){
            showIsTrue = true
        }
    })

    switch(targetSection){
        case "parametre":
            $("#under-section").html(templateSectionParametre())
            break
        case "programme":
            $("#under-section").html(templateSectionProgramme())
            break
        case "production":
            $("#under-section").html(templateSectionProduction())
            break
        default:
            $("#under-section").html(templateSectionAssiduite())
    }

    if(showIsTrue){
        $("#under-section").css(CSS.show_border_under_section)
    }else{
        $("#under-section").css(CSS.hide_border_under_section)
        $("#under-section").empty()
    }
}

const toggleCarreParameter = (targetSection, numIdCarre) => {
    let showIsTrue = false
    $("#absolute-section-accueil").children().map(function() {
        let element = $(this).attr('id')
        let ishow = $(this).attr('ishow')

        if(element == `carre-parameter-${numIdCarre}` && !ishow){
            $(this).attr('ishow','true')
            $(`#${element}`).css(CSS.show_carre_parameter_absolute)
        }
        else {
            $(this).attr('ishow','')
            $(`#${element}`).css(CSS.hide_carre_absolute)
        }
    })
    $("#absolute-section-accueil").children().map(function() {
        let ishow = $(this).attr('ishow')
        if(ishow == "true"){
            showIsTrue = true
        }
    })

    switch(targetSection){
        case "formation":
            $("#section-under-carre").html(templateFormationSession())
            break
        case "stagiaires":
            $("#section-under-carre").html(templateStagiaires())
            break
        case "modalites":
            $("#section-under-carre").html(templateModalitePmt())
            break
        case "hebdo":
            $("#section-under-carre").html(templateRythmeHebdo())
            break
        default:
            $("#section-under-carre").html(templateFermetureExceptionnelle())
    }
    
    if(!showIsTrue){
        $("#section-under-carre").empty()
    }
}