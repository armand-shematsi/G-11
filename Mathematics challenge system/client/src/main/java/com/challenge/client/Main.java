package com.challenge.client;

import java.io.*;
import java.net.Socket;
import java.util.Scanner;

public class Main {
    private static final String SERVER_ADDRESS = "localhost";
    private static final int SERVER_PORT = 12345;

    public static void main(String[] args) {
        try (Socket socket = new Socket(SERVER_ADDRESS, SERVER_PORT);
             PrintWriter writer = new PrintWriter(socket.getOutputStream(), true);
             BufferedReader reader = new BufferedReader(new InputStreamReader(socket.getInputStream()));
             Scanner scanner = new Scanner(System.in)) {

            System.out.println("Connected to the server");

            boolean running = true;
            boolean loggedIn = false;
            boolean isRepresentative = false;
            String loggedInUsername = null;

            while (running) {
                if (!loggedIn) {
                    System.out.println("1. Register");
                    System.out.println("2. Login as Participant");
                    System.out.println("3. Login as Representative");
                    System.out.println("4. Exit");

                    int choice = scanner.nextInt();
                    scanner.nextLine(); // Consume newline

                    switch (choice) {
                        case 1:
                            // Call registerParticipant method from Register class
                            Register.registerParticipant(scanner, writer);
                            break;

                        case 2:
                            // Call loginParticipant method from Login class
                            loggedInUsername = Login.loginParticipant(scanner, writer);
                            loggedIn = loggedInUsername != null;
                            break;

                        case 3:
                            // Call loginRepresentative method from Login class
                            loggedInUsername = Login.loginRepresentative(scanner, writer);
                            loggedIn = loggedInUsername != null;
                            isRepresentative = loggedIn;
                            break;

                        case 4:
                            // Exit the application
                            System.out.println("Exiting...");
                            running = false;
                            break;

                        default:
                            System.out.println("Invalid choice. Please try again.");
                    }
                } else {
                    if (isRepresentative) {
                        System.out.println("Welcome to the Mathematics Challenge System (Representative)");
                        System.out.println("1. View Applicants");
                        System.out.println("2. Confirm Applicant");
                        System.out.println("3. Logout");
                        System.out.println("4. Exit");

                        int choice = scanner.nextInt();
                        scanner.nextLine(); // Consume newline

                        switch (choice) {
                            case 1:
                                // Implement viewApplicants method
                                ViewApplicants.viewApplicants(writer);
                                break;

                            case 2:
                                // Call confirmApplicant method from ConfirmApplicant class
                                ConfirmApplicant.confirmApplicant(scanner, writer);
                                break;

                            case 3:
                                // Logout
                                loggedIn = false;
                                isRepresentative = false;
                                loggedInUsername = null;
                                System.out.println("Logged out.");
                                break;

                            case 4:
                                // Exit the application
                                System.out.println("Exiting...");
                                running = false;
                                break;

                            default:
                                System.out.println("Invalid choice. Please try again.");
                        }
                    } else {
                        System.out.println("Welcome to the Mathematics Challenge System");
                        System.out.println("1. View Challenges");
                        System.out.println("2. Attempt Challenge");
                        System.out.println("3. Logout");
                        System.out.println("4. Exit");

                        int choice = scanner.nextInt();
                        scanner.nextLine(); // Consume newline

                        switch (choice) {
                            case 1:
                                // Call viewChallenges method from ViewChallenges class
                                ViewChallenges.viewChallenges(writer);
                                break;

                            case 2:
                                // Call attemptChallenge method from AttemptChallenge class
                                AttemptChallenge.attemptChallenge(scanner, writer);
                                break;

                            case 3:
                                // Logout
                                loggedIn = false;
                                loggedInUsername = null;
                                System.out.println("Logged out.");
                                break;

                            case 4:
                                // Exit the application
                                System.out.println("Exiting...");
                                running = false;
                                break;

                            default:
                                System.out.println("Invalid choice. Please try again.");
                        }
                    }
                }
            }

        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}

class ClientHandler extends Thread {
    private Socket socket;

    public ClientHandler(Socket socket) {
        this.socket = socket;
    }

    @Override
    public void run() {
        try (BufferedReader reader = new BufferedReader(new InputStreamReader(socket.getInputStream()))) {
            String response;
            while ((response = reader.readLine()) != null) {
                if (response.equals("END_OF_CHALLENGES")) {
                    System.out.println("End of challenges.");
                    break;
                } else {
                    System.out.println("Server response: " + response);
                }
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
