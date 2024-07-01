# Sistem za slanje paketa 
Example: Bex, USPS, UPS, DHL

Koje tehnologije koristimo?
- PHP OOP
- Javascript (Jquery)
- MySQL
- Bootstrap 5
- Jetbrains AI 
- ChatGPT

1. Mogucnost slanja posiljke
   - Medjunarodna 
   - Lokalna
   - Cena zavisi od
      - tezine paketa
      - lokacije
        - Ako je EU zemlja skup shipping
        - Ako je US najskuplji shipping
        - Ako je sa Balkana jeftiniji shipping
      - vrste slanja paketa
        - avionom, brodom, kombijem
   
2. Log posiljke
   - Sta se desilo sa posiljkom (update kako ide)
   - Pregled sa strane korisnika oko same posiljke

3. Opis posiljke:
   - Svaka posiljka ima 
     - Status 
       - Poslato, Primljeno, Odbijeno, Vraceno
     - Posaljioc 
       - user_id iz naseg sistema
     - Odakle ide posiljka
     - Gde ide posiljka
     - Vrsta slanja posiljke
     - Cena
     - Otkup
     - ID posiljke


4. Pracenje posiljke:
   - Pracenje posiljke preko profila
   - Pracenje posiljke putem ID-a