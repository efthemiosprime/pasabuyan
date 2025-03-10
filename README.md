# Pasabuyan: Peer-to-Peer Delivery Platform

Pasabuyan is a courier app that connects individuals needing item deliveries with travelers already headed to the same destination. Unlike traditional courier services that rely on professional drivers, Pasabuyan taps into everyday travel plans, making deliveries more convenient and cost-effective.

## Core Concept
- **Travelers** register their upcoming trips (origin, destination, dates, capacity).
- **Senders** create delivery requests for items they need transported.
- The platform **matches** compatible trips and delivery requests.
- Communication only occurs when there's a potential or active delivery match.
- Both parties benefit: travelers earn extra money for journeys they were taking anyway, and senders get their items delivered for potentially lower costs.

## Technical Stack
- **Backend**: Laravel PHP framework
- **Database**: PostgreSQL
- **Key Features**: User profiles, trip management, package tracking, secure messaging, reviews/ratings, and a notification system.

## Database Schema
Below is the database schema:

![Database Schema](/docs/database_schema.png)

## How It Works
This platform creates a sharing economy for package delivery, utilizing unused capacity in personal travel to create an efficient, community-based logistics network.