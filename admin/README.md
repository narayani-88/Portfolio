# Portfolio Admin Panel

A secure, responsive admin panel for managing portfolio content and customer inquiries.

## Features

- **Secure Authentication**
  - Admin login/logout
  - Session management
  - Password hashing

- **Portfolio Management**
  - Add, edit, delete portfolio items
  - Image upload with validation
  - Category management

- **Customer Management**
  - View customer inquiries
  - Search and filter functionality
  - Export to CSV

- **Analytics Dashboard**
  - Visual statistics and charts
  - Customer growth tracking
  - Portfolio insights

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Modern web browser

## Installation

1. Clone the repository to your web server's document root
2. Import the database schema from `database/portfolio_admin.sql`
3. Configure database connection in `includes/config.php`
4. Set proper file permissions:
   ```bash
   chmod 755 uploads/
   chmod 644 includes/config.php
   ```
5. Access the admin panel at `http://your-domain.com/admin/`

## Default Login

- **Username:** admin
- **Password:** admin123

*Change these credentials after first login.*

## File Structure

```
admin/
├── includes/
│   ├── auth.php       # Authentication middleware
│   ├── config.php     # Database configuration
│   └── functions.php  # Helper functions
├── uploads/           # Uploaded files
├── assets/            # CSS, JS, and images
├── customers.php      # Customer management
├── dashboard.php      # Admin dashboard
├── portfolio.php      # Portfolio management
├── analytics.php      # Analytics dashboard
├── login.php          # Login page
└── logout.php         # Logout handler
```

## Security

- Password hashing using PHP's `password_hash()`
- Prepared statements to prevent SQL injection
- Input validation and sanitization
- Session timeout (30 minutes)
- CSRF protection (recommended to implement)

## Customization

1. **Branding**: Update the logo and colors in the header
2. **Email Notifications**: Implement email alerts for new inquiries
3. **Activity Log**: Extend the activity tracking system
4. **User Roles**: Add role-based access control if needed

## Troubleshooting

- **Blank Page**: Check PHP error logs and ensure all dependencies are installed
- **Upload Issues**: Verify `uploads/` directory permissions
- **Database Connection**: Double-check credentials in `includes/config.php`
- **Session Problems**: Ensure PHP sessions are properly configured

## License

This project is open-source and available under the MIT License.

## Support

For support or feature requests, please open an issue in the repository.
