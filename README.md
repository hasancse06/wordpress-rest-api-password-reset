# 🔐 WordPress REST API Password Reset Plugin

A lightweight plugin that enables **password reset via REST API** for WordPress and WooCommerce users. Perfect for **headless** and **mobile-first** apps built with frameworks like **Ionic**, **Angular**, **React Native**, or **Flutter**.

---

## 📦 Installation

1. Upload the plugin folder to `/wp-content/plugins/`
2. Or install it via **Plugins → Add New → Upload Plugin**
3. Activate the plugin from the **Plugins** menu in WordPress

---

## 🛠️ Usage Guide

To trigger a password reset request, send a **GET request** to the endpoint:

https://yourdomain.com/wp-json/wp/v2/users/lostpassword/?email=user@example.com


✅ You can call this API from:

- Ionic / Angular mobile apps
- React Native / Flutter
- Postman or custom frontend

📧 If the user exists:
- A WooCommerce-style reset password email will be sent using:
  - `WC_Email_Customer_Reset_Password`

---

## 🔐 Security Notes

- ✅ Only sends email **if user exists**
- ❌ Does **not expose** user validity in the API response
- 🔐 Can be secured further using:
  - Nonce
  - Authentication tokens
  - Custom keys or rate limiting

---

## 🧩 Plugin Code Structure

- Extends the REST API via `register_rest_route`
- Uses core WordPress + WooCommerce password reset logic
- Returns:
  - `true` if email sent
  - `false` or `null` if user not found

---

## 📜 Example WordPress Code Snippet

Included in the plugin:

```php
register_rest_route( 'wp/v2', '/users/lostpassword/', array(
  'methods' => 'GET',
  'callback' => 'wp_retrieve_password_api',
) );


| Method | Endpoint                                                    | Description                   |
| ------ | ----------------------------------------------------------- | ----------------------------- |
| GET    | `/wp-json/wp/v2/users/lostpassword/?email=user@example.com` | Triggers password reset email |
```


## 🧠 SEO Keywords

> wordpress password reset api  
> woocommerce lost password rest api  
> reset user password via rest  
> ionic angular wordpress password reset  
> flutter wordpress authentication reset password  
> headless wordpress password recovery  
> rest api for lost password mobile app  
> woocommerce jwt auth reset password


## 🙌 Author

- 🔭 Full-Stack Web Developer | Ionic Framework, Angular, Node.js & REST APIs
- 🌐 [https://hasan.online](https://hasan.online)
- 🎓 Instructor on [Udemy](https://www.udemy.com/user/m-a-hasan-2/)
- 🧠 Creator of themes/plugins at [Envato](https://themeforest.net/user/hasanonline)
- ✍️ Blogger at [blog.hasan.online](https://blog.hasan.online)


## ⭐ Support This Plugin

If this plugin helped you:

- ⭐ Star the repository on GitHub
- 🔗 Share it with WordPress or mobile app developers
- 💡 Contribute with feedback or pull requests

> Together, we make WordPress more mobile-friendly and developer-first 🚀
