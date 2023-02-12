import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        System.out.print("Enter the number of elements in the sequence: ");
        int n = scan.nextInt();

        Fibonacci.getFibonacci(n);
        System.out.print("Fibonacci sequence: ");
        for (int i = 0; i < n; i++) {
            System.out.print(RecusiveFibonacci.recursiveFibonacci(i) + " ");
        }

    }
}
