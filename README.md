
📚 Campus Master – Plateforme de Gestion Académique (Microservices)

🎯 Présentation du projet

Campus Master est une plateforme web de gestion académique basée sur une architecture microservices :
	•	👨‍🎓 Étudiants : inscription, connexion, profil, accès aux cours
	•	👨‍🏫 Enseignants : gestion de leurs cours, chapitres, contenus
	•	🧑‍💼 Admin : gestion des enseignants et des cours
	•	📩 Envoi d’emails asynchrones via queue (jobs Laravel)
	•	🌐 Frontend moderne en Next.js
	•	📖 Documentation API avec Swagger / OpenAPI

⸻

🧱 Architecture globale


| Dossier / Fichier     | Description                                         |
|----------------------|-----------------------------------------------------|
| campus-master/       | Dossier racine du projet                            |
| user-service/        | Authentification, gestion des étudiants et enseignants |
| course-service/      | Cours, chapitres, contenus, devoirs (assignments)   |
| frontend/            | Application web Next.js (interface utilisateur)     |
| docs/                | Swagger & documentation technique                  |




⚙️ Technologies utilisées

Couche	Techno
Backend	Laravel 10
Frontend	Next.js 14 (App Router)
Auth	Laravel Sanctum
Queue	Laravel Queue (Database)
DB	MySQL (MAMP / Docker)
Docs API	Swagger (L5-Swagger)
Architecture	Clean Architecture + Microservices




🔌 Ports des microservices

Service	URL	Port
```bash 
User Service	http://127.0.0.1:8000	8000
Course Service	http://127.0.0.1:8001	8001
Frontend (Next.js)	http://localhost:3000	3000
MySQL (MAMP)	localhost	888
```

🚀 Démarrage rapide (Installation)

1️⃣ Cloner les dépôts

git clone https://github.com/ton-compte/campus-master-user-service.git
git clone https://github.com/ton-compte/campus-master-course-service.git
git clone https://github.com/ton-compte/campus-master-frontend.git


🔧 Configuration du User Service
``` bash 
cd user-service
composer install
cp .env.example .env
php artisan key:generate
```

.env (exemple MAMP)

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=user_service_db
DB_USERNAME=root
DB_PASSWORD=root

``` bash
php artisan migrate
php artisan db:seed
php artisan serve --port=8000

```

➡ API dispo sur :
```👉 http://127.0.0.1:8000```

🔧 Configuration du Course Service

cd course-service
composer install
cp .env.example .env
php artisan key:generate

.env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=courses_service_db
DB_USERNAME=root
DB_PASSWORD=root

```bash
php artisan migrate
php artisan serve --port=8001
```

🌐 Frontend (Next.js)

cd frontend
npm install
npm run dev

➡ Application web :
👉 ```http://localhost:3000```

🔐 Authentification (Flow)
	1.	L’étudiant / enseignant se connecte via user-service
	2.	Le user-service renvoie un token Sanctum
	3.	Le frontend stocke le token
	4.	Toutes les requêtes vers course-service utilisent :

Authorization: Bearer TOKEN

📩 Envoi d’emails avec Queue (Laravel)

⚡ Configuration

Dans .env :
``` bash
QUEUE_CONNECTION=database
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=xxx@gmail.com
MAIL_PASSWORD=xxxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=xxx@gmail.com
MAIL_FROM_NAME="Campus Master"
```

📦 Créer les tables queue

php artisan queue:table
php artisan migrate

▶ Lancer le worker (OBLIGATOIRE pour envoyer les emails)

**Commande à exécuter pour lancer le worker de queue :**

```bash
php artisan queue:work
 ```

➡ Cette commande doit tourner pendant que tu testes l’envoi d’emails
(ex: inscription étudiant, reset password, notification enseignant)

👨‍🏫 Utilisation de la plateforme
	1.	L’admin crée les enseignants
	2.	Les enseignants se connectent
	3.	Les enseignants créent leurs cours
	4.	Les étudiants s’inscrivent
	5.	Les étudiants consultent les cours
	6.	Les emails sont envoyés via queue

📁 ## Livrables

- ✅ Code source GitHub
- ✅ README technique
- ✅ Swagger UI
- ✅ Architecture microservices
- ✅ Clean Architecture
- ✅ Frontend Next.js
- ✅ Système de queue (emails)


🏁 Auteur

Ramatoulaye SADIO et Souleymane BARRO
Projet académique – Plateforme Campus Master