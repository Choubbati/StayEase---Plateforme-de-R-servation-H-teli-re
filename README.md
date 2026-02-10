# 🏨 StayEase – Plateforme de Réservation Hôtelière

## 📌 Description du projet
**StayEase** est une application web de réservation d’hôtels développée avec **Laravel 12** et **Blade**.  
Elle permet aux utilisateurs de rechercher des hôtels, consulter les chambres disponibles et effectuer des réservations, tout en offrant aux administrateurs et gérants des interfaces de gestion complètes.

Le projet est réalisé dans un cadre pédagogique pour l’agence **Digital Travel**, en suivant une méthodologie **SCRUM** avec un objectif de livraison d’un **MVP fonctionnel**.

---

## 🎯 Objectifs
- Rechercher des hôtels par nom ou ville  
- Consulter les chambres et leurs caractéristiques  
- Réserver une chambre avec confirmation par e-mail (simulation)  
- Gérer les hôtels, chambres et réservations  
- Fournir un dashboard d’administration pour la validation et la modération  

---

## 🧱 Stack Technique
- **Framework** : Laravel 12  
- **Template Engine** : Blade  
- **Base de données** : MySQL / PostgreSQL  
- **Front-end** : Tailwind CSS  
- **Authentification** : Laravel Auth (roles & permissions)  
- **Mail** : Laravel Mail (emails simulés)  
- **DevOps** : Docker (docker-compose)  

---

## 👥 Rôles Utilisateurs
- **Admin**
  - Validation / rejet des hôtels
  - Gestion des utilisateurs et rôles
- **Gérant**
  - CRUD hôtels
  - Gestion des chambres, catégories, propriétés et tags
- **Client**
  - Recherche d’hôtels
  - Réservation de chambres
  - Historique des réservations

---

## 📚 User Stories Implémentées

### 🔐 Identity, Access & Landing
- US 1.1 : Page d’accueil avec offres
- US 1.2 : Inscription & Connexion sécurisée
- US 1.3 : Gestion des rôles
- US 1.4 : Bannissement / validation des gérants
- US 1.5 : Profil utilisateur & historique

### 🏨 Gestion des Hôtels
- US 2.1 : CRUD Hôtel
- US 2.2 : Validation Admin des hôtels
- US 2.3 : Liste des hôtels approuvés avec pagination
- US 2.4 : Recherche par nom et ville

### 🛏️ Chambres & Attributs
- US 3.1 : CRUD Chambres
- US 3.2 : Détails des chambres
- US 3.3 : Propriétés & Tags (Many-to-Many)
- US 3.4 : Filtres avancés

### 📆 Réservations & Paiement
- US 4.1 : Catégories de chambres
- US 4.2 : Disponibilité par dates
- US 4.3 : Réservation + e-mail de confirmation (simulé)
- US 4.4 : Paiement sécurisé (simulation)

---

## 🗂️ Architecture de la Base de Données
- **users**
- **roles**
- **hotels**
- **chambres**
- **reservations**
- **categories**
- **properties**
- **tags**
- Tables pivot pour les relations Many-to-Many

---

## 🚀 Installation & Lancement

### 1️⃣ Cloner le projet
```bash
git clone https://github.com/votre-username/stayease.git
cd stayease
