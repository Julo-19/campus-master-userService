
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
