    TABLES : 
    - User:
        - PK -> user id (not null) (int) (AUTO_INCREMENT)
        - first name (not null) (CHARSET)
        - last name (not null) (CHARSET)
        - mail (not null)
        - mot de passe  (not null)
        - pseudo (not null)
        - 

    - Association user album
        - PK FK -> id album (not null)
        - FK -> user id (not null)

    - Pour l'album
        - FK -> Id de l'album (not null) (auto_increment)
        - Nom de l'album (not null)
        - FK id morceau (not null)
        - Artiste de l'album (not null)
        - Pochette de l'album (lien de l'image google) (null) (TEXT)
        - Année de l'album  (null)
    
    - Morceaux :
        - PK -> Id du morceaux (not null)
        - id de l'album
        - durée de chaque morceau (null) 
        - Titre du morceaux (not null)
        - Artiste (not null)
        - Album (not null)

    - Artistes :
        - Nom de l'artiste (not null)
        - Albums (not null)
        - id album (not null)


    (mettre AUTO_INCREMENT quand on incrémente un id)