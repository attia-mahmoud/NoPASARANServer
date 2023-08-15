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
