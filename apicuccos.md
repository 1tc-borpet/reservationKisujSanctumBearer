Reservation API Dokumentáció

Ez a dokumentáció bemutatja a Reservation API használatát a mellékelt Postman-kollekció alapján. A rendszer regisztrációt, bejelentkezést, kijelentkezést, valamint foglalások teljes CRUD műveleteit támogatja.


---

Alapinformációk

Kulcs	Érték

Base URL	{{base_url}} (alapértelmezés: https://template.postman-echo.com)
Hitelesítés	Bearer Token
Content-Type	application/json



---

Autentikációs végpontok


---

1. Teszt hívás

GET /hello
Egyszerű tesztendpoint a kapcsolat ellenőrzésére.

Példa válasz:

{
  "message": "Hello World"
}


---

2. Regisztráció

POST /register

Kérelem törzse:

{
  "name": "boros1",
  "email": "boros1@gmail.com",
  "password": "Jelszo2025",
  "password_confirmation": "Jelszo2025"
}

Sikeres válasz (példa):

{
  "message": "User registered successfully",
  "token": "..."
}


---

3. Login

POST /login

Request body:

{
  "email": "boros1@gmail.com",
  "password": "Jelszo2025"
}

Sikeres válasz példa:

{
  "token": "3|dvoJA10sB2ABXjmaqF4YHAKXkpVgXJLlJaPdOWhUce01a0e3"
}


---

4. Logout

POST /logout
Authorization: Bearer TOKEN

Body (nem szükséges, de a kollekció tartalmazott):

{
  "email": "tesztelek@gmail.com",
  "password": "Password2025"
}


---

Foglalások (Reservations) API


---

1. Összes foglalás lekérése

GET /reservations
Authorization: Bearer TOKEN

Példa sikeres válasz:

[
  {
    "id": 1,
    "reservation_time": "2025-10-02 18:43:30",
    "guests": 4,
    "note": "patyizgatunk"
  }
]


---

2. Egy foglalás lekérése

GET /reservations/{id}

Példa:

GET /reservations/2


---

3. Új foglalás létrehozása

POST /reservations
(Postman-ben: "1 uj")

Body:

{
  "reservation_time": "2025-10-02 18:43:30",
  "guests": "4",
  "note": "es tudja"
}


---

4. Foglalás teljes frissítése (PUT)

PUT /reservations/{id}

Példa:

PUT /reservations/11

Body:

{
  "reservation_time": "2025-10-02 18:43:30",
  "guests": "4",
  "note": "valami jo cucc"
}


---

5. Foglalás részleges frissítése (PATCH)

PATCH /reservations/{id}

Példa:

PATCH /reservations/11

Body:

{
  "note": "na ez mar valami"
}


---

6. Foglalás törlése

DELETE /reservations/{id}

Példa:

DELETE /reservations/11


---

Postman Tesztek

A kollekció tartalmaz néhány automatikus tesztet.

GET /reservations

pm.test("Status code is 200", function () {
    pm.response.to.have.status(200);
});

GET /reservations/2

pm.test("Successful POST request", function () {
    pm.expect(pm.response.code).to.be.oneOf([200, 201]);
});

PATCH /reservations/11

pm.test("Successful PUT request", function () {
    pm.expect(pm.response.code).to.be.oneOf([200, 201, 204]);
});


---

Összegzés

Ez a dokumentáció részletesen bemutatta:

Az autentikáció működését

A foglalási rendszer CRUD műveleteit

A Postman-ben definiált teszteket

Példa kérelmeket és válaszokat



---
