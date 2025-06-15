# Chatty App – Real-time Chat Application (Laravel + Inertia + React)

A lightweight real-time chat app built with Laravel 12, Inertia.js, and React. It supports real-time message delivery using Laravel Echo and WebSockets, designed to enable direct communication between users.

---

## 🧰 Tech Stack

### Backend
- **Laravel 12** – API & event broadcasting
- **Laravel Echo** – client-side WebSocket listener
- **Laravel WebSockets** or **Pusher** – broadcasting service
- **Database Queue Driver** – handles background events

### Frontend
- **React 18** – SPA user interface
- **Inertia.js (React adapter)** – bridges Laravel backend with React
- **TailwindCSS** – modern utility-first CSS framework
- **Vite** – fast frontend build tool

---

## ✅ Features Implemented

- ✅ User authentication & protected routes
- ✅ One-to-one chat interface
- ✅ Realtime message sending and receiving
- ✅ Laravel Echo integration with private channels
- ✅ Auto-scroll to latest message
- ✅ Typing indicator using Echo's `whisper` event
- ✅ Form state management with `@inertiajs/inertia`

---

## 🔜 TODO / In Progress

| Feature                                 | Status       |
|-----------------------------------------|--------------|
| Use [laravel reverb](https://reverb.laravel.com/) instead of pusher          | 🚧 Not implemented |
| Message timestamp (sent time)           | 🚧 Not implemented |
| Message read timestamp                  | 🚧 Not implemented |
| Read receipts (message read indicator)  | 🚧 Not implemented |
| Unread message count (badge/bubble)     | 🚧 Not implemented |
| Chat list with notification indicator   | 🚧 Not implemented |
| User search to initiate a chat          | 🚧 Not implemented |
| Pagination (infinite scroll or load more) | 🚧 Not implemented |
| Sending images or file attachments      | 🚧 Not implemented |
| Input sanitization and validation       | ✅ Implemented via Laravel validation |


## ⚙️ WebSocket Configuration

### `.env`

```env
BROADCAST_DRIVER=pusher
QUEUE_CONNECTION=database

PUSHER_APP_ID=local
PUSHER_APP_KEY=local
PUSHER_APP_SECRET=local
PUSHER_HOST=127.0.0.1
PUSHER_PORT=6001
PUSHER_SCHEME=http
PUSHER_APP_CLUSTER=mt1
```

Make sure your frontend (via Vite) uses these variables correctly in `resources/js/bootstrap.js`.

---

## 🚀 Getting Started

```bash
# Install PHP and JS dependencies
composer install
npm install

# Run database migrations
php artisan migrate

# Start Laravel queue worker
php artisan queue:work

# Run Laravel WebSocket server (if using laravel-websockets)
php artisan websocket:serve

# Start frontend dev server
npm run dev
```

---

## 🧠 Notes

- The current setup uses `QUEUE_CONNECTION=sync` for local testing. To enable background job handling and better performance, use `database` or `redis`.
- For the typing indicator to work, each user must be subscribed to their respective private chat channel, and `whisper` events must be configured on both frontend and backend.

---