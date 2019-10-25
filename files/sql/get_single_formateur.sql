SELECT *
FROM formateur
WHERE email_formateur = '@email_formateur'
    AND mot_de_passe_formateur = '@mot_de_passe_formateur'
    AND actif_formateur = 1