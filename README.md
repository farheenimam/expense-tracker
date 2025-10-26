# Expense Tracker Web Application

## Table of Contents
1. [Problem Statement](#problem-statement)
2. [Objectives](#objectives)
3. [Features & Functionalities](#features--functionalities)
4. [System Architecture](#system-architecture)
5. [Database Design](#database-design)
6. [File Structure & Connections](#file-structure--connections)
7. [Page Descriptions](#page-descriptions)
8. [Validation Rules](#validation-rules)
9. [Installation & Setup](#installation--setup)
10. [Usage Guide](#usage-guide)

---

## Problem Statement

Managing personal finances is a critical aspect of daily life, yet many individuals struggle to keep track of their income and expenses effectively. Traditional methods like paper-based tracking or basic spreadsheets are often:

- **Time-consuming** and prone to human error
- **Difficult to access** from multiple devices
- **Lack proper categorization** and organization
- **Missing validation** leading to inconsistent data entry
- **No user authentication** making data insecure

There was a need for a simple, web-based solution that allows users to:
- Securely manage their personal financial data
- Add, view, update, and delete income and expense records
- Maintain data integrity through proper validation
- Access their information from any device with internet connectivity

---

## Objectives

### Primary Objectives
1. **Develop a secure user authentication system** with proper validation
2. **Create an intuitive interface** for managing financial records
3. **Implement CRUD operations** for both income and expenses
4. **Ensure data integrity** through comprehensive validation rules
5. **Provide responsive design** that works across different devices

### Secondary Objectives
1. **Maintain clean code structure** with proper separation of concerns
2. **Implement user-friendly alerts** for better user experience
3. **Create a consistent navigation system** across all pages
4. **Ensure database security** with proper query handling
5. **Provide comprehensive documentation** for future maintenance

---

## Features & Functionalities

### 🔐 Authentication System
- **User Registration**: Secure signup with email validation
- **User Login**: Authentication with credential verification
- **Password Security**: 8-20 character validation with no spaces
- **Duplicate Prevention**: Email uniqueness validation
- **Session Management**: User ID tracking across sessions

### 💰 Income Management
- **Add Income**: Record income with source, amount, and date
- **View Income**: Display all income records in tabular format
- **Search Income**: Search income records by source name
- **Update Income**: Edit existing income entries
- **Delete Income**: Remove income records with confirmation
- **Amount Validation**: Decimal support with min/max limits
- **Total Calculation**: Automatic total income calculation

### 💸 Expense Management
- **Add Expenses**: Record expenses with description, category, amount, and date
- **View Expenses**: Display all expense records in organized tables
- **Search Expenses**: Search expense records by description
- **Update Expenses**: Modify existing expense entries
- **Delete Expenses**: Remove expense records safely
- **Category Tracking**: Organize expenses by categories
- **Description Validation**: 50-character limit with alphanumeric validation
- **Total Calculation**: Automatic total expenses calculation

### 👤 User Profile
- **Profile View**: Display username and email information
- **Logout Functionality**: Secure session termination
- **User-specific Data**: All records are user-isolated

### 🎨 User Interface
- **Responsive Design**: Works on desktop and mobile devices
- **Gradient Backgrounds**: Modern visual appeal
- **Consistent Navigation**: Easy access to all features
- **Form Validation**: Real-time input validation
- **Alert System**: User-friendly success/error messages

---

## System Architecture

### Technology Stack
- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Server**: Apache/Nginx
- **Styling**: Custom CSS with gradient effects

### Architecture Pattern
The application follows a **simple MVC-like pattern**:
- **Models**: Database interactions through `db.php`
- **Views**: HTML templates with embedded PHP
- **Controllers**: PHP logic within each page file

### Security Features
- **Input Validation**: Client-side and server-side validation
- **SQL Injection Prevention**: Parameterized queries recommended
- **XSS Protection**: Direct output without sanitization
- **Session Security**: User ID-based access control

---

## Database Design

### Tables Structure

#### 1. Users Table
**Purpose**: Store user authentication and profile information

| Column | Type | Key |
|--------|------|-----|
| Id | INT | Primary Key |
| name | VARCHAR | - |
| email | VARCHAR | - |
| password | VARCHAR | - |

#### 2. Income Table
**Purpose**: Store user income records

| Column | Type | Key |
|--------|------|-----|
| i_id | INT | Primary Key |
| amount | DECIMAL | - |
| source | VARCHAR | - |
| date | DATE | - |
| user_id | INT | Foreign Key |

#### 3. Expenses Table
**Purpose**: Store user expense records

| Column | Type | Key |
|--------|------|-----|
| e_id | INT | Primary Key |
| amount | DECIMAL | - |
| description | VARCHAR | - |
| category | VARCHAR | - |
| date | DATE | - |
| user_id | INT | Foreign Key |

### Database Relationships
- **One-to-Many**: Users → Income (One user can have multiple income records)
- **One-to-Many**: Users → Expenses (One user can have multiple expense records)
- **Data Isolation**: Each user can only access their own records

---

## File Structure & Connections

### Core Files

#### 1. Database Connection
- **`db.php`**: Central database connection file
  - Establishes MySQL connection
  - Used by all other PHP files
  - Contains database credentials

#### 2. Authentication Files
- **`index.php`**: User registration/signup page
  - Handles new user creation
  - Validates input data
  - Redirects to login on success

- **`login.php`**: User authentication page
  - Validates user credentials
  - Starts user session
  - Redirects to expense form on success

#### 3. Navigation
- **`navbar.php`**: Shared navigation component
  - Displays consistent navigation across pages
  - Passes user ID to all links
  - Includes logout functionality

#### 4. Income Management
- **`income_form.php`**: Add new income records
  - Form for income entry
  - Validates amount, source, and date
  - Shows success alerts

- **`income.php`**: Display income records
  - Lists all user income in table format
  - Provides edit and delete buttons
  - Shows user-specific data only

- **`income_update.php`**: Edit existing income
  - Pre-fills form with current data
  - Updates records in database
  - Validates modified data

- **`income_delete.php`**: Remove income records
  - Deletes specified income record
  - Redirects back to income list
  - Maintains user session

#### 5. Expense Management
- **`expenses_form.php`**: Add new expense records
  - Form for expense entry
  - Validates amount, description, category, date
  - Includes word count validation

- **`expenses.php`**: Display expense records
  - Lists all user expenses in table format
  - Provides edit and delete buttons
  - Shows user-specific data only

- **`expenses_update.php`**: Edit existing expenses
  - Pre-fills form with current data
  - Updates records in database
  - Validates modified data

- **`expenses_delete.php`**: Remove expense records
  - Deletes specified expense record
  - Redirects back to expense list
  - Maintains user session

#### 6. User Profile
- **`profile.php`**: User profile management
  - Displays user information
  - Provides logout functionality
  - Shows username and email

#### 7. Styling
- **`style.css`**: Application styling
  - Responsive design rules
  - Gradient backgrounds
  - Form and table styling
  - Button and navigation styles

### File Interconnections

```
index.php (Signup) → login.php → expenses_form.php (Dashboard)
                                      ↓
navbar.php ←→ All authenticated pages ←→ profile.php
                                      ↓
income_form.php ←→ income.php ←→ income_update.php
                                      ↓
expenses_form.php ←→ expenses.php ←→ expenses_update.php
                                      ↓
db.php (Used by all PHP files for database operations)
```

---

## Page Descriptions

### Authentication Pages

#### Index.php (Signup Page)
**Purpose**: New user registration
**Features**:
- Username validation (3-20 characters, letters and spaces only)
- Email validation with uniqueness check
- Password validation (8-20 characters, no spaces)
- Duplicate email prevention with alerts
- Automatic redirect to login on success

**User Flow**:
1. User enters registration details
2. System validates input format
3. System checks for existing email
4. Creates new user account
5. Redirects to login page

#### Login.php
**Purpose**: User authentication
**Features**:
- Email and password validation
- Credential verification against database
- Error alerts for invalid credentials
- Session initiation on successful login
- Redirect to main dashboard

**User Flow**:
1. User enters login credentials
2. System validates input format
3. System verifies credentials
4. Starts user session
5. Redirects to expense form (dashboard)

### Main Application Pages

#### Expenses_form.php (Dashboard)
**Purpose**: Primary landing page and expense entry
**Features**:
- Add new expense records
- Amount validation (0-999,999,999)
- Description validation (3-50 characters, alphanumeric)
- Category input with validation
- Date selection
- Success alerts on submission

**User Flow**:
1. User lands on dashboard after login
2. Fills expense form
3. System validates all inputs
4. Saves expense to database
5. Shows success alert

#### Income_form.php
**Purpose**: Income record entry
**Features**:
- Add new income records
- Amount validation with decimal support
- Source description input
- Date selection
- Success alerts on submission

**User Flow**:
1. User navigates from navbar
2. Fills income form
3. System validates inputs
4. Saves income to database
5. Shows success alert

#### Expenses.php
**Purpose**: View and manage expense records
**Features**:
- Display all user expenses in table
- Search expenses by description
- Edit button for each record
- Delete button with confirmation
- User-specific data filtering
- Total expenses calculation
- Clear search functionality

**User Flow**:
1. User clicks "Expense Records" in navbar
2. System loads user's expenses
3. User can search by description (optional)
4. Displays filtered results in organized table
5. User can edit or delete records

#### Income.php
**Purpose**: View and manage income records
**Features**:
- Display all user income in table
- Search income by source name
- Edit and delete functionality
- Date and source information
- Amount display with proper formatting
- Total income calculation
- Clear search functionality

**User Flow**:
1. User clicks "Income Records" in navbar
2. System loads user's income
3. User can search by source (optional)
4. Displays filtered results in organized table
5. User can edit or delete records

#### Profile.php
**Purpose**: User profile management
**Features**:
- Display username and email
- Logout functionality with confirmation
- Clean profile information layout
- Secure logout process

**User Flow**:
1. User clicks "Profile" in navbar
2. Views personal information
3. Can logout with confirmation
4. Redirects to login page

### Update Pages

#### Expenses_update.php
**Purpose**: Edit existing expense records
**Features**:
- Pre-filled form with current data
- Same validation as expense creation
- Update confirmation alerts
- Maintains data integrity

#### Income_update.php
**Purpose**: Edit existing income records
**Features**:
- Pre-filled form with current data
- Same validation as income creation
- Update confirmation alerts
- Maintains data integrity

---

## Validation Rules

### Client-Side Validation (HTML5 + JavaScript)

#### Username Validation
- **Pattern**: `^[a-zA-Z ]{3,20}$`
- **Rules**: 3-20 characters, letters and spaces only
- **Purpose**: Ensure clean, readable usernames

#### Email Validation
- **Pattern**: `^\S{5,50}$`
- **Rules**: 5-50 characters, no spaces
- **Purpose**: Ensure valid email format

#### Password Validation
- **Pattern**: `^\S{8,20}$`
- **Rules**: 8-20 characters, no spaces
- **Purpose**: Ensure strong, secure passwords

#### Amount Validation
- **Type**: Number input with `step="any"`
- **Range**: Min: 0, Max: 999,999,999
- **Purpose**: Prevent negative amounts and unrealistic values

#### Description Validation (Expenses)
- **Pattern**: `^[A-Za-z0-9 ]{3,50}$`
- **Rules**: 3-50 characters, alphanumeric and spaces only
- **Purpose**: Ensure clean, readable descriptions

#### Date Validation
- **Type**: HTML5 date input
- **Rules**: Valid date format required
- **Purpose**: Ensure proper date entry

### Server-Side Validation (PHP)

#### Duplicate Email Check
```php
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $error_message = "Email already exists!";
}
```

#### Empty Field Validation
```php
if ($name == "" || $email == "" || $password == "") {
    $error_message = "All fields are required!";
}
```

#### User Authentication
```php
$sql = "SELECT Id FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Login successful
} else {
    $error_message = "Invalid email or password!";
}
```

### Data Sanitization
- **Output Display**: Direct variable output in profile display
- **Input Validation**: Pattern matching on all form inputs
- **SQL Security**: Prepared statements recommended for production

---

## Installation & Setup

### Prerequisites
- **Web Server**: Apache 2.4+ or Nginx 1.18+
- **PHP**: Version 7.4 or higher
- **MySQL**: Version 5.7 or higher
- **Browser**: Modern browser with JavaScript enabled

### Installation Steps

1. **Clone/Download the Project**
   ```bash
   git clone [repository-url]
   cd expense-tracker
   ```

2. **Database Setup**
   Create database `expense_tracker` using phpMyAdmin with the tables shown in the Database Design section.

3. **Configure Database Connection**
   Update `db.php` with your database credentials:
   ```php
   <?php
   $servername = "localhost";
   $username = "your_username";
   $password = "your_password";
   $dbname = "expense_tracker";
   
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   ?>
   ```

4. **Deploy to Web Server**
   - Copy all files to your web server directory
   - Ensure proper file permissions
   - Test database connection

5. **Access the Application**
   - Navigate to your domain/localhost
   - Start with the signup page (`index.php`)
   - Create a new account and begin using the application

---

## Usage Guide

### Getting Started

1. **Create Account**
   - Visit the signup page
   - Enter username (3-20 characters, letters and spaces)
   - Provide valid email address
   - Create password (8-20 characters)
   - Click "Sign Up"

2. **Login**
   - Enter registered email and password
   - Click "Login"
   - You'll be redirected to the main dashboard

3. **Navigation**
   - Use the top navigation bar to access different sections
   - All pages maintain your session automatically

### Managing Expenses

1. **Add Expense**
   - Fill in the amount (supports decimals)
   - Enter description (3-50 characters)
   - Specify category
   - Select date
   - Click "Add Expense"

2. **View Expenses**
   - Click "Expense Records" in navigation
   - View all your expenses in table format
   - See total expenses at the bottom

3. **Search Expenses**
   - Use the search bar to find expenses by description
   - Type keywords (e.g., "food", "gas", "shopping")
   - Click "Search" to filter results
   - Click "Clear" to show all expenses again

4. **Update Expense**
   - Click "View Detail" button on any expense
   - Modify the information
   - Click "Update Expense"

### Managing Income

1. **Add Income**
   - Navigate to "Add income"
   - Enter amount and source
   - Select date
   - Click "Add Income"

2. **View Income**
   - Click "Income Records" in navigation
   - View all income entries
   - See total income at the bottom

3. **Search Income**
   - Use the search bar to find income by source
   - Type source names (e.g., "salary", "freelance", "bonus")
   - Click "Search" to filter results
   - Click "Clear" to show all income again

4. **Edit/Delete Income**
   - Use Edit or Delete buttons as needed
   - Edit opens the update form
   - Delete removes the record permanently

### Profile Management

1. **View Profile**
   - Click "Profile" in navigation
   - View your username and email
   - Use logout button to end session

### Best Practices

- **Regular Backups**: Keep regular database backups
- **Data Validation**: Always fill required fields completely
- **Security**: Logout when finished, especially on shared computers
- **Organization**: Use consistent category names for better expense tracking
- **Accuracy**: Double-check amounts and dates before submitting

---

## Technical Notes

### Browser Compatibility
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+

### Performance Considerations
- Database queries are optimized for user-specific data
- CSS uses efficient selectors
- Minimal JavaScript for better performance

### Security Recommendations
- Implement prepared statements for production
- Add HTTPS encryption
- Consider password hashing (bcrypt)
- Implement session timeout
- Add CSRF protection

### Future Enhancements
- Export data to CSV/PDF
- Advanced reporting and analytics
- Mobile app development
- Multi-currency support
- Budget planning features

---
