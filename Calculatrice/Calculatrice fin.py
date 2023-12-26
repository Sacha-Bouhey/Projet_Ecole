def somme_element(element):
    soso = 0
    for i in element:
        soso += i   
    return soso

#compteur
def nombre_char(element):
    nbr_char = 0
    for char in element:
        nbr_char += 1
    return nbr_char

#Si element est une chaine on l'inverse et on la return, et si l'element est une liste on l'inverse et on la return
def inverse(element):
    if type(element) == str:
        chaine_inverse = ''
        for c in element:
            chaine_inverse = c + chaine_inverse
        return(chaine_inverse)
        
    elif type(element) == list:
        compteur = 0
        liste_inverse = []
        while(compteur > (nombre_char(element) - nombre_char(element)*2)):
            compteur -=1
            liste_inverse.append(element[compteur])
        return(liste_inverse)

#Je vérifie si le paramètre est décimal
def verification_decimal(chaine):
    liste = "0123456789"
    for i in chaine:
        if i not in liste:
            return False
    return(chaine)

#Vérification hexadécimal
def verification_hexadecimal(chaine):
    liste = "0123456789aAbBcCdDeEfF"
    for i in chaine:
        if i not in liste:
            return False
    return(chaine)

#Je vérifie si le chiffre est binaire
def verification_binaire(chaine):
    liste = "01"
    for i in chaine:
        if i not in liste:
            return False
    return(chaine)

#Je fait la conversion du paramètre en binaire
def conversion_decimal_to_binary(chaine):    
    if not verification_decimal(chaine):
        return False
    else:
        result = []
        chaine = int(chaine)
        while chaine > 0:
            reste = int(chaine) % 2
            print('on diviste',chaine,'par 2 et on prend le reste',reste,)
            chaine //= 2
            result.append(reste)
        return inverse(result)
    
#Je fais le conversion du paramètre en hexa
def conversion_decimal_to_hexa(chaine):  
    if not verification_decimal(base):
        return False
    else:
        compteur = 0
        result = []
        chaine = int(chaine)
        while chaine > 0:
            reste = int(chaine) % 16
            chaine //= 16
            result.append(reste)
        for i in result:
            if i == 10:
                result[compteur] = "A"
            elif i == 11:
                result[compteur] = "B"
            elif i == 12:
                result[compteur] = "C"
            elif i == 13:
                result[compteur] = "D"
            elif i == 14:
                result[compteur] = "E"
            elif i == 15:
                result[compteur] = "F"
            compteur += 1
        return inverse(result)


#Je fais une conversion de binaire à décimal
def conversion_binary_to_decimal(chaine):
    if not verification_binaire(chaine):
        return False
    else:
        etape1 = []
        result = ""
        compteur = nombre_char(chaine)
        for bin in chaine:
            compteur -= 1
            etape1.append(int(bin) * 2 ** int(compteur))
        result = somme_element(etape1)
        return result

#Conversion hexadécimal en décimal
def conversion_hexa_to_decimal(chaine):
    if not verification_hexadecimal(chaine):
        return False
    else:
        compteur = 0
        lchaine = list(chaine)
        for i in lchaine:
            if i == "A" or i == "a":
                lchaine[compteur] = 10
            elif i == "B" or i == "b":
                lchaine[compteur] = 11
            elif i == "C" or i == "c":
                lchaine[compteur] = 12
            elif i == "D" or i == "d":
                lchaine[compteur] = 13
            elif i == "E" or i == "e":
                lchaine[compteur] = 14
            elif i == "F" or i == "f":
                lchaine[compteur] = 15
            compteur += 1
        compteur = nombre_char(lchaine)
        resultat_decimal  = 0
        for hexa in lchaine:
            compteur -= 1
            resultat_decimal += (int(hexa) * (16 ** int(compteur)))
        return str(resultat_decimal)
        
quitter = ""
while quitter != "oui" and quitter != "Oui":
    choix = ""
    while choix != "1" and choix != "2" and choix != "3" and choix != "4" and choix != "5" and choix != "6":
        print("Voici mon projet calculatrice. Veuillez choisir un calcul à effectuer.")
        print("1: Décimal en binaire")
        print("2: Décimal en hexadécimal")
        print("3: Binaire en décimal")
        print("4: Hexadécimal en décimal")
        print("5: Binaire en hexadécimal")
        print("6: Hexadécimal en binaire")
        choix = input("Choisir méthode de calcul : ")

    if choix == "1":
        base = input("Entre nombre décimal : ")
        resultat = conversion_decimal_to_binary(base)
        while not resultat:
            print("Ton chiffre n'est pas décimal")
            base = input("Entre nombre décimal : ")
            resultat = conversion_decimal_to_binary(base)
    elif choix == "2":
        base = input("Entre nombre décimal : ")
        resultat = conversion_decimal_to_hexa(base)
        while not resultat:
            print("Ton chiffre n'est pas décimal")
            base = input("Entre nombre décimal : ")
            resultat = conversion_decimal_to_hexa(base) 
    elif choix == "3":
        base = input("Entre nombre binaire : ")
        resultat = conversion_binary_to_decimal(base)
        while not resultat:
            print("Ton chiffre n'est pas binaire")
            base = input("Entre nombre binaire : ")
            resultat = conversion_binary_to_decimal(base)
    elif choix == "4":
        base = input("Entre nombre hexadécimal : ")
        resultat = conversion_hexa_to_decimal(base)
        while not resultat:
            print("Ton chiffre n'est pas hexadécimal")
            base = input("Entre nombre hexadécimal : ")
            resultat = conversion_hexa_to_decimal(base)
    elif choix == "5":
        base = input("Enter nombre binaire : ")
        resultat = conversion_decimal_to_hexa(conversion_binary_to_decimal(base))
        while not resultat:
            print("Ton chiffre n'est pas binaire")
            base = input("Enter nombre binaire : ")
            resultat = conversion_decimal_to_hexa(conversion_binary_to_decimal(base))
    elif choix == "6":
        base = input("Entre nombre hexadécimal : ")
        resultat = conversion_decimal_to_binary(conversion_hexa_to_decimal(base))
        while not resultat:
            print("Ton chiffre n'est pas binaire")
            base = input("Entre nombre hexadécimal : ")
            resultat = conversion_decimal_to_binary(conversion_hexa_to_decimal(base))

    print(resultat)
    quitter = str(input("Voulez-vous quitter (oui/non)? : "))
    while quitter != 'oui' and quitter != 'Oui' and quitter != 'OUI' and quitter != 'non' and quitter != 'Non' and quitter != 'NON':
        print("Erreur dans la saisie...")
        quitter = str(input("Voulez-vous quitter (oui/non)? : "))

    print(quitter)
print("au revoir")