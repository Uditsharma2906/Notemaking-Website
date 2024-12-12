#include <stdio.h>
#include <stdlib.h>
#include <string.h>

// Node structure
struct Node {
    char name[50];
    char phone[20];
    struct Node *next;
    struct Node *prev;
};

// Telephone Directory structure
struct TelephoneDirectory {
    struct Node *head;
};

// Function to create a new node
struct Node *createNode(char name[], char phone[]) {
    struct Node *newNode = (struct Node *)malloc(sizeof(struct Node));
    strcpy(newNode->name, name);
    strcpy(newNode->phone, phone);
    newNode->next = NULL;
    newNode->prev = NULL;
    return newNode;
}

// Function to insert a new entry into the directory
void insert(struct TelephoneDirectory *directory, char name[], char phone[]) {
    struct Node *newNode = createNode(name, phone);
    if (directory->head == NULL) {
        directory->head = newNode;
        newNode->next = newNode;
        newNode->prev = newNode;
    } else {
        struct Node *lastNode = directory->head->prev;
        lastNode->next = newNode;
        newNode->prev = lastNode;
        newNode->next = directory->head;
        directory->head->prev = newNode;
    }
}

// Function to remove an entry from the directory
void removeEntry(struct TelephoneDirectory *directory, char name[]) {
    if (directory->head == NULL) {
        printf("Directory is empty\n");
        return;
    }

    struct Node *current = directory->head;
    do {
        if (strcmp(current->name, name) == 0) {
            if (current->next == current) {
                directory->head = NULL;
            } else {
                current->prev->next = current->next;
                current->next->prev = current->prev;
                if (current == directory->head) {
                    directory->head = current->next;
                }
            }
            free(current);
            printf("%s removed from the directory.\n", name);
            return;
        }
        current = current->next;
    } while (current != directory->head);

    printf("%s not found in the directory.\n", name);
}

// Function to search for an entry in the directory
char *search(struct TelephoneDirectory *directory, char name[]) {
    if (directory->head == NULL) {
        printf("Directory is empty\n");
        return NULL;
    }

    struct Node *current = directory->head;
    do {
        if (strcmp(current->name, name) == 0) {
            return current->phone;
        }
        current = current->next;
    } while (current != directory->head);

    printf("%s not found in the directory.\n", name);
    return NULL;
}

// Function to display the entire directory
void display(struct TelephoneDirectory *directory) {
    if (directory->head == NULL) {
        printf("Directory is empty\n");
        return;
    }

    struct Node *current = directory->head;
    printf("Telephone Directory:\n");
    do {
        printf("Name: %s, Phone: %s\n", current->name, current->phone);
        current = current->next;
    } while (current != directory->head);
}

int main() {
    struct TelephoneDirectory directory;
    directory.head = NULL;

    insert(&directory, "Alice", "123-456-7890");
    insert(&directory, "Bob", "987-654-3210");
    insert(&directory, "Charlie", "111-222-3333");

    display(&directory);

    printf("Phone number for Bob: %s\n", search(&directory, "Bob"));

    removeEntry(&directory, "Alice");
    removeEntry(&directory, "David");

    display(&directory);

    return 0;
}
