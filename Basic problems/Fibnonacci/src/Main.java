import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        System.out.print("Enter the number of elements in the sequence: ");
        int n = scan.nextInt();

        Fibonacci.getFibonacci(n);
        RecusiveFibonacci.recursiveFibonacci(n);
    }
}
