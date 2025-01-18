# Hemocare

**Hemocare** is a PHP-based web project designed for efficient blood bank and donation management. It includes both user and admin interfaces to simplify blood donation processes and ensure transparency.

---

## **Features**

### User Panel:
- **Home Page**: View project overview and recent updates.
- **About Us**: Information about the blood bank.
- **Donate Blood**: Register as a donor.
- **Need Blood**: Search for donors based on blood group and availability.
- **Contact Us**: Connect with the administrators for assistance.

### Admin Panel:
- Manage Donor Records.
- Track Blood Donations.
- Update Website Information.
- Respond to Queries.

---

## **Screenshots**

### User Panel:
#### Home Page:
![Home Page](Screenshots/homepage.png)

#### Basic Information:
![Basic Information](Screenshots/basic_info.png)

#### About us:
![About us](Screenshots/aboutus.png)

#### Need Blood:
![Need Blood](Screenshots/blood_request.png)

#### Donor Registration:
![Donor Registration](Screenshots/register.png)

#### Donor Info card:
![Donor Info Card](Screenshots/donor_card.png)

#### Contact Us:
![Contact Us](Screenshots/contact_us.png)

### Admin Panel:

#### Admin Login:
![Admin Login](Screenshots/login.png)

#### Admin Dashboard:
![Admin Dashboard](Screenshots/admin_dashboard.png)

#### Change Password:
![Change Password](Screenshots/change_pass.png)

#### Donor List:
![Donor List](Screenshots/donor_list.png)

#### User Query:
![User Query](Screenshots/user_query.png)

#### Manage Pages:
![Manage Page](Screenshots/manage_page.png)

---

## **Installation**

### Prerequisites:
- XAMPP or WAMP installed.
- A browser for accessing the application.

### Steps:
1. Clone this repository:
   ```bash
   git clone https://github.com/PulkitAgrawal23/Hemocare.git

2. Navigate to the project folder:
   ```bash
   cd Hemocare
   ```

3. Set up the environment:

   - **For XAMPP**: Move the `Hemocare` folder to the `htdocs` directory in your XAMPP installation folder. You can access the application through `http://localhost/Hemocare` after starting the XAMPP server.

   - **For WAMP**: Move the `Hemocare` folder to the `www` directory in your WAMP installation folder. You can access the application through `http://localhost/Hemocare` after starting the WAMP server.

4. Set up the database:

   - Open phpMyAdmin through your browser (typically at `http://localhost/phpmyadmin`).
   - Create a new database named `hemocare`.
   - Import the `blood_bank_database.sql` file (provided in the repository) to set up the necessary tables and data.

5. Configuration:

   - Open the `config.php` file in the project directory.
   - Update the database connection settings with your database credentials (e.g., username, password, and database name).

6. Access the application:

   - Open a browser and go to `http://localhost/BDMS` to use the system.

---

## **Usage**

### User Panel:
- **Donate Blood**: Users can register as donors by filling out the donation form. After registration, donors are added to the donor list.
- **Need Blood**: Users can search for blood donors based on blood group and availability.
- **Contact Us**: Users can contact administrators for support or inquiries.

### Admin Panel:
- **Admin Login**: Admins can log in to the system with credentials to access the admin dashboard.
- **Dashboard**: Admins can view the total number of donations, donor details, and recent user activity.
- **Manage Donors**: Admins can view, add, edit, or delete donor records.
- **Manage Pages**: Admins can update static pages like About Us, Contact Us, etc.
- **User Queries**: Admins can manage and respond to user queries submitted through the website.

---

## **Contributing**

We welcome contributions to **Hemocare**! If you have suggestions, improvements, or bug fixes, feel free to fork the repository and create a pull request.

### How to Contribute:
1. Fork the repository on GitHub.
2. Clone your fork to your local machine:
   ```bash
   git clone https://github.com/yourusername/Hemocare.git
   ```
3. Create a new branch for your changes:
   ```bash
   git checkout -b feature/your-feature-name
   ```
4. Make your changes and commit them:
   ```bash
   git add .
   git commit -m "Description of changes"
   ```
5. Push to your fork:
   ```bash
   git push origin feature/your-feature-name
   ```
6. Open a pull request from your fork to the original repository.

---

## **License**

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
```

### Additional Notes:
- Make sure the `hemocare.sql` file is included in your repository (if it's not already) for setting up the database.
- If there are any other specific instructions you'd like to add, feel free to modify the above sections.

Let me know if you need further adjustments!
