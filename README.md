## Project Title: NoPASARAN Server

### Project Description and Overview

The **NoPASARAN Server** is a component of the NoPASARAN project, serving as a centralized hub that facilitates the secure distribution and management of workers and master nodes.
Acting as a trusted hub, it does this by providing streamlined registration and authentication processes for workers and master nodes.

### Key Features

1. **Worker Registration and Management**: Users who are pre-registered can register their workers, generate SSH key pairs and obtain SSH certificates from the server's certificate authority, storing them securely on the server.

2. **Master Node Registration**: Master nodes can also register with the server. The server stores information about each master node, such as name, public IP/domain, and certificate.

3. **Authentication and Token Management**: The server offers secure access keys for authenticating to the server using tokens. Users can acquire tokens through the "Forgot Token" functionality using their provided credentials.

4. **Certificate Management**: The server manages the issuance and maintenance of SSH certificates for workers and master nodes.

5. **Web Interface**: The project features a user-friendly web interface for easy registration and management of workers and master nodes.

6. **Centralized Monitoring**: The server acts as a central point for monitoring worker and master node status, facilitating efficient node management.
