SELECT *
FROM formateur
WHERE email_formateur = '@email_formateur'
    AND mot_de_passe_formateur = '@pwd_formateur'
    AND actif_formateur = 1