## Project Title: NoPASARAN Server

### Project Description and Overview

The **NoPASARAN Server** is a crucial component of the NoPASARAN project, serving as a centralized hub that facilitates the secure distribution of workers and master nodes.
It does this by providing a centralized hub for the streamlined registration and authentication processes of workers and master nodes. Acting as a trusted intermediary, the server ensures that only authorized entities gain access to the network.
The server's design allows for scalability, accommodating the addition of new workers and master nodes as the project grows.

### Key Features

1. **Worker Registration and Management**: Workers can securely register with the hub server, generating SSH key pairs and obtaining SSH certificates from the server's certificate authority. This certificate-based approach ensures that only valid workers access the network.

2. **Master Node Registration**: Master nodes, responsible for overseeing workers, can also register with the hub server. The server stores crucial information about each master node, such as name, public IP/domain, and certificate.

3. **Authentication and Token Management**: The server offers user-friendly authentication using tokens. Users can acquire tokens through the "Forgot Token" functionality, which serve as secure access keys for authenticating to the network.

4. **Certificate Management**: The server manages the issuance and maintenance of SSH certificates for workers and master nodes, establishing a trusted connection for secure communication.

5. **Web Interface**: The project features a user-friendly web interface for easy registration and management of workers and master nodes. The interface provides clear instructions and intuitive navigation.

6. **Centralized Monitoring**: The server acts as a central point for monitoring worker and master node status and activities, facilitating efficient resource allocation and management.