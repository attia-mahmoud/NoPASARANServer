## Project Title: NoPASARAN Server

### Project Description and Overview

The **NoPASARAN Server** is a component of the NoPASARAN project, serving as a centralized hub that facilitates the secure distribution and management of workers and master nodes.
Acting as a trusted hub, it does this by providing streamlined registration and authentication processes for workers and master nodes.

### Installation

#### Prerequisites
- [XAMPP](https://www.apachefriends.org/)

#### Usage
- Clone the project into the `C:\xampp\htdocs` folder.

```
git clone https://github.com/attia-mahmoud/NoPASARANServer.git
```

- Start the Apache and MySQL servers from the XAMPP control panel.

- Create the MySQL database tables as described below.

#### MySQL Database

- accounts

| Field    | Type         | Null | Key | Default | Extra          |
|----------|--------------|------|-----|---------|----------------|
| id       | int(11)      | NO   | PRI | NULL    | auto_increment|
| username | varchar(250) | NO   |     | NULL    |                |
| password | varchar(250) | NO   |     | NULL    |                |
| token    | varchar(250) | NO   |     | NULL    |                |

- workers

| Field       | Type         | Null | Key | Default | Extra          |
|-------------|--------------|------|-----|---------|----------------|
| id          | int(11)      | NO   | PRI | NULL    | auto_increment|
| token       | varchar(250) | NO   |     | NULL    |                |
| name        | varchar(250) | NO   |     | NULL    |                |
| location    | varchar(250) | NO   |     | NULL    |                |
| public      | varchar(2500)| NO   |     | NULL    |                |
| certificate | varchar(2500)| NO   |     | NULL    |                |

- masters

| Field       | Type         | Null | Key | Default | Extra          |
|-------------|--------------|------|-----|---------|----------------|
| id          | int(11)      | NO   | PRI | NULL    | auto_increment|
| name        | varchar(250) | NO   |     | NULL    |                |
| ip          | varchar(250) | NO   |     | NULL    |                |
| certificate | varchar(2500)| NO   |     | NULL    |                |

### Key Features

1. **Worker Registration and Management**: Users who are pre-registered can register their workers, generate SSH key pairs and obtain SSH certificates from the server's certificate authority, storing them securely on the server.

2. **Master Node Registration**: Master nodes can also register with the server. The server stores information about each master node, such as name, public IP/domain, and certificate.

3. **Authentication and Token Management**: The server offers secure access keys for authenticating to the server using tokens. Users can acquire tokens through the "Forgot Token" functionality using their provided credentials.

4. **Certificate Management**: The server manages the issuance and maintenance of SSH certificates for workers and master nodes.

5. **Web Interface**: The project features a user-friendly web interface for easy registration and management of workers and master nodes.

6. **Centralized Monitoring**: The server acts as a central point for monitoring worker and master node status, facilitating efficient node management.

### Files Description

- index.php

This file serves as the main landing page of the web application. It provides the admin a form to register a new user account and offers links for adding workers, managing master nodes, logging in using a token, and accessing other features of the application.

- register.php

This file contains the backend for creating a new user account. It generates a unique user token to be used for future logins and for registering new worker nodes. 

- login.php

This file provides a login form that utilizes token-based authentication. Users can then see all the worker nodes associated with them.

- getdata.php

This file provides the backend for returning all the worker nodes associated with a provided token. It renders a table detailing the workers, with download links for the public key and SSH certificate.

- forgot_token.php

This file returns the token associated with a set of credentials, useful for when users receive their credentials from the admin for the first time or when they forget where they stored their token.

- get_token.php

This file provides the backend for retreiving a token from its associated set of credentials.

- master.php

This file displays a table listing all master nodes in the system, including the name of the master node, its domain (IP), and a link to download the associated master certificate.

- add_master.php

This file allows admins to add new master nodes by providing the admin password, a name for the master node, its IP/domain, and a certificate file. If successful, the master node's details are stored in the server.

- upload_master.php

This file provides the backend for adding a new master node.

- add_workers.php

This file provides a form for users to register a new worker node using their token, the worker nodes name, and its geographical location.

- gen_keys.php

This file provides the backend for registering new workers. It generates an SSH key pair and signed SSH certificate for the worker which can be downloaded as files. 




